<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use hasFactory;
    protected $fillable = ['title', 'description', 'teacher_id', 'image'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

}
