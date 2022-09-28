<?php

namespace App\Services;

use App\Models\AdminSite;
use App\Models\AdminSiteCategory;
use App\Models\ShopeeCategory;

/**
 * Class SiteServices
 *
 * @package App\Services
 */
class SiteServices
{
    /**
     * function description
     *
     * @return array
     */
    public function getSiteCategories(): array
    {
        $host = parse_url(request()->url(), PHP_URL_HOST);

        $site = AdminSite::where('short_url', $host)->first();
        if (!$site) {
            return [];
        }

        $categoryIds = AdminSiteCategory::where('admin_site_id', $site->id)->pluck('category_level_2_id')->all();
        $shopeeCategories = ShopeeCategory::whereIn('id', $categoryIds)->with(['parent'])->get();

        $siteCategories = [];
        foreach ($shopeeCategories as $shopeeCategory) {
            $parent = $shopeeCategory->parent;
            $newChild = [
                'display_name' => $shopeeCategory->display_name,
                'slug' => $shopeeCategory->slug
            ];

            if ($parent) {
                if (!isset($siteCategories[$parent->id])) {
                    $newParent = [
                        'display_name' => $parent->display_name,
                        'slug' => $parent->slug,
                        'children' => [$newChild]
                    ];
                    $siteCategories[$parent->id] = $newParent;
                } else {
                    array_push($siteCategories[$parent->id]['children'], $newChild);
                }
            }
        }

        return $siteCategories;
    }
}
