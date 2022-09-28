<?php

namespace App\Http\Controllers;

use App\Models\AdminKeywordReviewer;
use App\Models\Local\CrawlPost;
use App\Models\Reviewer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ReviewerPageController
 *
 * @package App\Http\Controllers
 */
class ReviewerPageController extends BaseController
{
    /**
     * function description
     *
     * @param Request $request
     * @param $slug
     * @return Application|Factory|RedirectResponse|View
     */
    public function index(Request $request, $slug = '')
    {
        $reviewer = Reviewer::where('site_identifier', config('constant.site_identifier'))->where('slug', $slug)->first();

        if (!$reviewer) {
            return redirect()->route('home');
        }

        $adminKeywordReviewers  = AdminKeywordReviewer::where('reviewer_id', $reviewer->id)->with(['adminKeyword'])->paginate(12);

        $posts = CrawlPost::production()->orderBy('id', 'desc')->where('reviewer_id', $reviewer->id)->limit(12)->get();


        $metaData = $this->getMetaDataCustom($reviewer);

        return $this->renderView(
            'pages.reviewer.index',
            compact('reviewer', 'adminKeywordReviewers', 'metaData', 'posts')
        );
    }

    /**
     * function description
     *
     * @param CrawlPost $post
     * @return array
     */
    public function getMetaDataCustom(Reviewer $reviewer)
    {
        $metaData = $this->getMetaData();
        $metaData['meta_og_title'] = $reviewer->name . ' - ' .trans('meta.web_name');
        $metaData['meta_description'] = $reviewer->description;
        $metaData['meta_og_image'] = $reviewer->present()->image;
        $metaData['meta_og_url'] = request()->url();

        return $metaData;
    }
}