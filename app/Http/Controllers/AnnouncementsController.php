<?php

namespace App\Http\Controllers;

use App\Models\SchoolAnnouncement;
use App\Models\SectionAnnouncement;
use Illuminate\Http\Request;

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
        return view('addschoolannouncement');
    }

    public function storeschoolannouncement(Request $request)
    {
        $new = new SchoolAnnouncement;

        $new->content = $request->content;

        $new->save();

        return back()->with('announ_stored','New School Announcment Stored');
    }

    public function sectionannouncements($id)
    {
        $announs = SectionAnnouncement::all();

        return view('sectionannouncments');
    }
}
