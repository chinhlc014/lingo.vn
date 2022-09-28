<?php

namespace App\Http\Controllers;

use App\Models\ShopeeCategory;
use App\Models\ShopeeItem;
use Illuminate\Http\Request;

/**
 * Class CategoryPageController
 *
 * @package App\Http\Controllers
 */
class CategoryPageController extends BaseController
{
    /**
     * function description
     *
     * @param \Illuminate\Http\Request $request
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Laracodes\Presenter\Exceptions\PresenterException
     */
    public function index(Request $request, string $slug = '')
    {
        $category = ShopeeCategory::where('slug', $slug)->first();
        if (!$category) {
            return redirect()->route('home');
        }
        $metaData = $this->getCategoryMetaData($category);
        $schemaData = $this->getCategorySchemaData($category);

        $items = ShopeeItem::where('direct_cate_id', $category->catid)->paginate(36);

        return $this->renderView('pages.category.index', compact('items', 'category','metaData', 'schemaData'));
    }

    /**
     * function description
     *
     * @param \App\Models\ShopeeCategory $category
     * @return array
     * @throws \Laracodes\Presenter\Exceptions\PresenterException
     */
    public function getCategoryMetaData(ShopeeCategory $category)
    {
        return [
            'meta_description' => __('meta.pages.category.meta_description', ['catename' => $category->display_name]),
            'meta_keywords' => '',
            'meta_og_image' => $category->present()->image,
            'meta_og_url' => route('item', ['slug' => $category->slug]),
            'meta_og_title' => $category->display_name . ' | ' . trans('meta.web_name'),
        ];
    }

    /**
     * function description
     *
     * @param $category
     * @return array
     */
    public function getCategorySchemaData($category)
    {
        if ($category->level == 1) {
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
                            '@id' => route('category', ['slug' => data_get($category, 'slug')]),
                            'name' => data_get($category, 'display_name'),
                        ],
                    ]
                ],
            ];
        } else {
            $cateLevel2 = $category->parent;

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
                            '@id' => route('category', ['slug' => data_get($cateLevel2, 'slug')]),
                            'name' => data_get($cateLevel2, 'display_name'),
                        ],
                    ],
                    2 => [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'item' => [
                            '@id' => route('category', ['slug' => data_get($category, 'slug')]),
                            'name' => data_get($category, 'display_name'),
                        ],
                    ],
                ],
            ];
        }

        $response['breadCrumb'] = $breadCrumb;

        return $response;
    }
}
