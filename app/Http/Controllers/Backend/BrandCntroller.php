<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Http\Requests\BrandCreateRequest;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class BrandCntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandCreateRequest $request)
    {

            $brand = new Brand();
            $brand->title = $request->input('title');
            $brand->description = $request->input('description');
            $brand->photo_id = $request->input('photo_id');
            $brand->save();

            Session::flash('success', 'برند با موفقیت ذخیره شد');
            return redirect('/administrator/brands');

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
        $brand = Brand::with('photo')->where('id', $id)->first();
        return view('admin.brands.edit', compact(['brand']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:brands,title,'.$id,
            'description' => 'required'
        ],[
            'title.required' => 'عنوان برند شما باید درج شود',
            'title.unique' => 'این برند قبلا ثبت شده است',
            'description.required' => 'توضیحات خود را وارد کنید'
        ]);
        if($validator->fails()){
            return redirect('/administrator/brands')->withErrors($validator)->withInput();
        }else{
            $brand = Brand::findOrFail($id);
            $brand->title = $request->input('title');
            $brand->description = $request->input('description');
            $brand->photo_id = $request->input('photo_id');
            $brand->save();

            Session::flash('edit-brand', 'برند با موفقیت ویرایش شد');
            return redirect('/administrator/brands');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $photo = Photo::findOrFail($brand->photo_id);
        unlink(public_path().$photo->path); // remove img file from public dir
        $photo->delete();
        $brand->delete();

        Session::flash('brand-delete', 'برند '.$brand->title.' با موفقیت حذف شد.');
        return redirect('/administrator/brands');
    }
}
