<?php

namespace App\Http\Controllers;

use App\Models\Local\CrawlPost;
use Illuminate\Http\Request;

/**
 * Class BlogListController
 *
 * @package App\Http\Controllers
 */
class BlogListPageController extends BaseController
{
    /**
     * function description
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $posts = CrawlPost::production()->with(['reviewer'])->orderBy('id', 'desc')->paginate(9);
        $metaData = $this->getMetaData();

        return $this->renderView('pages.blog_list.index', compact('posts', 'metaData'));
    }
}