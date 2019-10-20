@extends('frontend.layouts.master')

@section('content')
    <div class="container">

        <div class="row">
            <aside id="column-right" class="col-sm-3 ">
                <h3 class="subtitle">حساب کاربری</h3>
                <div class="list-group">
                    <ul class="list-item">
                        {{--<li><a href="#">لیست آدرس ها</a></li>--}}
                        {{--<li><a href="#">لیست علاقه مندی</a></li>--}}
                        {{--<li><a href="#">تاریخچه سفارشات</a></li>--}}
                        {{--<li><a href="#">دانلود ها</a></li>--}}
                        {{--<li><a href="#">امتیازات خرید</a></li>--}}
                        <li><a href="{{route('user.profile')}}">بازگشت</a></li>
                        {{--<li><a href="#">تراکنش ها</a></li>--}}
                        {{--<li><a href="#">خبرنامه</a></li>--}}
                        {{--<li><a href="#">پرداخت های تکرار شونده</a></li>--}}
                    </ul>
                </div>
                <div id="address" class="alert alert-warning">
                    <p> با توجه به شروع فعالیت وبسایت فعلا تمام سرویس ها در شهر بندرعباس قابل ارایه به همشهریان عزیز خواهند بود.  </p>
                </div>
            </aside>
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-user"></i> آدرس تحویل سفارش</h4>
                    </div>
                    @include('admin.partials.form-errors')
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <div>{{session('success')}}</div>
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="col-md-6 col-md-offset-3" id="app">
                            <form method="post" action="{{route('user.update.address', $address->id)}}">
                                @csrf
                                <div class="form-group">
                                    <label for="input-payment-firstname" class="control-label">گیرنده :</label>
                                    <span>{{$user->name . " " . $user->last_name}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="phone">تلفن :</label>
                                    <span>{{$user->phone}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="post_code">کد پستی :</label>
                                    <input value="{{$address->post_code}}"  type="text" name="post_code" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="province_id" class="control-label">استان :</label>
                                    <select class="form-control"  id="input-select" name="province_id">
                                        <option selected value="{{$address->province_id}}">{{$address->province->name}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city_id" class="control-label">شهر :</label>
                                    <select class="form-control" id="input-select" name="city_id">
                                        <option selected value="{{$address->city_id}}">{{$address->city->name}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span class="input-group-addon">آدرس :</span>
                                    <textarea class="form-control" placeholder="آدرس" rows="5" name="address">{{$address->address}}</textarea>
                                </div>
                                <button type="submit"  class="btn btn-success pull-left">بروزرسانی</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Middle Part End -->
        </div>
    </div>
@endsection

