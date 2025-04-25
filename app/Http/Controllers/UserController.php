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
        return view('admin.user.user',
            ['module'=>$module,]
        );
    }

    public function getUser(Request $request){
        $data = DB::table('users')->select('*')->get();
        return response()->json($data);
    }

    public function deleteUser(Request $request){
        $user_id = $request->id;
        $res = DB::table('users')->where('id', $user_id)->delete();
        return response()->json($res);
    }

    public function addUser(Request $request)
    {
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;

        $user = DB::table('users')->insert([
            [
                'name' => $username,
                'email' => $email,
                'password'=>Hash::make($password),
                'role'=>$role,
                'branch_id'=>1,
            ],
        ]);

        return response()->json($user);
    }

    public function editUser(Request $request)
    {
        $id = $request->id;
        $username = $request->username;
        $email = $request->email;
        $role = $request->role;

        $user = DB::table('users')
            ->where('id', $id)
            ->update(
                [
                    'name' => $username,
                    'email' => $email,
                    'role' => $role,
                ]
            );

        $new_update = DB::table('users')
            ->where('id', $id)
            ->first();
        return response()->json($new_update);
    }
}
