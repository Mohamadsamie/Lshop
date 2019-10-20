@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <aside id="column-right" class="col-sm-3">

                <h3 class="subtitle">حساب کاربری</h3>
                <div class="list-group">
                    <ul class="list-item">
                        {{--<li><a href="{{route('user.profile.address')}}">لیست آدرس ها</a></li>--}}
                        {{--<li><a href="#">لیست علاقه مندی</a></li>--}}
                        {{--<li><a href="{{route('user.profile.orders')}}">تاریخچه سفارشات</a></li>--}}
                        {{--<li><a href="#">دانلود ها</a></li>--}}
                        {{--<li><a href="#">امتیازات خرید</a></li>--}}
                        <li><a href="{{route('user.profile')}}">بازگشت</a></li>                        {{--<li><a href="#">تراکنش ها</a></li>--}}
                        {{--<li><a href="#">خبرنامه</a></li>--}}
                        {{--<li><a href="#">پرداخت های تکرار شونده</a></li>--}}
                    </ul>
                </div>
            </aside>
            <div id="content" class="col-sm-9">
                <section class="content">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h1 class="box-title">لیست محصولات سفارش {{$order->id}}</h1>
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
                            @if(Session::has('edit'))
                                <div class="alert alert-success">
                                    <div class="text-center">{{session('edit')}}</div>
                                </div>
                            @endif
                            {{--Sessions End--}}
                            <div class="table-responsive">
                                <table dir="rtl" class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>تصویر محصول</th>
                                        <th class="text-center">نام محصول</th>
                                        <th class="text-center">کد محصول</th>
                                        <th class="text-center">قیمت محصول</th>
                                        <th class="text-center">تعداد</th>
                                    </tr>
                                    <tbody>
                                    @foreach($order->products as $product)
                                        <tr>
                                            <td class="pull-right"><img width="50%" src="{{$product->photos[0]->path}}"></td>
                                            <td class="text-center">{{$product->title}}</td>
                                            <td class="text-center">{{$product->sku}}</td>
                                            {{--<td class="text-center">{{number_format($product->discount_price ? $product->discount_price : $product->price )}}</td>--}}
                                            @if($product->discount_price)
                                                <td class="text-center text-red">{{number_format($product->discount_price)}}</td>
                                            @else
                                                <td class="text-center">{{number_format($product->price)}}</td>
                                            @endif
                                            <td class="text-center">{{$product->pivot->quantity}}</td>
                                            {{--@if($order->payment->status == 0)--}}
                                            {{--<td class="text-center"><span class="label label-danger">پرداخت نشده</span></td>--}}
                                            {{--@else--}}
                                            {{--<td class="text-center"><span class="label label-success">پرداخت شده</span></td>--}}
                                            {{--@endif--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            @if($order->payment->status == 1)
                                <p class="pull-right">
                                    <strong class="text-blue">مجموع سفارش: </strong> {{number_format($order->amount)}} تومان
                                    <br>
                                    <strong class="text-blue">هزینه کرایه: </strong> {{number_format(10000)}} تومان
                                    <br>
                                    <strong class="text-blue">مجموع پرداختی: </strong> {{number_format($order->amount + 10000)}} تومان
                                </p>
                            @else
                                <strong class="text-blue">وضعیت پرداختی: </strong>
                                <span class="label label-danger large_text">پرداخت نشده</span>
                        @endif
                        <!-- /.table-responsive -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection