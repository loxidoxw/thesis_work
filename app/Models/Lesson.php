<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use hasFactory;
    protected $fillable = ['name'];

    protected $casts = [
        'content' => 'array',
    ];
    public function submission()
    {
        return $this->hasOne(Submission::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
