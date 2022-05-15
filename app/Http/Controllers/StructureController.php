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

        if(SClass::where('num',$request->class_number)->exists())
        {
            return back()->with('class_exist','This Class Already Exists');
        }

        $new = new SClass();
        $new->num = $request->class_number;
        $new->save();

        return back()->with('class_created','Class Created Successfully');
        
    }

    public function deleteclass($id)
    {
        SClass::where('num',$id)->delete();
        return back()->with('class_deleted','The Class Was Deleted Successfully');
    }

    public function section()
    {
        $classes = SClass::all()->sortBy('num');
        return view('sections',['classes'=>$classes,]);
    }

    public function storesection(Request $request)
    {
        if(Section::where('class_num',$request->class_number)->where('num',$request->section_number)->exists())
        {
            return back()->with('section_exist_'.$request->class_number,'This Section Already Exists In This Class');
        }
        $new = new Section();
        $new->num = $request->section_number;
        $new->class_num = $request->class_number;
        $new->save();
        return back()->with('section_created','Section Created');
    }
}
