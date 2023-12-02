<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    //
    function getSupports()
    {
        $supports = Support::all();
        return view('support.supports',compact('supports'));
    }
    function add($id)
    {
        $support = Support::find($id);
        return view('support.add',compact('id','support'));
    }
    function answer(Request $request,$id)
    {
        
        $request->validate([
            'answer' => 'required|min:2|max:1000',
        ]);
        
        $support = Support::find($id);
        $support->answer = $request->answer;
        $support->admin_id = session()->get('id');
        $support->save();

        $supports = Support::all();
        return redirect()->route('support.supports',compact('supports'));
        
    }
}
