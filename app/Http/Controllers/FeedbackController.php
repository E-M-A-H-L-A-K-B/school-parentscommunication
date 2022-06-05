<?php

namespace App\Http\Controllers;

use App\Models\ParentNote;
use App\Models\SchoolNote;
use Illuminate\Http\Request;
use App\Models\SClass;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function sendparentfeedback()
    {
        return view('sendfeedback',['student'=>false]);
    }
    
    public function storeparentfeedback(Request $request)
    {
        $creds = $request->validate([
            'content'=>['required','min:10','max:100'],
        ]);
        $new = new ParentNote();

        $new->content = $request->content;
        $new->student_id = Auth::guard('student')->user()->id;
        $new->section_id = Auth::guard('student')->user()->section->id;

        $new->save();

        return back()->with('feedback_created','Feedback sent To Guide');
    }

    public function viewschoolfeedback()
    {
        $feedbacks = SchoolNote::where('student_id',Auth::guard('student')->user()->id)->orderBy('created_at','desc')->get();

        return view('schoolfeedback',['feedbacks'=>$feedbacks,]);
    }

    public function sendstafffeedback($id)
    {
        return view('sendfeedback',['student'=>$id]);
    }

    public function storestafffeedback(Request $request, $id)
    {
        $new = new SchoolNote();
        $student = Student::find($id);
        $new->content = $request->content;
        $new->user_id = Auth::user()->id;
        $new->student_id = $id;

        if(Auth::user()->subjects->count())
        {
            $subject = DB::table('subject_teacher')
                            ->select('subject_id')
                            ->where('section_id','=',$student->section_id)
                            ->where('teacher_id','=',Auth::user()->id)
                            ->get()[0];
            $new->subject_id = $subject->subject_id;
        }

        $new->save();
        
        return back()->with('feedback_created','Feedback Sent To Student');
    }

    public function viewparentsfeedback()
    {
        $sections = array();
        foreach(Auth::user()->sections as $section)
        {
            array_push($sections,$section->id);
        }

        $feedbacks = ParentNote::whereIn('section_id',$sections)->orderBy('created_at','desc')->get();

        return view('parentsfeedback',['feedbacks'=>$feedbacks,]);
    }

    public function viewstudents()
    {
        $sections = array();
        foreach(Auth::user()->sections as $section)
        {
            array_push($sections,$section->id);
        }
        $classes = SClass::all();

        return view('staffstudents',['classes'=>$classes,'sections'=>$sections]);
    }
}
