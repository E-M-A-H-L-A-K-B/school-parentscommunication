<?php

namespace App\Http\Controllers;

use App\Models\SClass;
use App\Models\WeeklySchedule;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $pic = $request->file('pic')->store('public/schedules');
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
}
