<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SClass;
use App\Models\Section;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        return view('addclass',['classes'=>$classes,]);
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

    public function deletesection($id)
    {
        Section::find($id)->delete();
        return back()->with('section_deleted',"Section Was Deleted Successfully");
    }

    public function subject()
    {
        $classes = SClass::all()->sortBy('num');
        return view('subjects',['classes'=>$classes,]);
    }

    public function storesubject(Request $request)
    {
        if(Subject::where('class_num',$request->class_number)->where('name',$request->subject_name)->exists())
        {
            return back()->with('subject_exist_'.$request->class_number,'This Subject Already Exists In This Class');
        }
        $new = new Subject();
        $new->name = $request->subject_name;
        $new->class_num = $request->class_number;
        $new->save();
        return back()->with('subject_created','Subject Created');
    }

    public function deletesubject($id)
    {
        Subject::find($id)->delete();
        return back()->with('subject_deleted',"Subject Was Deleted Successfully");
    }

    public function teachers()
    {
        $teachers = User::where('teacher',true)->get();
        return view('teachers',['teachers'=>$teachers,]);
    }

    public function subject_teacher($id)
    {
        $classes = SClass::all();
        $teacher = User::find($id);
        return view('subject_teacher',['teacher'=>$teacher,'classes'=>$classes,]);
    }

    public function storesubject_teacher($id, $section, $subject)
    {
        DB::table('subject_teacher')
        ->insert([
            'teacher_id'=>$id,
            'section_id'=>$section,
            'subject_id'=>$subject,
        ]);
        return back()->with('subject_teacher_added','Subject Added To The Teacher');
    }

    public function deletesubject_teacher($id, $section, $subject)
    {
        DB::table('subject_teacher')
        ->where('teacher_id','=',$id)
        ->where('section_id','=',$section)
        ->where('subject_id','=',$subject)
        ->delete();
        return back()->with('subject_teacher_deleted','Subject Deleted From The Teacher');
    }
}
