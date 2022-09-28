<?php

namespace App\Http\Controllers;

use App\Models\ShopeeItem;
use App\Models\ShopeeShop;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laracodes\Presenter\Exceptions\PresenterException;
use NumberFormatter;

/**
 * Class ShopPageController
 *
 * @package App\Http\Controllers
 */
class ShopPageController extends BaseController
{
    /**
     * function description
     *
     * @param Request $request
     * @param string $slug
     * @return Application|Factory|RedirectResponse|View
     * @throws PresenterException
     */
    public function index(Request $request, string $slug = '')
    {
        $arSlug = explode('-', $slug);

        if (count($arSlug)) {
            $shopid = intval(last($arSlug));
        } else {
            return redirect()->route('home');
        }
        $shop = ShopeeShop::where('shopid', $shopid)->first();

        $items = ShopeeItem::where('shopid', $shopid)
            ->limit(24)
            ->select([
                'name',
                'slug',
                'id',
                'price',
                'image',
                'itemid',
                'shopid',
            ])
            ->get();

        $otherShops = ShopeeShop::where('shopid', '>', $shopid)->limit(5)->get();

        $metaData = $this->getMetaData();

        $extraInfo = $this->getExtraInfoShop($shop);

        return $this->renderView(
            'pages.shop_detail.index',
            compact('shop', 'items', 'otherShops', 'extraInfo', 'metaData')
        );
    }

    /**
     * function description
     *
     * @param ShopeeShop $shop
     * @return array
     * @throws PresenterException
     */
    public function getExtraInfoShop(ShopeeShop $shop)
    {
        $response = [];
        $f = new NumberFormatter("vi", NumberFormatter::SPELLOUT);
        $textRatingCount = $f->format($shop->present()->ratingCount());

        $text = $shop->name . ' là một người bán hàng tốt trên Shopee. ';
        $text = $text . $shop->name . ' đã nhận được phản hồi từ ' . $textRatingCount
            . ' khách hàng với số điểm trung bình là ' . $shop->present()->getRatingStar(2)
            . ' sao, có nghĩ là phần lớn người mua hàng hài lòng với họ.';
        $response['rate'] = $text;

        $text3 = $shop->name . ' hiện đang có sẵn ' . $shop->item_count . ' để bán. ';
        $text3 = $text3 . 'Các sản phẩm của ' . $shop->name . ' được giao từ ' . $shop->shop_location . '.';

        $response['product'] = $text3;

        return $response;
    }
}