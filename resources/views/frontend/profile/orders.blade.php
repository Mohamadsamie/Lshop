@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <div>{{session('success')}}</div>
            </div>
        @endif

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
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <div class="alert alert-success">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th class="text-center">شناسه</th>
                                <th class="text-center">مبلغ سفارش</th>
                                <th class="text-center">وضعیت</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-center"><a href="{{route('user.profile.orders.list', ['id'=> $order->id])}}">{{$order->id}}</a></td>
                                    <td class="text-center">{{number_format($order->amount + 10000)}} تومان</td>
                                    @if($order->payment->status == 0)
                                        <td class="text-center"><span class="label label-danger">پرداخت نشده</span></td>
                                    @else
                                        <td class="text-center"><span class="label label-success">پرداخت شده</span></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Middle Part End -->

        </div>
    </div>
@endsection
