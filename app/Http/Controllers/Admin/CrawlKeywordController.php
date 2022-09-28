<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\CrawlKeywordsImport;
use App\Models\Local\CrawlKeyword;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use View;

/**
 * Class CrawlKeywordController
 *
 * @package App\Http\Controllers\Admin
 */
class CrawlKeywordController extends Controller
{

    /**
     * function description
     *
     * @param Request $request
     * @return Application|Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keywords = new CrawlKeyword();

        if ($request->input('name')) {
            $name = $request->input('name');
            $keywords->where('name', 'LIKE', '%' . $name . '%');
        }


        $keywords = $keywords->paginate(20);

        return view('admin.pages.crawl_keyword.list.index', compact('keywords'));
    }

    /**
     * function description
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postImport(Request $request)
    {
        set_time_limit(-1);
        ini_set('memory_limit', '2095M');

        if ($request->hasFile('file')) {
            Excel::import(new CrawlKeywordsImport, $request->file('file'));

            return redirect()->route('admin.crawl-keywords.index');
        }

        return redirect()->route('admin.crawl-keywords.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id = 0)
    {
        $keyword = CrawlKeyword::where('id', intval($id))->first();
        if ($keyword) {
            $keyword->delete();
        }

        if (request()->ajax()) {
            return response()->json([
                'message' => '',
                'redirect' => true,
            ]);
        }

        return redirect()->route('admin.crawl-keywords.index');
    }
}