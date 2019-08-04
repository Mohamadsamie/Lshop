@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">ویرایش مقدار ویژگی</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/administrator/attributes-value/{{$attributeValue->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="attribute_group">انتخا ویژگی</label>
                                <select name="attribute_group" id="" class="form-control">
                                    <option value="">انتخاب کنید</option>
                                    @foreach($attributeGroup as $attribute)
                                        <option value="{{$attribute->id}}" @if($attribute->id == $attributeValue->attributeGroup->id) selected @endif>{{$attribute->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" class="form-control" value="{{$attributeValue->title}}">
                            </div>
                            <button type="submit" class="btn btn-success pull-left">بروزرسانی</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
