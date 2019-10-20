@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">لیست محصولات سفارش {{$order->id}}</h3>
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
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">اطلاعات خریدار</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body" style="">
                <div class="customer-data">
                    <p style="margin-top: 20px">
                        <strong class="text-blue">نام خریدار: </strong> {{$order->user->name . ' ' . $order->user->last_name}}
                    </p>
                    <p >
                        <strong class="text-blue">آدرس خریدار: </strong> {{$order->user->addresses[0]->province->name . ' ' . $order->user->addresses[0]->city->name . ' ' . $order->user->addresses[0]->address}}
                        <strong class="text-blue">کد پستی خریدار: </strong> {{$order->user->addresses[0]->post_code}}
                    </p>
                    <p>
                        <strong class="text-blue">شماره موبایل خریدار: </strong> {{$order->user->phone}}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection