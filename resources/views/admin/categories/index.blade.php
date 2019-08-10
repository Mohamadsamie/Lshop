@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">دسته بندی ها</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('categories.create')}}">
                        <i class="fa fa-plus"></i> جدید
                    </a>
                </div>
                {{--<div class="box-tools pull-right">--}}
                    {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                    {{--</button>--}}
                {{--</div>--}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('error_category'))
                    <div class="alert alert-danger">
                        <div class="text-center">{{session('error_category')}}</div>
                    </div>
                @endif
                @if(Session::has('delete_category'))
                    <div class="alert alert-success">
                        <div class="text-center">{{session('delete_category')}}</div>
                    </div>
                @endif
                @if(Session::has('add_category'))
                    <div class="alert alert-success">
                        <div class="text-center">{{session('add_category')}}</div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table dir="rtl" class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th>عنوان</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{route('categories.edit', $category->id)}}">ویرایش</a>
                                    <div style="display: inline-block">
                                        <form method="post" action="/administrator/categories/{{$category->id}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" >حذف</button>
                                        </form>
                                    </div>
                                    <a href="{{route('categories.indexSetting', $category->id)}}" class="btn btn-primary">تنظیمات</a>
                                </td>
                            </tr>
                            @if(count($category->childrenRecursive) > 0)
                                @include('admin.partials.category_list', ['categories'=>$category->childrenRecursive, 'level'=>1])
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>
@endsection