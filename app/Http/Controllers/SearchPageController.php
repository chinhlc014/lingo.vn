<?php

namespace App\Http\Controllers;

use App\Models\AdminKeyword;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class SearchPageController
 *
 * @package App\Http\Controllers
 */
class SearchPageController extends BaseController
{
    /**
     * function description
     *
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function index(Request $request)
    {
        $keyword = $request->input('q');
        if (!$keyword) {
            return redirect()->route('home');
        }

        $keywords = AdminKeyword::where('name', 'LIKE', '%' . $keyword . '%');

        $keywords = $keywords->paginate(10);

        $metaData = $this->getMetaData();

        return $this->renderView(
            'pages.search.index',
            compact('keywords', 'metaData')
        );
    }

    /**
     * function description
     *
     * @param Request $request
     * @param $slug
     * @return Application|Factory|RedirectResponse|View
     */
    public function searchStart(Request  $request, $slug = '')
    {
//        if (!$slug) {
//            return redirect()->route('home');
//        }

        $keywords = AdminKeyword::where('name', 'LIKE',  $slug . '%')->paginate(60);
        $metaData = $this->getMetaData();

        return $this->renderView(
            'pages.search_start.index',
            compact('keywords', 'metaData')
        );
    }
}