<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
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
class ShopController extends Controller
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
            $shops = Shop::where('name', 'LIKE', '%' . $name . '%')->paginate(20);
        } else {
            $shops = Shop::paginate(20);
        }
        return view('admin.pages.shop.list.index', compact('shops'));
    }

    /**
     * function description
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $shop = new Shop();

        return view('admin.pages.shop.create.index', compact('shop'));
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
            'imageFile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $shop = new Shop();
        $shop->fill($request->all());

        if ($request->hasFile('imageFile')) {
            // save new file
            $shop->image = $request->file('imageFile')->storePublicly(Shop::IMAGE_DIR, Shop::UPLOAD_DISK);
        }
        $shop->slug = Str::slug($shop->name);
        $shop->save();

        return redirect()->route('admin.shops.index')->with("success", "Thêm mới cửa hàng thành công!");
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
        $shop = Shop::findOrFail($id);

        return view('admin.pages.shop.edit.index', compact('shop'));
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
            'imageFile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $shop = Shop::findOrFail($id);

        $shop->fill($request->all());

        if ($request->hasFile('imageFile')) {

            // Delete old file
            $path = Shop::UPLOAD_DISK.'/'.$shop->image;
            $storagePath = storage_path('/app/'.$path);
            if (File::exists($storagePath)) {
                File::delete($storagePath);
            }

            // save new file
            $shop->image = $request->file('imageFile')->storePublicly(Shop::IMAGE_DIR, Shop::UPLOAD_DISK);
        }
        $shop->slug = Str::slug($shop->name);

        $shop->save();

        return redirect()->route('admin.shops.index')->with("success", "Cập nhật dữ liệu thành công!");
    }

    public function destroy($id = 0)
    {
        $shop = Shop::where('_id', $id)->first();
        if ($shop) {
            $shop->delete();
        } else {
            return redirect()->route('admin.shops.index')->with("error", "Dữ liệu không tồn tại!");
        }

        return redirect()->route('admin.shops.index')->with("success", "Xóa dữ liệu thành công!");
    }
}
