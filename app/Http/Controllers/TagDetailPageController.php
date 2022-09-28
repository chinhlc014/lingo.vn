<?php

namespace App\Http\Controllers;

use App\Models\AdminKeyword;
use App\Models\AdminKeywordReviewer;
use App\Models\Reviewer;
use App\Models\ShopeeItem;
use App\Models\ShopeeItemKeyword;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

/**
 * Class TagDetailPageController
 *
 * @package App\Http\Controllers
 */
class TagDetailPageController extends BaseController
{
    /**
     * This is a Description
     *
     * @param Request $request
     * @param string $slug
     * @return Application|Factory|RedirectResponse|View
     */
    public function index(Request $request, string $slug = '')
    {
        $keyword = AdminKeyword::with(['adminKeywordSites' => function($q) {
                $q->where( 'site_identifier', config('constant.site_identifier'));
            }])
            ->where('slug', $slug)->first();
        if (!$keyword) {
            return redirect()->route('home');
        }

        $shopeeItemKeywords = ShopeeItemKeyword::where('keyword_id', $keyword->id)->limit(30);

        $reviewer = $this->checkAndSetReviewer($keyword);

        $itemids = $shopeeItemKeywords->pluck('itemid')->all();

        $items = ShopeeItem::whereIn('itemid', $itemids)->limit(30)->get();
        $firstWord = explode(" ", $keyword->name);
        $firstWord = count($firstWord) >= 2 ? $firstWord[0] . ' ' . $firstWord[1] : $firstWord[0];
        $relatedKeywords = AdminKeyword::where('name', 'like', "%{$firstWord}%")->limit(5)->get();

        $nextKeywords = AdminKeyword::where('no', '>', $keyword->no)->orderBy('no')->limit(12)->get();

        $metaData = $this->getMetaDataCustom($keyword, $items);
        $schemaData = $this->getSchemaData($metaData);
        return $this->renderView(
            'pages.tag_detail.index',
            compact('keyword', 'items', 'metaData', 'schemaData', 'relatedKeywords', 'reviewer', 'nextKeywords')
        );
    }

    /**
     * function description
     *
     * @param $keyword
     * @return null
     */
    public function checkAndSetReviewer($keyword)
    {
        $reviewer = null;
        $adminKeywordReviewer = AdminKeywordReviewer::where('admin_keyword_id', $keyword->id)->first();
        if (!$adminKeywordReviewer) {
            $reviewers = Reviewer::where('site_identifier', config('constant.site_identifier'))->get();
            if (count($reviewers)) {
                $reviewerTemp = $reviewers->random(1)->first();
                $adminKeywordReviewer = new AdminKeywordReviewer();
                $adminKeywordReviewer->reviewer_id = $reviewerTemp->id;
                $adminKeywordReviewer->admin_keyword_id = $keyword->id;
                $adminKeywordReviewer->save();

                $reviewer = $reviewerTemp;
            }
        } else {
            $reviewer = Reviewer::where('id', $adminKeywordReviewer->reviewer_id)->first();
        }
        return $reviewer;
    }

    /**
     * This is a Description
     *
     * @param $keyword
     * @param $items
     * @return array
     */
    public function getMetaDataCustom($keyword, $items)
    {
        $metaData = $this->getMetaData();

        $itemNames = $items->pluck('name')->all();
        $tagRelated = implode(', ', $itemNames);
        $metaData['meta_description'] = trans('pages.tag_detail.meta_description', [
            'tag_name' => $keyword->name,
            'tag_related' => Str::limit($tagRelated, 90),
        ]);

        $metaData['meta_og_title'] = $keyword->name;

        if ($items->count()) {
            $item = $items->first();
            $metaData['meta_og_image'] = $item->present()->image;
        }
        $metaData['meta_og_url'] = route('tag_detail', ['slug' => $keyword->slug]);

        return $metaData;
    }

    /**
     * function description
     *
     * @param Request $request
     * @param $slug
     * @return RedirectResponse
     */
    public function tagOld(Request $request, $slug = '')
    {
        return redirect()->route('tag_detail', ['slug' => $slug], 301);
    }
}
