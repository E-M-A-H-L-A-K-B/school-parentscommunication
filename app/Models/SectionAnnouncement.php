<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionAnnouncement extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'section_id',
    ];

    public static function studentSectionAnnouncements()
    {
        return static::with('user')->whereHas('sections', function ($query) {
            $query->where('id', auth()->user()->section_id);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'section_section_announcement');
    }
}
