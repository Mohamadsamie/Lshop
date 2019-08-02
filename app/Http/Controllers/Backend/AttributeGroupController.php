<?php

namespace App\Http\Controllers\Backend;

use App\AttributeGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributesGroup = AttributeGroup::all();
        return view('admin.attributes.index', compact('attributesGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributesGroup = AttributeGroup::all();
        return view('admin.attributes.create', compact('attributesGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribueGroup = new AttributeGroup();
        $attribueGroup->title = $request->input('title');
        $attribueGroup->type = $request->input('type');
        $attribueGroup->save();
        Session::flash('attribueGroup_create','ویژگی مورد نظر با موفقیت ایجاد شد');
        return redirect('/administrator/attributes-group');
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
        $attribueGroup = AttributeGroup::findOrFail($id);
        return view('admin.attributes.edit', compact('attribueGroup'));
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
        $attribueGroup = AttributeGroup::findOrFail($id);

        $attribueGroup->title = $request->input('title');
        $attribueGroup->type = $request->input('type');
        $attribueGroup->save();
        Session::flash('attribueGroup_update','ویژگی مورد نظر با موفقیت ویرایش ایجاد شد');
        return redirect('/administrator/attributes-group');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributesGroup = AttributeGroup::findOrFail($id);
        $attributesGroup->delete();
        Session::flash('attribueGroup_delete','ویژگی مورد نظر با موفقیت حذف ایجاد شد');
        return redirect('/administrator/attributes-group');
    }
}
