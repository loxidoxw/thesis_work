<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class grades extends Model
{
    public function submission()
    {
        return $this->belongsTo(submissions::class);
    }

}
