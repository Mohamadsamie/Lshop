<?php

namespace App\Http\Controllers\Backend;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact(['banners']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo_id' => 'required'
        ],[
            'photo_id.required' => 'تصویر بنر الزامیست',
        ]);
        if($validator->fails()){
            return redirect('/administrator/banners')->withErrors($validator)->withInput();
        }else{
            $banner = new Banner();
            $banner->alt = $request->input('alt');
            $banner->link = $request->input('link');
            $banner->photo_id = $request->input('photo_id');
            $banner->save();

            Session::flash('success', 'بنر با موفقیت ذخیره شد');
            return redirect('/administrator/banners');

        }
        /***********************************/
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
        $banner = Banner::with('photo')->where('id', $id)->first();
        return view('admin.banners.edit', compact(['banner']));
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
        $banner = Banner::findOrFail($id);
        $banner->alt = $request->input('alt');
        $banner->link = $request->input('link');
        $banner->photo_id = $request->input('photo_id');
        $banner->save();

        Session::flash('edit-banner', 'بنر با موفقیت ویرایش شد');
        return redirect('/administrator/banners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        Session::flash('delete-banner', 'بنر با موفقیت حذف شد');
        return redirect('/administrator/banners');
    }
}
