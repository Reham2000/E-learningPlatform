<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    function getAllCategories($id = NULL)
    {
        if(Category::where('id',$id)->first()){
        $data = $id ? Category::find($id) : Category::all();
        if(is_null($data))
        {
            return response()->json([
                'status' => 404,
                'message' => "no data found ",
            ]) ;
        }else{

        }
        return response()->json([
            'status' => 200,
            'message' => "OK!",
            'data' => $data
        ]) ;
        }else{
            return response()->json([
                'status' => 404,
                'message' => "no data found with this ID ",
            ]) ;
        }
    }


}
