@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">ایجاد دسته بندی جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/administrator/categories">
                            @csrf
                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" name="name" class="form-control" placeholder="عنوان دسته بندی را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label for="slug">نام مستعار</label>
                                <input type="text" name="slug" class="form-control" placeholder="نام مستعار دسته بندی را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label for="category_parent">دسته والد</label>
                                <select name="category_parent" id="" class="form-control">
                                    <option value="">بدون والد</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @if(count($category->childrenRecursive) > 0)
                                            @include('admin.partials.categories', ['categories'=>$category->childrenRecursive, 'level'=>1])
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="meta_title">عنوان سئو</label>
                                <input type="text" name="meta_title" class="form-control" placeholder="عنوان سئو را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="meta_desc">توضیحات سئو</label>
                                <textarea type="text" name="meta_desc" class="form-control" placeholder="توضیحات سئو را وارد کنید..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">کلمات کلیدی سئو</label>
                                <input type="text" name="meta_keywords" class="form-control" placeholder="کلمات کلیدی سئو را وارد کنید...">
                            </div>
                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
