<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class submissions extends Model
{
    public function assignment()
    {
        return $this->belongsTo(assignments::class);
    }

    public function grade()
    {
        return $this->hasOne(grades::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
