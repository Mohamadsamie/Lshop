@extends('frontend.layouts.master')

@section('frontend-styles')
    <link rel="stylesheet" href="{{asset('css/persian-datepicker.min.css')}}"/>
@endsection
@section('fronted-scripts')
    <script type="application/javascript" src="{{asset('js/persian-date.min.js')}}"></script>
    <script type="application/javascript" src="{{asset('js/persian-datepicker.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".birthday").pDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                autoClose: true,
                initialValue: false,
                toolbox:{
                    calendarSwitch:{
                        enabled: false
                    }
                }
            });
        });
    </script>
@endsection

@section('content')
<div class="container" id="app">
    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="login.html">حساب کاربری</a></li>
        <li><a href="register.html">ثبت نام</a></li>
    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
            <h1 class="title">ثبت نام حساب کاربری</h1>
            <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="{{route('login')}}">صفحه لاگین</a> مراجعه کنید.</p>
            <form class="form-horizontal" method="post" action="{{ route('user.register') }}">
                    @csrf
                <fieldset id="account">
                    @include('admin.partials.form-errors')
                    <legend>اطلاعات شخصی شما</legend>
                    <div class="form-group required">
                        <label for="name" class="col-sm-2 control-label">نام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-firstname" placeholder="نام" value="{{old('name')}}" name="name">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="last_name" class="col-sm-2 control-label">نام خانوادگی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-lastname" placeholder="نام خانوادگی" value="{{old('last_name')}}" name="last_name">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="email" class="col-sm-2 control-label">آدرس ایمیل</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="{{old('email')}}" name="email">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="phone" class="col-sm-2 control-label">شماره تلفن</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="input-telephone" placeholder="شماره تلفن" value="{{old('phone')}}" name="phone">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="national_code" class="col-sm-2 control-label">کد ملی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-fax" placeholder="کد ملی" value="{{old('national_code')}}" name="national_code">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="birthday" class="col-sm-2 control-label">تاریخ تولد</label>
                        <div class="col-sm-10">
                            <input style="font-family: Tahoma" class="form-control birthday" value="{{old('birthday')}}" name="birthday">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label">جنسیت</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" value="male" name="gender">
                                مرد</label>
                            <label class="radio-inline">
                                <input type="radio"  value="female" name="gender">
                                زن</label>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="address">
                    <legend>آدرس</legend>
                    <div class="form-group">
                        <label for="input-company" class="col-sm-2 control-label">شرکت</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-company" placeholder="شرکت" value="{{old('company')}}" name="company">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="address" class="col-sm-2 control-label">آدرس</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-address-1" placeholder="آدرس" value="{{old('address')}}" name="address">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="post_code" class="col-sm-2 control-label">کد پستی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-postcode" placeholder="کد پستی" value="{{old('post_code')}}" name="post_code">
                        </div>
                    </div>
                    <select-city-component></select-city-component>
                </fieldset>
                <fieldset>
                    <legend>رمز عبور شما</legend>
                    <div class="form-group required">
                        <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-password" placeholder="رمز عبور" value="{{old('passwordd')}}" name="password">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="confirmed" class="col-sm-2 control-label">تکرار رمز عبور</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control"  placeholder="تکرار رمز عبور" value="{{old('password_confirmed')}}" name="password_confirmed">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>خبرنامه</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">اشتراک</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" value="1" name="newsletter">
                                بله</label>
                            <label class="radio-inline">
                                <input type="radio" checked="checked" value="0" name="newsletter">
                                نه</label>
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                        <input type="checkbox" value="1" name="agree">
                        &nbsp;من <a class="agree" href="#"><b>سیاست حریم خصوصی</b> را خوانده ام و با آن موافق هستم</a> &nbsp;
                        <input type="submit" class="btn btn-primary" value="ثبت نام">
                    </div>
                </div>
            </form>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
            {{--<h3 class="subtitle">حساب کاربری</h3>--}}
            {{--<div class="list-group">--}}
                {{--<ul class="list-item">--}}
                    {{--<li><a href="login.html">ورود</a></li>--}}
                    {{--<li><a href="register.html">ثبت نام</a></li>--}}
                    {{--<li><a href="#">فراموشی رمز عبور</a></li>--}}
                    {{--<li><a href="#">حساب کاربری</a></li>--}}
                    {{--<li><a href="#">لیست آدرس ها</a></li>--}}
                    {{--<li><a href="wishlist.html">لیست علاقه مندی</a></li>--}}
                    {{--<li><a href="#">تاریخچه سفارشات</a></li>--}}
                    {{--<li><a href="#">دانلود ها</a></li>--}}
                    {{--<li><a href="#">امتیازات خرید</a></li>--}}
                    {{--<li><a href="#">بازگشت</a></li>--}}
                    {{--<li><a href="#">تراکنش ها</a></li>--}}
                    {{--<li><a href="#">خبرنامه</a></li>--}}
                    {{--<li><a href="#">پرداخت های تکرار شونده</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </aside>
        <!--Right Part End -->
    </div>
</div>
@endsection

@section('script-vuejs')
    <script src="{{asset('admin/js/app.js')}}"></script>
@endsection

