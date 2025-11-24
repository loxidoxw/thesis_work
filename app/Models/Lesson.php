<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['name'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
