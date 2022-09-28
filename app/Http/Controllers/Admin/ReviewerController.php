<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reviewer;
use File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

/**
 * Class ReviewerController
 *
 * @package App\Http\Controllers\Admin
 */
class ReviewerController extends Controller
{
    /**
     * function description
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $reviewers = Reviewer::where('site_identifier', config('constant.site_identifier'));

        if ($request->input('name')) {
            $name = $request->input('name');
            $reviewers->where('name', 'LIKE', '%' . $name . '%');
        }

        $reviewers = $reviewers->paginate(20);
        return view('admin.pages.reviewer.list.index', compact('reviewers'));
    }

    /**
     * function description
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $reviewer = new Reviewer();

        return view('admin.pages.reviewer.create.index', compact('reviewer'));
    }

    /**
     * function description
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $reviewer = new Reviewer();
        $reviewer->fill($request->all());

        if ($request->hasFile('imageFile')) {
            // save new file
            $reviewer->image = $request->file('imageFile')->storePublicly(Reviewer::IMAGE_DIR, Reviewer::UPLOAD_DISK);
        }
        $reviewer->site_identifier = config('constant.site_identifier');
        $reviewer->slug = Str::slug($reviewer->name);
        $reviewer->save();

        return redirect()->route('admin.reviewers.index');
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
        $reviewer = Reviewer::findOrFail($id);

        return view('admin.pages.reviewer.edit.index', compact('reviewer'));
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
        $reviewer = Reviewer::findOrFail($id);

        $reviewer->fill($request->all());

        if ($request->hasFile('imageFile')) {

            // Delete old file
            $path = Reviewer::UPLOAD_DISK.'/'.$reviewer->image;
            $storagePath = storage_path('/app/'.$path);
            if (File::exists($storagePath)) {
                File::delete($storagePath);
            }

            // save new file
            $reviewer->image = $request->file('imageFile')->storePublicly(Reviewer::IMAGE_DIR, Reviewer::UPLOAD_DISK);
        }
        $reviewer->slug = Str::slug($reviewer->name);
        $reviewer->site_identifier = config('constant.site_identifier');
        $reviewer->save();

        return redirect()->route('admin.reviewers.index');
    }
}