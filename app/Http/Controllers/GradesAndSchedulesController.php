<?php

namespace App\Http\Controllers;

use App\Imports\Students_Grades_Import;
use App\Models\Grade;
use App\Models\SClass;
use App\Models\Student;
use App\Models\WeeklySchedule;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class GradesAndSchedulesController extends Controller
{
    public function addschedule()
    {
        $sections = array();
        foreach(Auth::user()->sections->sortBy('num') as $section)
        {
            array_push($sections,$section->id);
        }
        $classes = SClass::all()->sortBy('num');
        return view('schedules',['classes'=>$classes,'sections'=>$sections]);
    }

    public function StoreSchedule(Request $request,$section)
    {
        $creds = $request->validate([
            'pic'=>'required',
        ]);
        $file = '';

        $pic = $request->file('pic')->move(public_path('schedules'));
        if(WeeklySchedule::where('section_id',$section)->exists())
        {
            $new = WeeklySchedule::where('section_id',$section)->get()[0];
        }
        else
        {
            $new = new WeeklySchedule();
        }

        
        if($request->file('file'))
        {
            $file = $request->file('file')->store('public/PDFs');
            $new->file = $file;
        }
        $new->picture = $pic;
        $new->section_id = $section;
        $new->save();

        return back()->with('file_stored','The Schedule Has Been Stored Successfully');
    }

    public function ViewSchedule()
    {
        $schedule = WeeklySchedule::where('section_id',Auth::guard('student')->user()->section_id)->get()[0];

        return view('viewschedule',['schedule'=>$schedule]);
    }

    public function DownloadSchedule($file)
    {
        return Storage::download($file,'Schedule for Section '.Auth::guard('student')->user()->section->num.' from class '.Auth::guard('student')->user()->class_num);
    }

    public function showsections()
    {
        $sections = array();
        foreach(Auth::user()->sections->sortBy('num') as $section)
        {
            array_push($sections,$section->id);
        }
        $classes = SClass::all()->sortBy('num');
        return view('setgrades',['classes'=>$classes,'sections'=>$sections,]);
    }

    public function setgrades(Request $request,$subject)
    {
        $import =new Students_Grades_Import;
        Excel::import($import,$request->file('file'));
        $array = $import->getArray();
        $count = sizeof($array);
        error_log("Controller Array Count: ".$count);
        foreach($array as $row)
        {
            $student=Student::where('name',$row['name'])
                            ->where('father',$row['father'])
                            ->where('last_name',$row['last_name'])
                            ->first();
            
            $grade = new Grade();
            $grade->student_id = $student->id;
            $grade->subject_id = $subject;
            $grade->number = $row['grade'];
            $grade->save();
        }

        return back()->with('test_complete','The Test Is Completed');
    }
}
