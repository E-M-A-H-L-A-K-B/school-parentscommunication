<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'to_admin',
        'subject_id',
        'student_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function response()
    {
        return $this->hasOne(SchoolResponse::class);
    }
}
