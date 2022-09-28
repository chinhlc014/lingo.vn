<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Local\CrawlKeyword;
use App\Models\Local\CrawlPost;
use App\Models\AdminKeywordSite;
use App\Models\Local\CrawlPostDetail;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class AdminKeywordController
 *
 * @package App\Http\Controllers\Admin
 */
class CrawlPostController extends Controller
{
    /**
     * function description
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $crawlPosts = new CrawlPost();

        if ($request->input('name')) {
            $name = $request->input('name');
            $crawlPosts = $crawlPosts->where('name', 'LIKE', '%' . $name . '%');
        }

        if ($request->input('post_id')) {
            $postId = $request->input('post_id');
            $postId = intval($postId);
            $crawlPosts = $crawlPosts->where('id', $postId);
        }
        $status = [
            config('constant.crawl_post.status.info'),
            config('constant.crawl_post.status.done'),
            config('constant.crawl_post.status.production'),
        ];
        $crawlPosts = $crawlPosts->whereIn('status', $status);

        $crawlPosts = $crawlPosts->paginate(20);

        return view('admin.pages.crawl_post.list.index', compact('crawlPosts'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $request
     * @param  string  $id
     */
    public function destroy(Request $request, $id = '')
    {
        $id = intval($id);
        $crawlPost = CrawlPost::where('id', $id)->first();

        $crawlPostDetails = CrawlPostDetail::where('crawl_post_id', $id)->get();
        foreach ($crawlPostDetails as $crawlPostDetail) {
            $crawlPostDetail->delete();
        }

        $keyword = CrawlKeyword::where('id', $crawlPost->crawl_keyword_id)->first();

        $keyword->delete();

        $crawlPost->delete();

        if (request()->ajax()) {
            return response()->json([
                'message' => '',
                'redirect' => true,
            ]);
        }

        return redirect()->route('admin.crawl-posts.index');
    }

}