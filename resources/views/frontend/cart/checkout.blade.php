@extends('frontend.layouts.master')

@section('content')

    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">سبد خرید</a></li>
        <li><a href="checkout.html">تسویه حساب</a></li>
    </ul>
    <!-- Breadcrumb End-->

    @inject('basket','App\Support\Basket\Basket')
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
            <h1 class="title">تسویه حساب</h1>
            <div class="row">
                <div class="col-sm-4">
                    <div class="alert alert-warning"><i class="fa fa-warning"></i> لطفا در صورتی که آدرس شما با اطلاعات زیر مطابقت ندارد و یا قصد تغییر آدرس خود را دارید از طریق
                        <a href="{{route('user.profile')}}">"پروفایل"</a> خود آن را ویرایش کنید.</div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-user"></i> آدرس تحویل سفارش<span class="border-bottom pull-left"><a style="border-bottom: 1px dashed #359169;color: #359169;" href="{{route('user.profile')}}">اصلاح آدرس</a></span></h4>
                        </div>
                        <div class="panel-body">
                            <fieldset id="account">
                                <div class="form-group">
                                    <label for="input-payment-firstname" class="control-label">گیرنده :</label>
                                    <span>{{$user->name . " " . $user->last_name}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="input-payment-telephone" class="control-label">شماره تلفن : <span class="border-left">{{$user->phone}}</span></label>
                                    <span> | </span>
                                    <label for="input-payment-telephone" class="control-label">کد پستی : <span>{{$user->addresses[0]->post_code}}</span></label>
                                </div>
                                <div class="form-group">
                                    <label for="input-payment-firstname" class="control-label">آدرس :</label>
                                    <span>{{$user->addresses[0]->province->name . " , " . $user->addresses[0]->city->name . " , " . $user->addresses[0]->address}}</span>
                                </div>
                            </fieldset>
                            <div class="alert alert-success"><i class="fa fa-info"></i>
                                <p> با توجه به شروع فعالیت وبسایت فعلا تمام سرویس ها در شهر " بندرعباس " قابل ارایه به همشهریان عزیز خواهند بود.  </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> سبد خرید</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <td class="text-center" width="9%">تصویر</td>
                                                <td class="text-center">نام محصول</td>
                                                <td class="text-center">کد محصول</td>
                                                <td class="text-center">تعداد</td>
                                                <td class="text-center">قیمت</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($basket->all() as $item)
                                                <tr>
                                                    <td class="text-center"><a href="{{route('product.single', $item->slug)}}"><img src="{{$item->photos[0]->path}}" alt="{{$item->slug}}" title="{{$item->title}}" class="img-thumbnail" /></a></td>
                                                    <td class="text-center"><a href="{{route('product.single', $item->slug)}}">{{$item->title}}</a><br /></td>
                                                    <td class="text-center">{{$item->sku}}</td>
                                                    <td class="text-center">
                                                        {{number_format($item->discount_price ? $item->discount_price : $item->price) . ' تا ' . $item->quantity }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{number_format($item->discount_price ? $item->discount_price * $item->quantity : $item->price * $item->quantity)}} تومان
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td class="text-right" colspan="4"><strong>جمع کل:</strong></td>
                                                <td class="text-right">{{number_format($basket->subTotal())}}  تومان</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="4"><strong>هزینه ارسال ثابت :</strong></td>
                                                <td class="text-right">{{number_format(10000)}}  تومان</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="4"><strong>کسر تخفیف :</strong></td>
                                                <td class="text-right">{{number_format($basket->discount())}} تومان</td>
                                            </tr>
                                            {{--<tr>--}}
                                                {{--<td class="text-right" colspan="4"><strong>مالیات:</strong></td>--}}
                                                {{--<td class="text-right">15100 تومان</td>--}}
                                            {{--</tr>--}}
                                            <tr>
                                                <td class="text-right" colspan="4"><strong>کل :</strong></td>
                                                <td class="text-right">{{number_format($basket->subTotal() + 10000)}} تومان</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-credit-card"></i> انتخاب درگاه و پرداخت نهایی </h4>
                                </div>
                                <div class="panel-body">
                                    <form action="{{route('basket.checkout')}}" id='checkout-form' method="post" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="radio" id="online" value="online" name="method"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="online">
                                                    پرداخت آنلاین
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select name='gateway' class="form-control" id="sel1">
                                                        <option  value="saman">سامان</option>
                                                        <option value="pasargad">پاسارگاد</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-success pull-right">پرداخت</button>
                                                {{--<a onclick="event.preventDefault();document.getElementById('checkout-form').submit()" class="btn btn-primary d-block w-100">@lang('payment.pay')</a>--}}

                                            </div>
                                        </div>
                                    </form>
                                    @include('frontend.partials.validation')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Middle Part End -->
    </div>
    @endif
@endsection