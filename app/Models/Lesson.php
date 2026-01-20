<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use hasFactory;
    protected $fillable = [
        'section_id',
        'title',
        'type',
        'order',
        'task_description',
        'start_date',
        'deadline',
        'file_path',
        'file_url'
    ];

    protected $casts = [
        'content' => 'array',
    ];
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
