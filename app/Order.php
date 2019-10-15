<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected  $fillable = [
        'user_id',
        'code',
        'amount'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
