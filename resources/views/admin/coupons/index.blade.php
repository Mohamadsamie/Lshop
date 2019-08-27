@extends('admin.layouts.master')

@section('content')
    {{--<section class="content">--}}
        {{--<div class="box box-info">--}}
            {{--<div class="box-header with-border">--}}
                {{--<h3 class="box-title">برندها</h3>--}}
                {{--<div class="text-left">--}}
                    {{--<a class="btn btn-app" href="{{route('brands.create')}}">--}}
                        {{--<i class="fa fa-plus"></i> جدید--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="box-tools pull-right">--}}
                {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.box-header -->--}}
            {{--<div class="box-body">--}}
                {{--@include('admin.partials.form-errors')--}}
                {{--Sessions Start--}}
                {{--@if(Session::has('brand-delete'))--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--<div style="direction: rtl;"  class="text-center">{{session('brand-delete')}}</div>--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--@if(Session::has('success'))--}}
                    {{--<div class="alert alert-success">--}}
                        {{--<div class="text-center">{{session('success')}}</div>--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--@if(Session::has('edit-brand'))--}}
                    {{--<div class="alert alert-success">--}}
                        {{--<div class="text-center">{{session('edit-brand')}}</div>--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--Sessions End--}}
                {{--<div class="table-responsive">--}}
                    {{--<table dir="rtl" class="table no-margin">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th class="text-center">شناسه</th>--}}
                            {{--<th>عنوان</th>--}}
                            {{--<th class="text-center">عملیات</th>--}}
                        {{--</tr>--}}
                        {{--<tbody>--}}
                        {{--@foreach($brands as $brand)--}}
                            {{--<tr>--}}
                                {{--<td class="text-center">{{$brand->id}}</td>--}}
                                {{--<td>{{$brand->title}}</td>--}}
                                {{--<td class="text-center">--}}
                                    {{--<a class="btn btn-warning" href="{{route('brands.edit', $brand->id)}}">ویرایش</a>--}}
                                    {{--<div style="display: inline-block">--}}
                                        {{--<form method="post" action="/administrator/brands/{{$brand->id}}">--}}
                                            {{--@csrf--}}
                                            {{--<input type="hidden" name="_method" value="DELETE">--}}
                                            {{--<button type="submit" class="btn btn-danger">حذف</button>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
                {{--<!-- /.table-responsive -->--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
{{---------------------------------------}}
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">کدهای تخفیف</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('coupons.create')}}">
                        <i class="fa fa-plus"></i> جدید
                    </a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <div>{{session('error')}}</div>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <div>{{session('success')}}</div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table dir="rtl" class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">کد</th>
                            <th class="text-center">قیمت</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr>
                                <td class="text-center">{{$coupon->id}}</td>
                                <td class="text-center">{{$coupon->title}}</td>
                                <td class="text-center">{{$coupon->code}}</td>
                                <td class="text-center">{{$coupon->price}}</td>
                                @if($coupon->status == 0)
                                    <td class="text-center"><span class="tag tag-pill tag-danger">غیر فعال</span></td>
                                @else
                                    <td class="text-center"><span class="tag tag-pill tag-success">فعال</span></td>
                                @endif
                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{route('coupons.edit', $coupon->id)}}">ویرایش</a>
                                    <div style="display: inline-block">
                                        <form method="post" action="/administrator/coupons/{{$coupon->id}}">
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