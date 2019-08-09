<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function children() //jahate nameyeshe zirdaste
    {
        return  $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenRecursive()  //jahate nameyeshe zirdaste
    {
        return $this->children()->with('childrenRecursive');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function AttributeGroup()
    {
        return $this->hasMany(AttributeGroup::class, 'attributeGroup_id');
    }
}
