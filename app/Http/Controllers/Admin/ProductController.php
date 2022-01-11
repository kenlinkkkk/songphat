<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    const IMAGE_SIZE_ICON = ['w' => 64, 'h' => 64];
    public function __construct()
    {

    }

    public function index()
    {
        $products = Product::query()->where('status', '=', 1)->paginate(10);
        $data = compact('products');
        return view('admin.product.index', $data);
    }

    public function add()
    {
        return view('admin.product.add');
    }

    public function edit($id)
    {
        $product = Product::query()->whereKey($id)->first();

        $data = compact('product');

        return view('admin.product.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');
        if ($data['slug'] ==  null) {
            $data['slug'] = url_slug($data['name'], ['timestamps' => true]);
        }

        if ($request->hasFile('picture')) {
            $picture = $request->picture;
            $input['image_thumbnail'] ='thumbnail64_'.$picture->getClientOriginalName();
            $filePath = 'uploads/home';
            $filePath = str_replace('\\', '/', $filePath);

            $image1 = Image::make($picture->path());
            $image1->fit(self::IMAGE_SIZE_ICON['w'], self::IMAGE_SIZE_ICON['h'], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filePath .'/'.$input['image_thumbnail']);

            $picture_name = $picture->getClientOriginalName();
            $picture->move($filePath, $picture_name);
            $data['picture'] = $picture_name;
        }

        try {
            $result = Product::query()->create($data);
            if ($result) {
                $request->session()->flash('success', 'Thêm thành công');
            } else {
                $request->session()->flash('error', 'Thêm mới thất bại');
            }

            return Redirect::route('admin.product.index');
        } catch (\Exception $exception) {
            return report($exception);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        if ($request->hasFile('picture')) {
            $picture = $request->picture;
            $input['image_thumbnail'] ='thumbnail64_'.$picture->getClientOriginalName();
            $filePath = 'uploads/home';
            $filePath = str_replace('\\', '/', $filePath);

            $image1 = Image::make($picture->path());
            $image1->fit(self::IMAGE_SIZE_ICON['w'], self::IMAGE_SIZE_ICON['h'], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filePath .'/'.$input['image_thumbnail']);

            $picture_name = $picture->getClientOriginalName();
            $picture->move($filePath, $picture_name);
            $data['picture'] = $picture_name;
        }
        $product = Product::query()->whereKey($id)->first();

        try {
            $product->fill($data);
            $result = $product->save();

            if ($result) {
                $request->session()->flash('success', 'Thêm thành công');
            } else {
                $request->session()->flash('error', 'Thêm mới thất bại');
            }

            return Redirect::route('admin.product.index');
        } catch (\Exception $exception) {
            return report($exception);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $result = Product::query()->whereKey($id)->forceDelete();

            if ($result) {
                $request->session()->flash('success', 'Thêm thành công');
            } else {
                $request->session()->flash('error', 'Thêm mới thất bại');
            }

            return Redirect::back();
        } catch (\Exception $exception) {
            return report($exception);
        }
    }
}
