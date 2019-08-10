<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    protected $table = 'attributes_group';

    public function attributesValue()
    {
        return $this->hasMany(AttributesValue::class,'attributeGroup_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'attributegroup_category', 'attributeGroup_id', 'category_id');
    }
}
