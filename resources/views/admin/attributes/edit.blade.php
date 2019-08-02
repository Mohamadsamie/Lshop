@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">ویرایش ویژگی</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/administrator/attributes-group/{{$attribueGroup->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" class="form-control" value="{{$attribueGroup->title}}">
                            </div>
                            <div class="form-group">
                                <label for="type">نوع</label>
                                <select class="form-control" name="type" id="">
                                    <option value="select" @if($attribueGroup->type == "select") selected @endif>لیست تکی</option>
                                    <option value="multiple" @if($attribueGroup->type == "multiple") selected @endif>لیست چندتایی</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-success pull-left">بروزرسانی</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
