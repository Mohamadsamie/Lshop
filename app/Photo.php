<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property null|string original_name
 * @property string path
 * @property int admin_id
 * @property mixed id
 */
class Photo extends Model
{
    protected $uploads = '/storage/photos/';

    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

    public function getPathAttribute($photo)
    {
        return $this->uploads . $photo;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
