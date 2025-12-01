<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use hasFactory;
    protected $fillable = ['name'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function assignments()
    {
        return $this->hasMany(assignments::class);
    }
}
