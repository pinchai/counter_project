<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    //
    public function index(Request $request){
        $module = 'category';
        return view('admin.category.category',
            ['module'=>$module,]
        );
    }

    public function getCategory(Request $request){
        $data = DB::table('category')
            ->select('*')
            ->get();
        return response()->json($data);
    }

    public function deleteCategory(Request $request){
        $category_id = $request->id;
        $res = DB::table('category')
            ->where('id', $category_id)
            ->delete();
        return response()->json($res);
    }

    public function addCategory(Request $request)
    {
        $name = $request->name;
        $category = DB::table('category')
            ->insert([
            [
                'name' => $name,
            ],
        ]);

        return response()->json($category);
    }

    public function editCategory(Request $request)
    {
        $id = $request->id;
        $name = $request->name;

        $category = DB::table('category')
            ->where('id', $id)
            ->update(
                [
                    'name' => $name,
                ]
            );

        $new_update = DB::table('category')
            ->where('id', $id)
            ->first();
        return response()->json($new_update);
    }

}
