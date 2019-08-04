<?php

namespace App\Http\Controllers\Backend;

use App\AttributeGroup;
use App\attributesValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $attributesValue = AttributesValue::with('attributeGroup')->paginate(15);
        return view('admin.attributes-value.index', compact('attributesValue'));
//        dd($attributesValue);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributesGroup = AttributeGroup::all();
        return view('admin.attributes-value.create', compact('attributesGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return attributesValue
     */
    public function store(Request $request)
    {
        $attributesValue = new AttributesValue();
        $attributesValue->attributeGroup_id = $request->input('attribute_group');
        $attributesValue->title = $request->input('title');
        $attributesValue->save();
        Session::flash('add_atribValue', 'مقدار ویژگی جدید با موفقیت ایجاد شد');
        return redirect('administrator/attributes-value');
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
        $attributeValue = AttributesValue::with('attributeGroup')->where('id', $id)->first();
        $attributeGroup = AttributeGroup::all();
        return view('admin.attributes-value.edit', compact(['attributeValue','attributeGroup']));

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
        $attributeValue = AttributesValue::findOrFail($id);
        $attributeValue->title = $request->input('title');
        $attributeValue->attributeGroup_id = $request->input('attribute_group');
        $attributeValue->save();
        Session::flash('atrib_edit', 'مقدار ویژگی مورد نظر با موفقیت ویرایش شد');
        return redirect('/administrator/attributes-value');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributeValue = AttributesValue::findOrFail($id);
        $attributeValue->delete();
        Session::flash('attributes-delete', 'مقدار '.$attributeValue->title.' حذف شد');

        return redirect('/administrator/attributes-value');
    }
}
