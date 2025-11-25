<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use hasFactory;
    public function lesson()
        {
           return $this->belongsTo(Lesson::class);
        }
}
