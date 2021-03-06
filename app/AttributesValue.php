<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property array|null|string attributeGroup_id
 * @property array|null|string title
 */
class attributesValue extends Model
{

    public function attributeGroup()
    {
        return $this->belongsTo(AttributeGroup::class,'attributeGroup_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'attributevalue_product', 'attributeValue_id', 'product_id');
    }
}
