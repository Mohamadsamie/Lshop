@extends('frontend.layouts.master')

@section('content')
    {{--@if(Session::has('error'))--}}
        {{--<div class="alert alert-warning">--}}
            {{--<div>{{session('error')}}</div>--}}
        {{--</div>--}}
    {{--@endif--}}
    {{--@if(Session::has('warning'))--}}
        {{--<div class="alert alert-warning">--}}
            {{--<div>{{session('warning')}}</div>--}}
        {{--</div>--}}
    {{--@endif--}}
    {{--@if(Session::has('success'))--}}
        {{--<div class="alert alert-success">--}}
            {{--<div>{{session('success')}}</div>--}}
        {{--</div>--}}
    {{--@endif--}}
    {{--<!-- Breadcrumb Start-->--}}
    {{--<ul class="breadcrumb">--}}
        {{--<li><a href="index.html"><i class="fa fa-home"></i></a></li>--}}
        {{--<li><a href="cart.html">سبد خرید</a></li>--}}
    {{--</ul>--}}
    {{--<!-- Breadcrumb End-->--}}
    {{--<div class="row">--}}
        {{--<!--Middle Part Start-->--}}
        {{--<div id="content" class="col-sm-12">--}}
            {{--<h1 class="title">سبد خرید</h1>--}}
            {{--<div class="table-responsive">--}}
                {{--<table class="table table-bordered">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<td class="text-center" width="9%">تصویر</td>--}}
                        {{--<td class="text-left">نام محصول</td>--}}
                        {{--<td class="text-left">کد محصول</td>--}}
                        {{--<td class="text-left">تعداد</td>--}}
                        {{--<td class="text-right">قیمت واحد</td>--}}
                        {{--<td class="text-right">کل</td>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--@if(Session::has('cart') && count($cart->items) != 0 )--}}
                    {{--<tbody>--}}
                    {{--@foreach($cart->items as $product)--}}
                        {{--<tr>--}}
                            {{--<td class="text-center" width="9%"><a href="#"><img src="{{$product['item']->photos[0]->path}}" class="img-thumbnail" /></a></td>--}}
                            {{--<td class="text-left"><a href="#">{{$product['item']->title}}</a><br />--}}
                            {{--<td class="text-left">{{$product['item']->sku}}</td>--}}
                            {{--<td class="text-left">--}}
                                {{--<div class="input-group btn-block quantity text-center">--}}
                                    {{--<a class="btn btn-primary" data-toggle="tooltip" title="اضافه"  href="{{route('cart.add', ['id' => $product['item']->id])}}"><i class="fa fa-plus"></i></a>--}}
                                    {{--<button type="button" data-toggle="tooltip" title="کم" class="btn btn-danger" onclick="event.preventDefault();--}}
                                            {{--document.getElementById('remove-cart-item_{{$product['item']->id}}').submit();"><i class="fa fa-minus"></i></button>--}}
                                    {{--<form id="remove-cart-item_{{$product['item']->id}}" action="{{ route('cart.remove', ['id' => $product['item']->id]) }}" method="post" style="display: none;">--}}
                                        {{--@csrf--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                                {{--<p class="text-center" style="margin-top: 10px;">تعداد:‌ <span>{{$product['qty']}}</span></p>--}}

                            {{--</td>--}}
                            {{--<td class="text-right">{{$product['item']->discount_price ? $product['item']->discount_price : $product['item']->price }} تومان</td>--}}
                            {{--<td class="text-right">{{$product['price']}} تومان</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                        {{--@else--}}
                        {{--<h3>سبد خری شما خالیست.</h3>--}}
                    {{--@endif--}}
                {{--</table>--}}
            {{--</div>--}}
            {{--<h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>--}}
            {{--<p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-6">--}}
                    {{--<div class="panel panel-default">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<h4 class="panel-title">استفاده از کوپن تخفیف</h4>--}}
                        {{--</div>--}}
                        {{--<div id="collapse-coupon" class="panel-collapse collapse in">--}}
                            {{--<div class="panel-body">--}}
                                {{--<label class="col-sm-4 control-label" for="input-coupon">کد تخفیف خود را در اینجا وارد کنید</label>--}}
                                {{--<form action="{{ route('coupon.add') }}" method="post">--}}
                                    {{--@csrf--}}
                                    {{--<div class="input-group">--}}
                                        {{--<input type="text" name="code" placeholder="کد تخفیف خود را در اینجا وارد کنید" class="form-control" />--}}
                                        {{--<span class="input-group-btn">--}}
                                            {{--<button type="submit" class="btn btn-primary" >اعمال کوپن</button>--}}
                                        {{--</span>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-6">--}}
                        {{--@if(Session::get('cart'))--}}
                        {{--<table class="table table-bordered">--}}
                            {{--<tr>--}}
                                {{--<td class="text-right"><strong>جمع کل</strong></td>--}}
                                {{--<td class="text-right">{{Session::get('cart')->totalPurePrice}} تومان</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td class="text-right"><strong>تخفیف</strong></td>--}}
                                {{--<td class="text-right">{{Session::get('cart')->totalDiscountPrice}} تومان</td>--}}
                            {{--</tr>--}}
                            {{--@if(Auth::check() && Session::get('cart')->coupon)--}}
                                {{--<tr>--}}
                                    {{--<td class="text-right"><strong>{{Session::get('cart')->coupon['coupon']->title}}</strong></td>--}}
                                    {{--<td class="text-right">{{Session::get('cart')->couponDiscount}} تومان</td>--}}
                                {{--</tr>--}}
                            {{--@endif--}}
                            {{--<tr>--}}
                                {{--<td class="text-right"><strong>قابل پرداخت</strong></td>--}}
                                {{--<td class="text-right">{{Session::get('cart')->totalPrice}} تومان</td>--}}
                            {{--</tr>--}}
                        {{--</table>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<div class="buttons">--}}
                {{--<div class="pull-left"><a href="{{url('/')}}" class="btn btn-default">ادامه خرید</a></div>--}}
                {{--<div class="pull-right"><a href="{{route('payment.verify')}}" class="btn btn-primary">تسویه حساب</a></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--<!--Middle Part End -->--}}
    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">سبد خرید</a></li>
    </ul>
    <!-- Breadcrumb End-->
    @include('frontend.partials.alerts')
    @if ($items->isEmpty())
        <h2 class="p-5 text-center">
            @lang('payment.empty basket' , ['link' => url('/')])
        </h2>
    @else
        @inject('basket','App\Support\Basket\Basket')
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h1 class="title">سبد خرید</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td class="text-center" width="9%">تصویر</td>
                        <td class="text-center">نام محصول</td>
                        <td class="text-center">کد محصول</td>
                        <td class="text-center">تعداد</td>
                        <td class="text-center">قیمت واحد</td>
                        <td class="text-center">کل</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td class="text-center"><a href="{{route('product.single', $item->slug)}}"><img src="{{$item->photos[0]->path}}" alt="{{$item->slug}}" title="{{$item->title}}" class="img-thumbnail" /></a></td>
                            <td class="text-center"><a href="{{route('product.single', $item->slug)}}">{{$item->title}}</a><br /></td>
                            <td class="text-center">{{$item->sku}}</td>
                            <td class="text-center">
                                <div class="input-group btn-block quantity text-center">
                                    <form method="post" class="form-inline" action="{{route('basket.update', $item->id)}}">
                                        @csrf
                                        <div class="form-group">
                                            <input required="required" type="text" name="quantity" value="{{$item->quantity}}" class="form-control">
                                        </div>
                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="بروزرسانی"><i class="fa fa-refresh"></i></button>
                                    </form>
                                    <form method="get" class="form-inline" action="{{route('basket.remove.product', $item->id)}}">
                                        @csrf
                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="حذف"><i class="fa fa-remove"></i></button>
                                    </form>
                                </div>
                            </td>
                            {{--<td class="text-left">--}}
                                {{--<div class="input-group btn-block quantity text-center">--}}
                                    {{--<a class="btn btn-primary" data-toggle="tooltip" title="اضافه"--}}
                                       {{--href="#"><i--}}
                                                {{--class="fa fa-plus"></i></a>--}}
                                    {{--<button type="button" data-toggle="tooltip" title="کم" class="btn btn-danger"--}}
                                            {{-->--}}
                                        {{--<i class="fa fa-minus"></i></button>--}}
                                    {{--<form id="remove-cart-item_{{}}"--}}
                                          {{--action=" }}"--}}
                                          {{--method="post" style="display: none;">--}}
                                        {{--@csrf--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                                {{--<p class="text-center" style="margin-top: 10px;">تعداد:‌--}}
                                    {{--<span>{{$item->quantity}}</span></p>--}}

                            {{--</td>--}}
                            <td class="text-center">
                                {{number_format($item->discount_price ? $item->discount_price : $item->price) }}
                            </td>
                            <td class="text-center">{{number_format($item->discount_price ? $item->discount_price * $item->quantity : $item->price * $item->quantity)}} تومان</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>
            {{--<p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>--}}
            <div class="row">
                {{--<div class="col-sm-6">--}}
                    {{--<div class="panel panel-default">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<h4 class="panel-title">استفاده از کوپن تخفیف</h4>--}}
                        {{--</div>--}}
                        {{--<div id="collapse-coupon" class="panel-collapse collapse in">--}}
                            {{--<div class="panel-body">--}}
                                {{--<label class="col-sm-4 control-label" for="input-coupon">کد تخفیف خود را در اینجا وارد کنید</label>--}}
                                {{--<div class="input-group">--}}
                                    {{--<input type="text" name="coupon" value="" placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon" class="form-control" />--}}
                                    {{--<span class="input-group-btn">--}}
                      {{--<input type="button" value="اعمال کوپن" id="button-coupon" data-loading-text="بارگذاری ..."  class="btn btn-primary" />--}}
                      {{--</span></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-sm-6">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-right"><strong>جمع کل :</strong></td>
                            <td class="text-right">{{number_format($basket->subTotal())}}  تومان</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>حمل و نقل :</strong></td>
                            <td class="text-right">{{number_format(10000)}} تومان</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>تخفیف :</strong></td>
                            <td class="text-right">{{number_format($basket->discount())}} تومان</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>قابل پرداخت :</strong></td>
                            <td class="text-right">{{number_format($basket->subTotal() + 10000)}} تومان</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="buttons">
                <div class="pull-left"><a href="{{route('home')}}" class="btn btn-default">ادامه خرید</a></div>
                <div class="pull-right"><a href="{{route('basket.checkout.form')}}" class="btn btn-primary">تسویه حساب</a></div>
            </div>
        </div>
        <!--Middle Part End -->
    </div>
    @endif
@endsection