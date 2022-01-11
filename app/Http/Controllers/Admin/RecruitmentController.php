<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Recruitment;
use App\Models\RecruitmentPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class RecruitmentController extends Controller
{
    const IMAGE_THUMBNAIL = ['w' => 320, 'h' => 180];
    public function __construct()
    {

    }

    public function index()
    {
        $recruitments = Recruitment::query()->with('withPosition')->paginate(10);

        $data = compact('recruitments');
        return view('admin.recruitment.index', $data);
    }

    public function add()
    {
        $positions = RecruitmentPosition::query()->where('status', '=', 1)->get();

        $data = compact('positions');
        return view('admin.recruitment.add', $data);
    }

    public function edit($id)
    {
        $recruitment = Recruitment::query()->whereKey($id)
            ->with('withPosition')->first();
        $positions = RecruitmentPosition::query()->where('status', '=', 1)->get();
        $data = compact(
            'recruitment',
            'positions'
        );
        return view('admin.recruitment.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');
        if ($data['slug'] == null) {
            $data['slug'] = url_slug($data['name'], ['timestamps' => true]);
        }

        if ($request->hasFile('picture')) {
            $picture = $request->picture;
            $input['image_thumbnail'] ='thumbnail64_'.$picture->getClientOriginalName();
            $filePath = 'uploads/home';
            $filePath = str_replace('\\', '/', $filePath);

            $image1 = Image::make($picture->path());
            $image1->fit(self::IMAGE_THUMBNAIL['w'], self::IMAGE_THUMBNAIL['h'], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filePath .'/'.$input['image_thumbnail']);

            $picture_name = $picture->getClientOriginalName();
            $picture->move($filePath, $picture_name);
            $data['picture'] = $picture_name;
        }

        try {
            $result = Recruitment::query()->create($data);
            if ($result) {
                $request->session()->flash('success', 'Thêm thành công');
            } else {
                $request->session()->flash('error', 'Thêm mới thất bại');
            }

            return Redirect::route('admin.recruitment.index');
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
            $image1->fit(self::IMAGE_THUMBNAIL['w'], self::IMAGE_THUMBNAIL['h'], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filePath .'/'.$input['image_thumbnail']);

            $picture_name = $picture->getClientOriginalName();
            $picture->move($filePath, $picture_name);
            $data['picture'] = $picture_name;
        }
        $post = Recruitment::query()->whereKey($id)->first();

        try {
            $post->fill($data);
            $result = $post->save();

            if ($result) {
                $request->session()->flash('success', 'Thêm thành công');
            } else {
                $request->session()->flash('error', 'Thêm mới thất bại');
            }

            return Redirect::route('admin.recruitment.index');
        } catch (\Exception $exception) {
            return report($exception);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $result = Recruitment::query()->whereKey($id)->forceDelete();

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
