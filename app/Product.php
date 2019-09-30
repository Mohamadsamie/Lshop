<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed title
 * @property \Illuminate\Http\Response sku
 */
class Product extends Model
{


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function user()
    {
        return $this->belongsTo(Admin::class);
    }
    public function attributeValues()
    {
        return $this->belongsToMany(AttributesValue::class, 'attributevalue_product', 'product_id', 'attributeValue_id');
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
