<?php

namespace App\Widgets\Theme6\Pages\Home;

use App\Services\SiteServices;
use Arrilot\Widgets\AbstractWidget;
use Cache;

/**
 * Class SidebarHome
 *
 * @package App\Widgets\Pages\Home
 */
class SidebarHome extends AbstractWidget
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

        return view(config('theme.default_theme').'.pages.home.partials.sidebar_home' , [
            'config' => $this->config,
            'siteCategories' => $siteCategories,
        ]);
    }
}
