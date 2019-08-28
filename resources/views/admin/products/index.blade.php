@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">محصولات</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('products.create')}}">
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
                @include('admin.partials.form-errors')
                {{--Sessions Start--}}
                @if(Session::has('delete'))
                    <div class="alert alert-danger">
                        <div style="direction: rtl;"  class="text-center">{{session('delete')}}</div>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <div class="text-center">{{session('success')}}</div>
                    </div>
                @endif
                {{--@if(Session::has('edit-brand'))--}}
                    {{--<div class="alert alert-success">--}}
                        {{--<div class="text-center">{{session('edit-brand')}}</div>--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--Sessions End--}}
                <div class="table-responsive">
                    <table dir="rtl" class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">کد محصول</th>
                            <th class="text-center">تعداد موجودی</th>
                            <th>عنوان</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{$product->id}}</td>
                                <td class="text-center">{{$product->sku}}</td>
                                <td class="text-center">{{$product->stock}}</td>
                                <td>{{$product->title}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{route('products.edit', $product->id)}}">ویرایش</a>
                                    <div style="display: inline-block">
                                        <form method="post" action="/administrator/products/{{$product->id}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>
@endsection