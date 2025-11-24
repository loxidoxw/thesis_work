<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name'];

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

}
