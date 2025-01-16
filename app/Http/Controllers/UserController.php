<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(Request $request){
        $module = 'user';
        $user = DB::table('users')
            ->get();
        return view('admin.user.user',
            [
                'module'=>$module,
                'user'=>$user,
            ]
        );
    }
    public function addUser(Request $request){
        $module = 'user';
        return view('admin.user.add', ['module'=>$module]);
    }
    public function editUser(Request $request){
        $module = 'user';
        return view('admin.user.edit', ['module'=>$module]);
    }
    public function deleteUser(Request $request){
        $module = 'user';
        return view('admin.user.delete', ['module'=>$module]);
    }
    public function createUser(Request $request){
        $user_name = $request->username;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        $user = DB::table('users')->insert([
            [
                'name' => $user_name,
                'email' => $email,
                'password'=>Hash::make($password),
                'role'=>$role,
            ],
        ]);
        return redirect('/admin/user');
    }

    public function doEdit(Request $request){
        $id = $request->user_id;
        $user_name = $request->username;
        $email = $request->email;
        $user = DB::table('users')
            ->where('id', $id)
            ->update(
                [
                    'name' => $user_name,
                    'email' => $email
                ]
            );

        return redirect('/register-list');
    }

    public function confirmDelete(Request $request){
        $user_id = $request->id;
        $current_user = DB::table('users')
            ->where('id',  $user_id)
            ->first();
        return view('confirm_delete', ['current_user'=>$current_user]);
    }

    public function getEdit(Request $request){
        $user_id = $request->id;
        $current_user = DB::table('users')
            ->where('id',  $user_id)
            ->first();

        return view('get_edit', ['current_user'=>$current_user]);
    }
}
