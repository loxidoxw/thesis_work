<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['student_id', 'lesson_id', 'file_path', 'status'];
    public function grade()
    {
        return $this->hasOne(grade::class);
    }

    public function lesson()
    {
        return $this->hasOne(Lesson::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
