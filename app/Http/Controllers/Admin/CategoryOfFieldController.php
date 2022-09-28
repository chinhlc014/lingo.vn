<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryOfField;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryOfFieldController extends Controller
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
            $fields = CategoryOfField::where('name', 'LIKE', '%' . $name . '%')->paginate(20);
        } else {
            $fields = CategoryOfField::paginate(20);
        }

        return view('admin.pages.categories_of_field.list.index', compact('fields'));
    }

    /**
     * function description
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categoriesOfFields = new CategoryOfField();

        return view('admin.pages.categories_of_field.create.index', compact('categoriesOfFields'));
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
