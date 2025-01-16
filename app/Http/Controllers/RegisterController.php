<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register');
    }

    public function registerList(Request $request){
        $user = DB::table('users')->select('*')->get();
        return view('register_list', ['user'=>$user]);
    }

    public function doRegister(Request $request){
        $user_name = $request->username;
        $email = $request->email;
        $password = $request->password;
        $user = DB::table('users')->insert([
            [
                'name' => $user_name,
                'email' => $email,
                'password'=>$password
            ],
        ]);
        return redirect('/register-list');
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

    public function deleteUser(Request $request){
        $user_id = $request->id;
        $current_user = DB::table('users')
            ->where('id',  $user_id)
            ->delete();
        return redirect('register-list');
    }

    public function getEdit(Request $request){
        $user_id = $request->id;
        $current_user = DB::table('users')
            ->where('id',  $user_id)
            ->first();

        return view('get_edit', ['current_user'=>$current_user]);
    }

}
