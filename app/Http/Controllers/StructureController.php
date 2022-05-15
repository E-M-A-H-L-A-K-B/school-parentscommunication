<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SClass;
use App\Models\Section;

class StructureController extends Controller
{
    //

    public function main()
    {
        return view('structuremain');
    }

    public function SClass()
    {
        $classes = SClass::all()->sortBy('num');
        return view('classes',['classes'=>$classes,]);
    }

    public function storeclass(Request $request)
    {
        if($request->class_number < 1 || $request->class_number > 12)
        {
            return back()->with('number_error','The Class Number Must Be Between 1 and 12');
        }

        error_log("Finished Validation");
        if(SClass::where('num',$request->class_number)->exists())
        {
            return back()->with('class_exist','This Class Already Exists');
        }

        $new = new SClass();
        $new->num = $request->class_number;
        $new->save();

        return back()->with('class_created','Class Created Successfully');
        
    }
}
