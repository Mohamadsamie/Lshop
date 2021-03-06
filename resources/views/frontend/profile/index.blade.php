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
                <div class="alert alert-success">
                    <p> {{$user->name . ' ' . $user->last_name}} خوش آمدید.</p>
                </div>
                <h3 class="subtitle">حساب کاربری</h3>
                <div class="list-group">
                    <ul class="list-item">
                        <li><a href="{{route('user.profile.address')}}">لیست آدرس ها</a></li>
                        {{--<li><a href="#">لیست علاقه مندی</a></li>--}}
                        <li><a href="{{route('user.profile.orders')}}">تاریخچه سفارشات</a></li>
                        {{--<li><a href="#">دانلود ها</a></li>--}}
                        {{--<li><a href="#">امتیازات خرید</a></li>--}}
                        {{--<li><a href="#">بازگشت</a></li>--}}
                        {{--<li><a href="#">تراکنش ها</a></li>--}}
                        {{--<li><a href="#">خبرنامه</a></li>--}}
                        {{--<li><a href="#">پرداخت های تکرار شونده</a></li>--}}
                    </ul>
                </div>
            </aside>
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">

            </div>
            <!--Middle Part End -->
        </div>
    </div>
@endsection
