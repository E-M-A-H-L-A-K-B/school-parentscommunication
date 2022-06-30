<?php

namespace App\Http\Controllers;

use App\Imports\Students_Grades_Import;
use App\Models\Grade;
use App\Models\SClass;
use App\Models\Student;
use App\Models\WeeklySchedule;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\QueryException;
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
        return view('index/schedules',['classes'=>$classes,'sections'=>$sections]);
    }

    public function StoreSchedule(Request $request,$section)
    {
        $creds = $request->validate([
            'pic'=>'required',
        ]);
        $file = '';

        $pic = $request->file('pic');
        $pic_name = time().".".$pic->extension();
        $pic->move(public_path('schedules'),$pic_name);
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
            
            $file = $request->file('file');
            $file_name = time().".".$file->extension();
            $file->move(public_path('PDFs'),$file_name);
            $new->file = $file_name;
        }
        $new->picture = $pic_name;
        $new->section_id = $section;
        $new->save();

        return back()->with('file_stored','The Schedule Has Been Stored Successfully');
    }

    public function ViewSchedule()
    {
        $schedule = WeeklySchedule::where('section_id',Auth::guard('student')->user()->section_id)->get()[0];

        return view('viewschedule',['schedule'=>$schedule]);
    }

    /*public function DownloadSchedule($file)
    {
        return Storage::download(public_path('PDFs').'/'.$file,'Schedule for Section '.Auth::guard('student')->user()->section->num.' from class '.Auth::guard('student')->user()->class_num);
    }*/

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
        DB::beginTransaction();
        try{

            foreach($array as $row)
            {
                error_log('Name: '.$row['name']);
                error_log('Father: '.$row['father']);
                error_log('Last Name: '.$row['last_name']);
                error_log('grade: '.$row['grade']);
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

            DB::commit();
            return back()->with('grades_assigned','Grades Where Assigned Successfully');
        }
        catch(QueryException $e)
        {
            DB::rollBack();
            return back()->with('grades_failed','Grades Assigning Failed');
        }
        
    }

    public function showgrades()
    {
        $grades = Grade::where('student_id',Auth::guard('student')->user()->id)->get();
        return view('showgrades',['grades'=>$grades,]);
    }
}
