<?php

namespace App\Http\Controllers\Frontend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getProduct($slug)
    {
        $product = Product::with(['photos', 'attributeValues.attributeGroup', 'brand', 'categories'])->whereSlug($slug)->first(); // recursive eager loading!!!!
        $relatedProducts = Product::with('categories')->whereHas('categories', function($q) use ($product){
            $q->whereIn('id', $product->categories);
        })->get();
        return view('frontend.products.index', compact(['product','relatedProducts']));
    }
}
