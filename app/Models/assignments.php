<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class assignments extends Model
{
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function submissions()
    {
        return $this->hasMany(submissions::class);
    }
}
