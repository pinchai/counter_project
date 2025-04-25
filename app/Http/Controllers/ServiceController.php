<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServiceController extends Controller
{
    //
    public function index(Request $request){
        $module = 'service';
        return view('admin.service.service',
            ['module'=>$module,]
        );
    }

    public function getService(Request $request){
        $category_obj = new CategoryController();
        $category = $category_obj->getCategory($request);

        $service = DB::table('service')
            ->join('category','category.id','=', 'service.category_id')
            ->select('service.*', 'category.name as category')
            ->get();
        return response()->json(
            [
                'category'=>$category,
                'service'=>$service
            ]
        );
    }

    public function deleteService(Request $request){
        $service_id = $request->id;
        $res = DB::table('service')
            ->where('id', $service_id)
            ->delete();
        return response()->json($res);
    }

    public function addService(Request $request)
    {
        $name = $request->name;
        $category_id = $request->category_id;
        $cost = $request->cost;
        $price = $request->price;
        $discount = $request->discount;
        $service = DB::table('service')
            ->insert([
            [
                'name' => $name,
                'category_id' => $category_id,
                'cost' => $cost,
                'price' => $price,
                'discount' => $discount,
            ],
        ]);

        return response()->json($service);
    }

    public function editService(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $category_id = $request->category_id;
        $cost = $request->cost;
        $price = $request->price;
        $discount = $request->discount;

        $service = DB::table('service')
            ->where('id', $id)
            ->update(
                [
                    'name' => $name,
                    'category_id' => $category_id,
                    'cost' => $cost,
                    'price' => $price,
                    'discount' => $discount,
                ]
            );

        $new_update = DB::table('service')
            ->where('id', $id)
            ->first();
        return response()->json($new_update);
    }
}
