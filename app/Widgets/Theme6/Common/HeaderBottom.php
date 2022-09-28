<?php

namespace App\Widgets\Theme6\Common;

use App\Services\SiteServices;
use Arrilot\Widgets\AbstractWidget;
use Cache;


/**
 * Class HeaderBottom
 *
 * @package App\Widgets\Theme6\Common
 */
class HeaderBottom extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $cacheTime = 60 * 60;

        $siteCategories = Cache::remember('site_categories', $cacheTime, function () {
            $siteService = app()->make(SiteServices::class);
            return $siteService->getSiteCategories();
        });

        return view(config('theme.default_theme').'.layouts.partials.header_bottom' , [
            'config' => $this->config,
            'siteCategories' => $siteCategories,
        ]);
    }
}
