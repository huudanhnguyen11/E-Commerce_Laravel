<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\User;
use App\Models\UserManagement;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->view('admin/user/index', ['users' => $users]);
    }
    public function create()
    {
        return response()->view('admin/user/create');
    }
    public function store(Request $request)
    {
        if ($_FILES['userimage']['tmp_name'] != null) {
            $path = "/assets/images/faces/";
            $filename = $_FILES['userimage']['name'];
            $path = $path . $filename;
            $name = $request->input('name');
            $email = $request->input('email');
            $password = 'abc123';
            $password_Hash = Hash::make($password);
            $phone = $request->input('phone');
            $address = $request->input('address');
            $birthday = $request->input('birthday');
            $role = $request->input('rolename');
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = $password_Hash;
            $user->phone = $phone;
            $user->address = $address;
            $user->birthday = $birthday;
            $user->userimage = $path;
            $user->rolename = $role;
            $user->save();
            return redirect()->route('admin.user.index');
        }
    }
    public function getpassword()
    {
        return response()->view('admin/user/changepassword');
    }
    public function changepassword(Request $request)
    {
        $value = $request->input('password');
        $value_hash = Auth::user()->password;
        $newpassword = Hash::make($request->input('newpassword'));
        $id = (int)Auth::user()->id;
        if(Hash::check($value, $value_hash)){
            User::where('id','=',$id)->update(['password'=>$newpassword]);
            Auth::logout();
            return redirect()->route('admin.dashboard.index');
        }
        return redirect()->route('admin.user.getpassword');
    }
    public function update($id)
    {
        $user = User::find($id);
        return response()->view('admin/user/update', ['user' => $user]);
    }
    public function edit(Request $request)
    {
        $path = "/assets/images/faces/";
        $filename = $_FILES['userimage']['name'];
        $path = $path . $filename;
        User::where('id','=',(int)$request->input('id_update'))->
        update(['name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'phone'=>$request->input('phone'),
        'address'=>$request->input('address'),
        'birthday'=>$request->input('birthday'),
        'userimage'=>$path,
        'rolename'=>$request->input('rolename')]);
        return redirect()->route('admin.user.index');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
