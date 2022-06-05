<?php

namespace App\Http\Controllers;

use App\Models\SchoolAnnouncement;
use App\Models\SectionAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnouncementsController extends Controller
{
    //
    public function schoolannouncements()
    {
        $announs = SchoolAnnouncement::all();
        return view('schoolannouncements',['announs'=>$announs,]);
    }

    public function addschoolannoun()
    {
        return view('index/addannouncement',['section'=>false]);
    }

    public function storeschoolannouncement(Request $request)
    {
        $creds = $request->validate([
            'content'=>['required','min:10','max:100'],
        ]);
        $new = new SchoolAnnouncement;

        $new->content = $request->content;

        $new->save();

        return back()->with('announ_stored','New School Announcment Stored');
    }

    public function sectionannouncements($id)
    {
        $announs = SectionAnnouncement::where('section_id',1)->get();
        foreach($announs as $announ)
        {
            error_log($announ->id);
        }
        
        return view('sectionannouncments',['announs'=>$announs,'section'=>$id,]);
    }

    public function addsectionannoun($id)
    {
        return view('index/addannouncement',['section'=>$id]);
    }

    public function storesectionannouncements(Request $request,$id)
    {
        $creds = $request->validate([
            'content'=>['required','min:10','max:100'],
        ]);
        $new = new SectionAnnouncement();

        $new->content = $request->content;
        $new->user_id = Auth::User()->id;
        $new->section_id = $id;

        $new->save();

        return back()->with('announ_stored','New Section Announcment Stored');
    }

    public function viewsections()
    {
        return view('index/staffsections');
    }
}
