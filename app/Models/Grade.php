<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['submission_id', 'teacher_id', 'grade' ];
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

}
