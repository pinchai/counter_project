<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    //
    public function index(Request $request){
        $module = 'pos';
        return view('admin.POS.index',
            ['module'=>$module,]
        );
    }

    public function getData(Request $request){
        $category = DB::table('category')
            ->select('*')
            ->get();

        $service = DB::table('service')
            ->join('category','category.id','=', 'service.category_id')
            ->select('service.*', 'category.name as category')
            ->get();

        $customer = DB::table('customer')
            ->select('*')
            ->get();

        return response()->json(
            [
                'category'=>$category,
                'service'=>$service,
                'customer'=>$customer,
            ]
        );
    }


    //
}
