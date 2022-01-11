<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    const IMAGE_THUMBNAIL = ['w' => 320, 'h' => 180];
    public function __construct()
    {

    }

    public function index()
    {
        if (Auth::user()->hasRole('SuperAdmin') || Auth::user()->hasRole('Admin')) {
            $posts = Post::query()->orderByDesc('created_at')->paginate(10);
        } else {
            $posts = Post::query()->where('status', '=', 1)->orderByDesc('created_at')->paginate(10);
        }
        $data = compact('posts');

        return view('admin.post.index', $data);
    }

    public function add()
    {
        $postType = PostType::query()->where('status', '=', 1)->get();
        $data = compact('postType');
        return view('admin.post.add', $data);
    }

    public function edit($id)
    {
        $post = Post::query()->whereKey($id)->first();
        $postType = PostType::query()->where('status', '=', 1)->get();
        $data = compact('post', 'postType');

        return view('admin.post.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('token');
        if ($data['slug'] == null) {
            $data['slug'] = url_slug($data['title'], ['timestamps' => true]);
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
            $result = Post::query()->create($data);
            if ($result) {
                $request->session()->flash('success', 'Thêm thành công');
            } else {
                $request->session()->flash('error', 'Thêm mới thất bại');
            }

            return Redirect::route('admin.post.index');
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
        $post = Post::query()->whereKey($id)->first();

        try {
            $post->fill($data);
            $result = $post->save();

            if ($result) {
                $request->session()->flash('success', 'Thêm thành công');
            } else {
                $request->session()->flash('error', 'Thêm mới thất bại');
            }

            return Redirect::route('admin.post.index');
        } catch (\Exception $exception) {
            return report($exception);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $result = Post::query()->whereKey($id)->forceDelete();

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
