<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProuctEditRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Category::with('childrenRecursive')->where('parent_id', null)->get();  // we don't need this line when using axios from vue.js
        $brands = Brand::all();
        return view('admin.products.create', compact(['brands']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateSKU()
    {
        $number = mt_rand(1000, 99999);
        if($this->checkSKU($number)){
            return $this->generateSKU();
        }
        return (string)$number;
    }

    public function checkSKU($number)
    {
        return Product::where('sku', $number)->exists();
    }

    public function store(ProductCreateRequest $request)
    {
        $newProduct = new Product();
        $newProduct->title = $request->title;
        $newProduct->sku = $this->generateSKU();
        if ($request->input('slug')){
            $newProduct->slug = make_slug($request->input('slug'));
        }   else {
            $newProduct->slug = make_slug($newProduct->title);
        }
        $newProduct->status = $request->status;
        $newProduct->stock = $request->stock;
        $newProduct->price = $request->price;
        $newProduct->discount_price = $request->discount_price;
        $newProduct->description = $request->description;
        $newProduct->brand_id = $request->brand;
        $newProduct->meta_desc = $request->meta_desc;
        $newProduct->meta_title = $request->meta_title;
        $newProduct->meta_keywords = $request->meta_keywords;
        $newProduct->user_id = 1;

//        return $request->all();
        $newProduct->save();


        $attributes = explode(',', $request->input('attributes')[0]);
        $photos = explode(',', $request->input('photo_id')[0]);

        $newProduct->categories()->sync($request->categories);
        $newProduct->attributeValues()->sync($attributes);
        $newProduct->photos()->sync($photos);

        Session::flash('success', 'محصول با موفقیت اضافه شد.');
        return redirect('/administrator/products');
//        dd($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();
        $product = Product::with('categories','attributeValues','photos','brand')->whereId($id)->first();
        return view('admin.products.edit', compact(['product','brands']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProuctEditRequest $request, $id)
    {

        $Product = Product::findOrFail($id);
        $Product->title = $request->title;
        if ($request->input('slug')){
            $Product->slug = make_slug($request->input('slug'));
        }   else {
            $Product->slug = make_slug($Product->title);
        }
        $Product->status = $request->status;
        $Product->stock = $request->stock;
        $Product->price = $request->price;
        $Product->discount_price = $request->discount_price;
        $Product->description = $request->description;
        $Product->brand_id = $request->brand;
        $Product->meta_desc = $request->meta_desc;
        $Product->meta_title = $request->meta_title;
        $Product->meta_keywords = $request->meta_keywords;
        $Product->user_id = 1;

        $Product->save();

        $attributes = explode(',', $request->input('attributes')[0]);
        $photos = explode(',', $request->input('photo_id')[0]);

        $Product->categories()->sync($request->categories);
        $Product->attributeValues()->sync($attributes);
        $Product->photos()->sync($photos);

        Session::flash('success', 'محصول با موفقیت ویرایش شد');
        return redirect('/administrator/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Session::flash('delete', 'محصول با موفقیت حذف شد.');
        return redirect('/administrator/products');
    }
}
