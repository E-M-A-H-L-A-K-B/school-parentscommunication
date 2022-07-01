<?php

namespace App\Http\Controllers;

use App\Models\ParentNote;
use App\Models\ParentsResponse;
use App\Models\SchoolNote;
use App\Models\SchoolResponse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FeedbackResponseController extends Controller
{
    public function respondToParent(Request $request,$id)
    {
        error_log('started function');
        DB::beginTransaction();
        error_log('entering try catch');
        try
        {
            error_log('entering The Try Part');
            $note = ParentNote::find($id);
            $note->responded = true;
            $note->save();

            error_log('made the entry true');
            $new = new SchoolResponse();
            $new->parent_note_id = $id;
            $new->content = $request->response;
            $new->save();
            error_log('saving response');
            DB::commit();
            error_log('made commit');
            return back()->with('response_created','Response Sent To Parent');
        }
        catch(QueryException $e)
        {
            DB::rollBack();
            return back()->with('response_failed','Response Failed To Be Sent');
        }
    }

    public function respondToSchool(Request $request,$id)
    {
        DB::beginTransaction();
        try
        {
            $note = SchoolNote::find($id);
            $note->responded = true;
            $note->save();

            $new = new ParentsResponse();
            $new->school_note_id = $id;
            $new->content = $request->response;
            $new->save();

            DB::commit();
            return back()->with('response_created','Response Sent To school');
        }
        catch(QueryException $e)
        {
            DB::rollBack();
        }
    }

    public function myfeedbackparents()
    {
        $parents = true;
        $feedbacks = ParentNote::where('student_id',Auth::guard('student')->user()->id)->orderBy('created_at','desc')->get();

        return view('index/My_Feedback',['feedbacks'=>$feedbacks,'parent'=>$parents]);
    }

    public function myfeedbackstaff()
    {
        $parents = false;
        $feedbacks = SchoolNote::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();

        return view('index/My_Feedback',['feedbacks'=>$feedbacks,'parent'=>$parents]);
    }
}
