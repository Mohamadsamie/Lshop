<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property null|string original_name
 * @property string path
 * @property int user_id
 * @property mixed id
 */
class Photo extends Model
{
    protected $uploads = '/storage/photos/';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPathAttribute($photo)
    {
        return $this->uploads . $photo;
    }
}
