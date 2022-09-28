<?php

namespace App\Support;

use App\Models\ShopeeCategory;
use Cache;

/**
 * Class CacheHelpers
 *
 * @package App\Support
 */
class CacheHelpers
{
    /**
     * function description
     *
     * @return mixed
     */
    public function cacheCategories()
    {
        $cacheTime = 60 * 60;

        return Cache::remember('cache_cate_gory_level_1_2', $cacheTime, function () {
            return ShopeeCategory::whereIn('level', [1, 2])->get();
        });
    }

    /**
     * function description
     *
     * @param $cateid
     * @return mixed
     */
    public function getCategoryByCateid($cateid)
    {
        $categories = $this->cacheCategories();
        return $categories->where('catid', intval($cateid))->first();
    }

    /**
     * function description
     *
     * @param $shopeeCategoryId
     * @return mixed
     */
    public function getCategoryId($shopeeCategoryId)
    {
        $categories = $this->cacheCategories();
        return $categories->where('id', intval($shopeeCategoryId))->first();
    }
}
