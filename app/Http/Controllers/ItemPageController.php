<?php

namespace App\Http\Controllers;

use App\Models\AdminKeyword;
use App\Models\ShopeeItem;
use App\Models\ShopeeShop;
use App\Support\CacheHelpers;
use Illuminate\Http\Request;

/**
 * Class ItemPageController
 *
 * @package App\Http\Controllers
 */
class ItemPageController extends BaseController
{
    /**
     * function description
     *
     * @param \Illuminate\Http\Request $request
     * @throws \Laracodes\Presenter\Exceptions\PresenterException
     */
    public function index(Request $request, $slug = '')
    {
        $arSlug = explode('-', $slug);
        $itemid = 0;
        if (count($arSlug)) {
            $itemid = intval(last($arSlug));
        } else {
            return redirect()->route('home');
        }
        $item = ShopeeItem::where('itemid', $itemid)->first();
        if (!$item) {
            return redirect()->route('home');
        }

        $flagChangeItem = false;
        // embed brand
        if (!$item->embed_brand) {
            if ($item->brand) {
                $item->embed_brand = [
                    'name' => $item->brand->name,
                    'id' => $item->brand->id,
                ];
                $flagChangeItem = true;
            }
        }

        // embed shop
        if (!$item->embed_shop) {
            if ($item->shop) {
                $shop = $item->shop;
                $item->embed_shop = [
                    'name' => $shop->name,
                    'id' => $shop->id,
                    'shopid' => $shop->shopid,
                    'portrait' => $shop->portrait,
                    'rating_bad' => $shop->rating_bad,
                    'rating_normal' => $shop->rating_normal,
                    'rating_good' => $shop->rating_good,
                    'rating_star' => $shop->rating_star,
                ];
                $flagChangeItem = true;
            }
        }


        // keyword
        $skip = rand(0, 536000);
        $keywords = AdminKeyword::where('status', 1)
            ->where('no', '>', $skip)
            ->orderBy('no', 'asc')
            ->limit(20)
            ->get();

        $otherItems = ShopeeItem::where('id', '!=', $item->id);
        if ($item->direct_cate_id) {
            $otherItems = $otherItems->where('direct_cate_id', $item->direct_cate_id);
        }
        if ($item->ctime) {
            $otherItems = $otherItems->where('ctime', '<', $item->ctime);
        }
        $otherItems = $otherItems->select([
            'name',
            'slug',
            'id',
            'price',
            'image',
            'itemid',
            'shopid',
        ])
            ->limit(8)
            //->orderBy('ctime', 'desc')
            ->get();

        if ($flagChangeItem) {
            $item->save();
        }

        // category
        $cacheHelper = app()->make(CacheHelpers::class);
        $category = $cacheHelper->getCategoryByCateid($item->direct_cate_id);
        $parentCategory = null;
        if ($category) {
            $parentCategory = $cacheHelper->getCategoryId($category->shopee_category_id);
        }

        $metaData = $this->getItemDetailMetaData($item);
        $schemaData = $this->getItemDetailSchemaData($item, $category, $parentCategory);
        $sortDescription = $this->getSortDescription($item);

        return $this->renderView('pages.detail.index', compact('item', 'keywords', 'otherItems', 'metaData', 'schemaData', 'sortDescription'));
    }

    /**
     * function description
     *
     * @return array
     * @throws \Laracodes\Presenter\Exceptions\PresenterException
     */
    protected function getItemDetailMetaData(ShopeeItem $item)
    {
        return [
            'meta_description' => __('meta.pages.detail.meta_description', ['itemname' => $item->name]),
            'meta_keywords' => '',
            'meta_og_image' => $item->present()->image,
            'meta_og_url' => route('item', ['slug' => $item->present()->slugForDetailPage]),
            'meta_og_title' => $item->name . ' | ' . trans('meta.web_name'),
        ];
    }

