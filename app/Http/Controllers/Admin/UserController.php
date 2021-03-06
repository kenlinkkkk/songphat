<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $user = Auth::user();
        $data = compact('user');

        return view('admin.user.info', $data);
    }

    public function changePassword(UserRequest $request)
    {
        $user = Auth::user();

        $data = $request->except('_token');
        if (password_verify($data['password_old'], $user->password)) {
            if ($data['password_new'] == $data['password_confirm']) {
                try {
                    $result = User::find($user->id)->update(['password' => Hash::make($data['password_new'])]);

                    Auth::logout();
                    return redirect(route('login'));
                } catch (Throwable $exception) {
                    report($exception);
                }
            } else {
                $request->session()->flash('error', 'Mật khẩu mới không trùng nhau');
                return redirect(route('admin.profile'));
            }
        } else {
            $request->session()->flash('error', 'Mật khẩu hiện tại không chính xác');
            return redirect(route('admin.profile'));
        }
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $path = url('/uploads/post').'/'.$file->getClientOriginalName();
        $filePath = 'uploads/post';
        $filePath = str_replace('\\', '/', $filePath);
        $image = Image::make($file->path());
        $image->save($filePath .'/'. $file->getClientOriginalName(), 72);
        $fileNameToStore= $path;

        return json_encode(['location' => $fileNameToStore]);
    }

    public function userList()
    {
        $users = User::query()->paginate(10);
        $data = compact('users');

        return view('admin.user.user_list', $data);
    }

    public function add()
    {
        $roles = Role::query()->get();
        $data = compact('roles');
        return view('admin.user.add', $data);
    }

    public function edit($id)
    {
        $roles = Role::query()->get();
        $user = User::query()->whereKey($id)->first();
        $data = compact(
            'user',
            'roles'
        );
        return view('admin.user.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');

        DB::beginTransaction();
        try {
            $user = Factory(User::class)->create([
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'name' => $data['name']
            ]);
            $role = Role::query()->whereKey($data['role'])->first();
            $user->assignRole($role);
            DB::commit();
            if ($user) {
                $request->session()->flash('success', 'Thêm mới thành công');
            } else {
                $request->session()->flash('error', 'Thêm mới thất bại');
            }

            return Redirect::route('admin.user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return report($exception);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        DB::beginTransaction();
        try {
            $user = User::query()->whereKey($id)->first();
            $user->fill($data);
            $user->save();
            $role = Role::query()->whereKey($data['role'])->first();
            $user->assignRole($role);
            DB::commit();
            if ($user) {
                $request->session()->flash('success', 'Cập nhật thành công');
            } else {
                $request->session()->flash('error', 'Cập nhật thất bại');
            }

            return Redirect::route('admin.user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return report($exception);
        }
    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $permission = Role::query()->where('model_id', '=', $id)->forceDelete();
            $result = User::query()->whereKey($id)->forceDelete();
            DB::commit();
            if ($result && $permission) {
                $request->session()->flash('success', 'Xóa thành công');
            } else {
                $request->session()->flash('error', 'Xóa thất bại');
            }

            return Redirect::back();
        } catch (\Exception $exception) {
            DB::rollBack();
            return report($exception);
        }
    }
}
