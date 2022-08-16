<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SClass extends Model
{
    use HasFactory;

    public $primaryKey = 'num';

    public function sections()
    {
        return $this->hasMany(Section::class,'class_num','num');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class,'class_num','num');
    }
}
