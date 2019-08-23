<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
