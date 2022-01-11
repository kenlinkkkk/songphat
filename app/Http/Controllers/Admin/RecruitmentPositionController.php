<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecruitmentPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RecruitmentPositionController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $positions = RecruitmentPosition::query()->paginate(10);

        $data = compact('positions');
        return view('admin.position.index', $data);
    }

    public function add()
    {
        return view('admin.position.add');
    }

    public function edit($id)
    {
        $position = RecruitmentPosition::query()->whereKey($id)->first();
        $data = compact('position');
        return view('admin.position.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');
        if ($data['slug'] == null) {
            $data['slug'] = url_slug($data['name']);
        }

        try {
            $result = RecruitmentPosition::query()->create($data);
            if ($result) {
                $request->session()->flash('success', 'Thêm thành công');
            } else {
                $request->session()->flash('error', 'Thêm mới thất bại');
            }

            return Redirect::route('admin.position.index');
        } catch (\Exception $exception) {
            return report($exception);
        }
    }


    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        try {
            $position = RecruitmentPosition::query()->whereKey($id)->first();
            $position->fill($data);
            $result = $position->save();

            if ($result) {
                $request->session()->flash('success', 'Cập nhật thành công');
            } else {
                $request->session()->flash('error', 'Cập nhật thất bại');
            }

            return Redirect::route('admin.position.index');
        } catch (\Exception $exception) {
            return report($exception);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $result = RecruitmentPosition::query()->whereKey($id)->forceDelete();

            if ($result) {
                $request->session()->flash('success', 'Xóa thành công');
            } else {
                $request->session()->flash('error', 'Xóa thất bại');
            }

            return Redirect::back();
        } catch (\Exception $exception) {
            return report($exception);
        }
    }
}
