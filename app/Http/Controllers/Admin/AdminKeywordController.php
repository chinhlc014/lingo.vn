<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminKeyword;
use App\Models\AdminKeywordSite;
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
class AdminKeywordController extends Controller
{
    /**
     * function description
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $keywords = AdminKeyword::with(['adminKeywordSites' => function($q) {
            $q->where( 'site_identifier', config('constant.site_identifier'));
        }]);

        if ($request->input('name')) {
            $name = $request->input('name');
            $keywords->where('name', 'LIKE', '%' . $name . '%');
        }

        if ($request->input('slug')) {
            $slug = $request->input('slug');
            $keywords->where('slug', 'LIKE', '%' . $slug . '%');
        }

        $keywords = $keywords->paginate(20);

        return view('admin.pages.admin_keyword.list.index', compact('keywords'));
    }

    /**
     * function description
     *
     * @param Request $request
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(Request $request, $id)
    {
        $keyword = AdminKeyword::findOrFail($id);
        $keywordSite = AdminKeywordSite::where('admin_keyword_id', $keyword->id)
            ->where( 'site_identifier', config('constant.site_identifier'))
            ->first();
        if (!$keywordSite) {
            $keywordSite = new AdminKeywordSite();
        }

        return view('admin.pages.admin_keyword.edit.index', compact('keyword', 'keywordSite'));
    }

    /**
     * function description
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $keyword = AdminKeyword::findOrFail($id);
        $keywordSite = AdminKeywordSite::where('admin_keyword_id', $keyword->id)
            ->where( 'site_identifier', config('constant.site_identifier'))
            ->first();
        if (!$keywordSite) {
            $keywordSite = new AdminKeywordSite();
        }
        $keywordSite->fill($request->all());
        $keywordSite->save();

        $keyword->updated_at = Carbon::now();
        $keyword->save();

        return redirect()->route('admin.admin-keywords.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $request
     * @param  string  $id
     */
    public function destroy(Request $request, $id = '')
    {
        $keyword = AdminKeyword::findOrFail($id);

        AdminKeywordSite::where('admin_keyword_id', $keyword->id)->delete();

        $keyword->delete();

        if (request()->ajax()) {
            return response()->json([
                'message' => '',
                'redirect' => true,
            ]);
        }

        return redirect()->route('admin.admin-keywords.index');
    }

}