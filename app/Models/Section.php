<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use hasFactory;
    protected $fillable = ['course_id', 'title', 'order'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Lesson::class);
    }

}
