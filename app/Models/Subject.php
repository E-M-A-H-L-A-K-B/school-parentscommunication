<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'my_class_id',
    ];

    public function myClass()
    {
        return $this->belongsTo(SClass::class,'my_class_id','num');
    }

    public function teachres()
    {
        return $this->belongsToMany(User::class, 'subject_teacher', relatedPivotKey: 'teacher_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'subject_teacher');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function schoolNotes()
    {
        return $this->hasMany(SchoolNote::class);
    }
}
