<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['student_id', 'lesson_id', 'file_path', 'status'];
    public function grade()
    {
        return $this->hasOne(Grade::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
