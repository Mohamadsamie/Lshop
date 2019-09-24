<?php

namespace App\Http\Controllers\Frontend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function search()
    {
        $query = Input::get('search');
        $products = Product::with('attributeValues','photos','categories')->
        where('title', 'like', '%'.$query.'%')->paginate(9);
        $products->appends(['search' => $query]); //Sends data to next page in search pagination!
        return view('frontend.search.index', compact(['products','query']));
    }

}























//$desc_price = Product::with('attributeValues','photos','categories')->sortByDesc('price')->paginate(1);
//$asc_price = Product::with('attributeValues','photos','categories')->sortByAsc('price')->paginate(1);
//
//$query = Input::get('query');
//        $products = Product::with('attributeValues','photos','categories')->
//        where('title', 'like', '%'.$query.'%')->orderBy($request->get('sortBy'))->paginate(1);
//        $products->appends(['search' => $query]);
//        if (isset($request['sortBy'])) {
//            $query = Input::get('query');
//            dd($query);
//            $products = Product::with('attributeValues','photos','categories')->
//            where('title', 'like', '%'.$query.'%')->orderBy($request->get('sortBy'))->paginate(1);
//            $products->appends(['search' => $query]);
//            if ($request->get('sortBy') === 'ASC'){
//                $products->orderBy('price', 'asc');
//                return view('frontend.categories.search', compact(['products','query']));
//            } elseif($request->get('sortBy') === 'DESC') {
//                $products->orderBy('price', 'desc');
//                return view('frontend.categories.search', compact(['products','query']));
//            }
//        }