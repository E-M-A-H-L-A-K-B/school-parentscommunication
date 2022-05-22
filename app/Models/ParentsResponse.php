<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentsResponse extends Model
{
    use HasFactory;

    public function schoolnote()
    {
        return $this->belongsTo(SchoolNote::class);
    }
}
