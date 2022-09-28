<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Services\Crawl\CrawlPostService;
use App\Support\StringHelper;
use Artisan;
use Elasticsearch\ClientBuilder;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Modules\Crawl\Models\ShopeeCategory;
use Modules\Crawl\Models\ShopeeItem;
use Modules\Crawl\Services\CrawlShopeeService;
use Str;

/**
 * Class TestController
 *
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    /**
     * @var Client
     */
    protected $httpClient = null;

    public function test(Request $request)
    {
        if($cacheToken = $request->input('cache_token')) {
            $admin = Admin::where('cache_token', $cacheToken)->first();
            if ($admin) {
                Artisan::call('cache:clear');
                return redirect()->route('home');
            }
        }
        if (app()->environment() == 'production') {
            return redirect()->route('home');
        }

        $service = app()->make(CrawlPostService::class);
        $service->crawlBodyPostDetails();

        //$this->getListItems();
        //$this->getDetailItems();
//        $this->updateIndex();
    }

}
