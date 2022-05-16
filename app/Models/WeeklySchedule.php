<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklySchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture',
        'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
