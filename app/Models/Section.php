<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    
    public function SClass()
    {
        return $this->belongsTo(SClass::class,'class_num','num');
    }

    public function guides()
    {
        return $this->belongsToMany(User::class, 'section_guide', relatedPivotKey: 'guide_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'subject_teacher', relatedPivotKey: 'teacher_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher');
    }

    public function announcement()
    {
        return $this->belongsToMany(SectionAnnouncement::class,'section_section_announcement');
    }

    public function weeklySchedule()
    {
        return $this->hasMany(WeeklySchedule::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
