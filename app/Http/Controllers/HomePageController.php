<?php

namespace App\Http\Controllers;

use App\Models\AdminKeyword;
use App\Models\Field;
use App\Models\Local\CrawlPost;
use App\Models\Shop;
use App\Models\ShopeeItem;
use App\Models\ShopeeItemKeyword;
use App\Models\ShopeePromotionItem;
use Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class HomePageController
 *
 * @package App\Http\Controllers
 */
class HomePageController extends BaseController
{
    /**
     * function description
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fields = Field::where("menu_id", "1")->get();
        $shops = Shop::all();

        return view('client.home.index', compact('fields', 'shops'));
    }
}
