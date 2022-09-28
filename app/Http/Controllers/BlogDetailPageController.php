<?php

namespace App\Http\Controllers;

use App\Models\Local\CrawlPost;
use App\Models\Local\CrawlPostDetail;
use App\Models\Reviewer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class BlogDetailPageController
 *
 * @package App\Http\Controllers
 */
class BlogDetailPageController extends BaseController
{
    /**
     * function description
     *
     * @param  Request  $request
     * @param $slug
     * @return Application|Factory|RedirectResponse|View
     */
    public function index(Request $request, $slug = '')
    {
        $arSlug = explode('-', $slug);
        if (count($arSlug)) {
            $postId = intval(last($arSlug));
        } else {
            return redirect()->route('home');
        }

        $post = CrawlPost::where('id', $postId)->production()->with(['crawlKeyword', 'crawlPostDetails'])->first();

        if (!$post) {
            return redirect()->route('home');
        }
        $reviewer = $this->checkAndSetReviewer($post);

        $crawlPostDetails = CrawlPostDetail::crawlDone()->where('crawl_post_id', $postId)->get();

        $relatedPosts = CrawlPost::where('id', '<', $postId)->orderBy('id', 'desc')->production()->limit(4)->get();

        $metaData = $this->getMetaDataCustom($post);

        return $this->renderView('pages.blog_detail.index',
            compact('post', 'metaData', 'relatedPosts', 'crawlPostDetails', 'reviewer'));
    }

    /**
     * function description
     *
     * @param $post
     * @return null
     */
    public function checkAndSetReviewer($post)
    {
        $reviewer = $post->reviewer;
        if (!$reviewer) {
            $reviewers = Reviewer::where('site_identifier', config('constant.site_identifier'))->get();
            if (count($reviewers)) {
                $reviewerTemp = $reviewers->random(1)->first();
                $post->reviewer_id = $reviewerTemp->id;
                $post->save();

                $reviewer = $reviewerTemp;
            }
        }

        return $reviewer;
    }

    /**
     * function description
     *
     * @param $post
     * @return array
     */
    public function getMetaDataCustom($post)
    {
        $metaData = $this->getMetaData();
        $metaData['meta_og_title'] = $post->title . ' - ' . trans('meta.web_name');
        $metaData['meta_description'] = $post->description;
        $metaData['meta_og_image'] = $post->image;
        $metaData['meta_og_url'] = request()->url();

        return $metaData;
    }

    /**
     * function description
     *
     * @param  Request  $request
     * @param  string  $slug
     * @return Application|Factory|RedirectResponse|View
     */
    public function detailItem(Request $request, string $slug = '')
    {
        $arSlug = explode('-', $slug);
        if (count($arSlug)) {
            $postId = intval(last($arSlug));
        } else {
            return redirect()->route('home');
        }
        $post = CrawlPostDetail::where('id', $postId)->first();

        if (!$post) {
            return redirect()->route('home');
        }
        $reviewer = $this->checkAndSetReviewer($post);

        $relatedPosts = CrawlPost::where('id', '<', $postId)->orderBy('id', 'desc')->crawlDone()->limit(4)->get();

        $metaData = $this->getMetaDataCustom($post);

        return $this->renderView('pages.blog_detail_item.index',
            compact('post', 'metaData', 'relatedPosts', 'reviewer'));
    }
}
