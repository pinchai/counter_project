<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //
    public function index(Request $request){
        $module = 'customer';
        return view('admin.customer.customer',
            ['module'=>$module,]
        );
    }

    public function getCustomer(Request $request){
        $data = DB::table('customer')
            ->select('*')
            ->get();
        return response()->json($data);
    }

    public function deleteCustomer(Request $request){
        $customer_id = $request->id;
        $res = DB::table('customer')
            ->where('id', $customer_id)
            ->delete();
        return response()->json($res);
    }

    public function addCustomer(Request $request)
    {
        $customer = DB::table('customer')
            ->insert([
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'alt_phone' => $request->alt_phone,
                'point' => $request->point,
                'default' => $request->default,
                'current_location' => $request->current_location,
            ],
        ]);

        $last_customer =  DB::table('customer')
            ->orderBy('id', 'desc')
            ->first();

        return response()->json($last_customer);
    }

    public function editCustomer(Request $request)
    {
        $id = $request->id;
        $customer = DB::table('customer')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'alt_phone' => $request->alt_phone,
                    'point' => $request->point,
                    'default' => $request->default,
                    'current_location' => $request->current_location,
                ]
            );

        $new_update = DB::table('customer')
            ->where('id', $id)
            ->first();
        return response()->json($new_update);
    }

}