    /**
     * function description
     *
     * @param \App\Models\ShopeeItem $item
     * @param $category
     * @param $cateLevel2
     * @return array
     * @throws \Laracodes\Presenter\Exceptions\PresenterException
     */
    protected function getItemDetailSchemaData(ShopeeItem $item, $category, $cateLevel2): array
    {
        $embedShop = $item->embed_shop;
        $brand = $item->embed_brand;
        $shop = new ShopeeShop();
        $shop->fill($embedShop);

        $itemData = [
            '@context' => 'http://schema.org',
            '@type' => 'Product',
            'name' => $item->name,
            'description' => $item->description,
            'url' => route('item', ['slug' => $item->present()->slugForDetailPage]),
            'productID' => $item->itemid,
            'image' => $item->present()->image,
            'brand' => data_get($brand, 'name'),
            'offers' => [
                '@type' => 'Offer',
                'price' => $item->present()->price,
                'priceCurrency' => config('domains.currency_full'),
                'seller' => [
                    '@context' => 'http://schema.org',
                    '@type' => 'Organization',
                    'name' => data_get($shop, 'shop'),
                    'url' => route('home'),
                    'image' => $shop ? $shop->present()->image : '',
                    'aggregateRating' => [
                        '@type' => 'AggregateRating',
                        'bestRating' => 5,
                        'worstRating' => 1,
                        'ratingCount' => $shop ? $shop->present()->ratingCount : '',
                        'ratingValue' => $shop ? $shop->present()->shortenRating : '',
                    ],
                ],
                'itemCondition' => 'NewCondition',
                'availability' => 'http://schema.org/InStock',
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'bestRating' => 5,
                'worstRating' => 1,
                'ratingCount' => $item->present()->ratingCount,
                'ratingValue' => intval(round(data_get($item, 'item_rating.rating_star'))),
            ],
        ];

        $breadCrumb = [
            '@context' => 'http://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                0 => [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'item' => [
                        '@id' => route('home'),
                        'name' => 'Shopee',
                    ],
                ],
                1 => [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'item' => [
                        '@id' => $cateLevel2 ? route('category', ['slug' => data_get($cateLevel2, 'slug')]) : '',
                        'name' => data_get($cateLevel2, 'display_name'),
                    ],
                ],
                2 => [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'item' => [
                        '@id' => $category ? route('category', ['slug' => data_get($category, 'slug')]) : '',
                        'name' => data_get($category, 'display_name'),
                    ],
                ],
                3 => [
                    '@type' => 'ListItem',
                    'position' => 4,
                    'item' => [
                        '@id' => route('item', ['slug' => $item->present()->slugForDetailPage]),
                        'name' => $item->name,
                    ],
                ],
            ],
        ];

        $response['itemData'] = $itemData;
        $response['breadCrumb'] = $breadCrumb;

        return $response;
    }

    /**
     * function description
     * @param $item
     * @return string
     */
    public function getSortDescription($item)
    {
        $text = '';
        $text = $text . 'S???n ph???m <strong>' . $item->name . '</strong> ??ang ???????c m??? b??n v???i m???c gi?? si??u t???t khi mua online, ';
        if ($item->discount) {
            $text = $text . 'V???a ???????c gi???m gi?? t??? <strong>' . $item->present()->priceBeforeDiscount . '</strong> xu???ng c??n <strong>'
                . $item->present()->priceFormatWithCurrency . '</strong>, ';
        }
        $text = $text . 'giao h??ng online tr??n to??n qu???c v???i chi ph?? ti???t ki???m nh???t,';
        $text = $text . $item->sold . ' ???? ???????c b??n ra k??? t??? l??c ch??o b??n l???n cu???i c??ng.';
        return $text . 'Tr??n ????y l?? s??? li???u v??? s???n ph???m ch??ng t??i th???ng k?? v?? g???i ?????n b???n, hi v???ng v???i nh???ng g???i ?? ??? tr??n gi??p b???n mua s???m t???t h??n t???i ' . config('domains.web_name');
    }

    /**
     * function description
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function redirectToShopee(Request $request)
    {
        $itemid = intval($request->input('itemid'));
        $item = ShopeeItem::where('itemid', $itemid)->first();

        if (!$item) {
            return redirect()->route('home');
        }

        $metaData = $this->getMetaData();
        if ($item->status == config('constant.shopee_item.status.error')) {
            $link = config('domains.url') . '/search?keyword=' . $item->name;
        } else {
            $link = config('domains.url') . '/' . $request->slug . '-i.' . $request->input('shopid') . '.' . $request->input('itemid');
        }

        return view('common.pages.redirect.index', compact('link', 'item', 'metaData'));
    }
}
