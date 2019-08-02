@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">ایجاد ویژگی جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/administrator/attributes-group">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" class="form-control" placeholder="عنوان ویژگی را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="type">نوع</label>
                                <select name="type" id="" class="form-control">
                                    <option value="select">لیست تکی</option>
                                    <option value="multiple">لیست چندتایی</option>
                                    {{--@foreach($attributesGroup as $attribute)--}}
                                        {{--<option value="{{$attribute->id}}">{{$attribute->title}}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
