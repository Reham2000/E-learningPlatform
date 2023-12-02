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
    function getCategories(){
        $categories = Category::all();
        return view('category.categories',compact('categories'));
    }
    function add($id)
    {
        return view('category.add',compact('id'));
    }
    function create(Request $request,$id)
    {
        
        $request->validate([
            'category_name' => 'required|min:2|max:100',
        ]);
        $admin = Category::create([
            'category_name' => $request->category_name,
            'admin_id' => $id,
        ]);
        $categories = Category::all();
        return redirect()->route('category.categories',compact('categories'));
        // return view('category/categories',compact('categories'));
        
    }
    function edite($id)
    {
        $category = Category::find($id);
        return view('category.edite',['id'=> $id,'category'=>$category]);
    }
    function update(Request $request,$id)
    {
        $request->validate([
            'category_name' => 'required|min:2|max:1000',
        ]);

            $category = Category::find($id);
            $category->category_name = $request->category_name ;
            $category->admin_id  = session()->get('id')  ;
            $category->save();

        $categories = Category::all();

        return redirect()->route('category.categories',compact('categories'));
    }
    function delete($id)
    {
        $category = Category::find($id)->delete();
        $categories = Category::all();

        return redirect()->route('category.categories',compact('categories'));
    }

}
