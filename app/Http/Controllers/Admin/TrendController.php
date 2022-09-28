<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use File;
use Illuminate\View\View;
use App\Models\Trend;

class TrendController extends Controller
{
    /**
     * function description
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $fields = Field::where("menu_id", "3")->get();  // Xu hướng

        if ($request->input('name')) {
            $name = $request->input('name');
            $trends = Trend::where('name', 'LIKE', '%' . $name . '%')->paginate(20);
        } else {
            $trends = Trend::paginate(20);
        }

        return view('admin.pages.trend.list.index', compact('fields', 'trends'));
    }

    /**
     * function description
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $fields = Field::where("menu_id", "3")->get();  // Xu hướng

        $trend = new trend();

        return view('admin.pages.trend.create.index', compact(['trend', 'fields']));
    }

    /**
     * function description
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'field_id' => 'required',
            'title' => 'required',
            "thumbnail" => "required",
            'content' => 'required'
        ]);

        $trend = new trend();
        $trend->fill($request->all());
        if ($request->hasFile('thumbnail')) {
            // save new file
            $trend->thumbnail = $request->file('thumbnail')->storePublicly(Trend::IMAGE_DIR, Trend::UPLOAD_DISK);
        }

        $trend->save();

        return redirect()->route('admin.trends.index')->with("success", "Thêm mới thành công!");
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
        $trend = Trend::findOrFail($id);
        $fields = Field::where("menu_id", "3")->get();  // Xu hướng

        return view('admin.pages.trend.edit.index', compact('trend', 'fields'));
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
        $request->validate([
            'field_id' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        $trend = Trend::findOrFail($id);


        $trend->fill($request->all());

        if ($request->hasFile('thumbnail')) {

            // Delete old file
            $path = Trend::UPLOAD_DISK.'/'.$trend->thumbnail;
            $storagePath = storage_path('/app/'.$path);
            if (File::exists($storagePath)) {
                File::delete($storagePath);
            }

            // save new file
            $trend->thumbnail = $request->file('thumbnail')->storePublicly(Trend::IMAGE_DIR, Trend::UPLOAD_DISK);
        }

        $trend->save();


        return redirect()->route('admin.trends.index')->with("success", "Cập nhật dữ liệu thành công!");
    }

    public function destroy($id = 0)
    {
        $trend = Trend::where('_id', $id)->first();
        if ($trend) {
            $trend->delete();
        } else {
            return redirect()->route('admin.home')->with("error", "Dữ liệu không tồn tại!");
        }

        return redirect()->route('admin.home')->with("success", "Xóa dữ liệu thành công!");
    }
}
