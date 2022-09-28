<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FieldController extends Controller
{
    /**
     * function description
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        if ($request->input('name')) {
            $name = $request->input('name');
            $fields = Field::where('name', 'LIKE', '%' . $name . '%')->paginate(20);
        } else {
            $fields = Field::paginate(20);
        }

        return view('admin.pages.field.list.index', compact('fields'));
    }

    /**
     * function description
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $field = new Field();

        return view('admin.pages.field.create.index', compact('field'));
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
            'name' => 'required',
            'menu_id' => 'required|integer'
        ]);
        $field = new Field();
        $field->fill($request->all());
        $field->slug = Str::slug($request->name);

        $field->save();

        return redirect()->route('admin.home')->with("success", "Thêm mới thành công!");
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
        $field = Field::findOrFail($id);

        return view('admin.pages.field.edit.index', compact('field'));
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
            'name' => 'required',
            'menu_id' => 'required|integer'
        ]);

        $field = Field::findOrFail($id);

        $field->fill($request->all());
        $field->slug = Str::slug($request->name);

        $field->save();


        return redirect()->route('admin.home')->with("success", "Cập nhật dữ liệu thành công!");
    }

    public function destroy($id = 0)
    {
        $field = Field::where('_id', $id)->first();
        if ($field) {
            $field->delete();
        } else {
            return redirect()->route('admin.home')->with("error", "Dữ liệu không tồn tại!");
        }

        return redirect()->route('admin.home')->with("success", "Xóa dữ liệu thành công!");
    }
}
