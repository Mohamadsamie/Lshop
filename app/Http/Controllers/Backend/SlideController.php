<?php

namespace App\Http\Controllers\Backend;

use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slides.index', compact(['slides']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slides.create');
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
            'photo_id' => 'required',
            'title' => 'required'
        ],[
            'photo_id.required' => 'تصویر اسلایدر الزامیست',
            'title.required' => 'انتخاب عنوان برای اسلایدر الزامیست',
        ]);
        if($validator->fails()){
            return redirect('/administrator/slides')->withErrors($validator)->withInput();
        }else{
            $slide = new Slide();
            $slide->title = $request->input('title');
            $slide->alt = $request->input('alt');
            $slide->link = $request->input('link');
            $slide->photo_id = $request->input('photo_id');
            $slide->save();

            Session::flash('success', 'اسلایدر با موفقیت ذخیره شد');
            return redirect('/administrator/slides');

        }
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
        $slide = Slide::with('photo')->where('id', $id)->first();
        return view('admin.slides.edit', compact(['slide']));
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
        $slide = Slide::findOrFail($id);
        $slide->alt = $request->input('alt');
        $slide->link = $request->input('link');
        $slide->photo_id = $request->input('photo_id');
        $slide->save();

        Session::flash('edit-slide', 'اسلاید با موفقیت ویرایش شد');
        return redirect('/administrator/slides');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        Session::flash('delete-slide', 'اسلاید با موفقیت حذف شد');
        return redirect('/administrator/slides');
    }
}
