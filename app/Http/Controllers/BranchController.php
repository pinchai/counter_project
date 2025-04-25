<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BranchController extends Controller
{
    //
    public function index(Request $request){
        $module = 'branch';
        return view('admin.branch.branch',
            ['module'=>$module,]
        );
    }

    public function getBranch(Request $request){
        $data = DB::table('branch')
            ->select('*')
            ->get();
        return response()->json($data);
    }

    public function editBranch(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $logo = $request->logo;
        $location = $request->location;
        $phone = $request->phone;
        $alt_phone = $request->alt_phone;
        $email = $request->email;

        $branch = DB::table('branch')
            ->where('id', $id)
            ->update(
                [
                    'name' => $name,
                    'logo' => $logo,
                    'location' => $location,
                    'phone' => $phone,
                    'alt_phone' => $alt_phone,
                    'email' => $email,
                ]
            );

        $new_update = DB::table('branch')
            ->where('id', $id)
            ->first();
        return response()->json($new_update);
    }
}
