@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li><a href="search.html">جستجو</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h1 class="title">جستجو برای {{$query}}</h1>
                <form method="get" action="{{route('search')}}">
                    @csrf
                    <label>عبارت جستجو :</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <input required="required" type="text" class="form-control"  value="{{$query}}" name="search">
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-primary" id="button-search" value="جستجو">
                        </div>
                        <div class="col-sm-3">
                            {{--<select class="form-control" name="category_id">--}}
                            {{--<option value="0">همه دسته ها</option>--}}
                            {{--<option value="59">البسه</option>--}}
                            {{--<option value="61">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;آقایان</option>--}}
                            {{--<option value="93">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته ها</option>--}}
                            {{--<option value="94">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته ها</option>--}}
                            {{--<option value="95">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته ها</option>--}}
                            {{--<option value="96">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته ها</option>--}}
                            {{--<option value="91">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته جدید</option>--}}
                            {{--<option value="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;بانوان</option>--}}
                            {{--<option value="62">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;دخترانه</option>--}}
                            {{--<option value="98">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته ها</option>--}}
                            {{--<option value="97">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته جدید</option>--}}
                            {{--<option value="99">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته جدید</option>--}}
                            {{--<option value="63">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;پسرانه</option>--}}
                            {{--<option value="64">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;نوزاد</option>--}}
                            {{--<option value="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;لوازم</option>--}}
                            {{--<option value="120">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="66">الکترونیکی</option>--}}
                            {{--<option value="67">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;لپ تاپ</option>--}}
                            {{--<option value="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="102">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="101">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته جدید</option>--}}
                            {{--<option value="68">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;رومیزی</option>--}}
                            {{--<option value="103">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="104">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته جدید</option>--}}
                            {{--<option value="105">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته جدید</option>--}}
                            {{--<option value="33">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;دوربین</option>--}}
                            {{--<option value="110">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="69">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;موبایل و تبلت</option>--}}
                            {{--<option value="106">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="107">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="70">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;صوتی و تصویری</option>--}}
                            {{--<option value="108">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="109">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته جدید</option>--}}
                            {{--<option value="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;لوازم خانگی</option>--}}
                            {{--<option value="20">کفش</option>--}}
                            {{--<option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;آقایان</option>--}}
                            {{--<option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;بانوان</option>--}}
                            {{--<option value="115">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="116">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته ها</option>--}}
                            {{--<option value="42">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;دخترانه</option>--}}
                            {{--<option value="41">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;پسرانه</option>--}}
                            {{--<option value="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;نوزاد</option>--}}
                            {{--<option value="72">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;لوازم</option>--}}
                            {{--<option value="117">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="118">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="119">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته ها</option>--}}
                            {{--<option value="18">ساعت</option>--}}
                            {{--<option value="46">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ساعت مردانه</option>--}}
                            {{--<option value="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ساعت زنانه</option>--}}
                            {{--<option value="47">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ساعت بچگانه</option>--}}
                            {{--<option value="37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;لوازم</option>--}}
                            {{--<option value="25">جواهرات</option>--}}
                            {{--<option value="29">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;نقره</option>--}}
                            {{--<option value="111">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="112">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;طلا</option>--}}
                            {{--<option value="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تست 1</option>--}}
                            {{--<option value="36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تست 2</option>--}}
                            {{--<option value="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;الماس</option>--}}
                            {{--<option value="31">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;مروارید</option>--}}
                            {{--<option value="113">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="32">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیورآلات آقایان</option>--}}
                            {{--<option value="43">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیورآلات کودکان</option>--}}
                            {{--<option value="114">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;زیردسته های جدید</option>--}}
                            {{--<option value="17">زیبایی و سلامت</option>--}}
                            {{--<option value="57">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;عطر و ادکلن</option>--}}
                            {{--<option value="24">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;آرایشی</option>--}}
                            {{--<option value="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ضد آفتاب</option>--}}
                            {{--<option value="48">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;مراقبت از پوست</option>--}}
                            {{--<option value="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;مراقبت از چشم</option>--}}
                            {{--<option value="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;مراقبت از مو</option>--}}
                            {{--<option value="34">کودک و نوزاد</option>--}}
                            {{--<option value="51">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;اسباب بازی</option>--}}
                            {{--<option value="52">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;بازی</option>--}}
                            {{--<option value="58">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تست 25</option>--}}
                            {{--<option value="53">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;پازل</option>--}}
                            {{--<option value="54">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;سرگرمی</option>--}}
                            {{--<option value="55">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;متنوع</option>--}}
                            {{--<option value="56">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;سلامت و امنیت</option>--}}
                            {{--<option value="38">ورزشی</option>--}}
                            {{--<option value="39">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;دوچرخه سواری</option>--}}
                            {{--<option value="73">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;دویدن</option>--}}
                            {{--<option value="74">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;شنا</option>--}}
                            {{--<option value="75">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;فوتبال</option>--}}
                            {{--<option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;گلف</option>--}}
                            {{--<option value="77">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;موج سواری</option>--}}
                            {{--<option value="78">خانه و باغچه</option>--}}
                            {{--<option value="79">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;لوازم خواب</option>--}}
                            {{--<option value="80">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;خوراک</option>--}}
                            {{--<option value="81">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;لوازم منزل</option>--}}
                            {{--<option value="82">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;آشپزخانه</option>--}}
                            {{--<option value="83">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;روشنایی</option>--}}
                            {{--<option value="84">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ابزارها</option>--}}
                            {{--<option value="85">خوراک</option>--}}
                            {{--<option value="86">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;نوشیدنی</option>--}}
                            {{--<option value="87">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تنقلات</option>--}}
                            {{--<option value="88">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;میان وعده</option>--}}
                            {{--<option value="89">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;خشک بار</option>--}}
                            {{--<option value="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;شکلات</option>--}}
                            {{--</select>--}}
                        </div>
                    </div>
                </form>

                <br>
                <hr>

                <br />
                @if(count($products) > 0)
                    {{--<div class="product-filter">                    --}}
                    {{--<div class="row">--}}
                    {{--<div class="col-md-4 col-sm-5">--}}
                    {{--<div class="btn-group">--}}
                    {{--<button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>--}}
                    {{--<button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>--}}
                    {{--</div>--}}
                    {{--<a href="compare.html" id="compare-total">محصولات مقایسه (0)</a> </div>--}}
                    {{--<div class="col-sm-2 text-right">--}}
                    {{--<label class="control-label" for="input-sort">مرتب سازی :</label>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-sm-2 text-right">--}}
                    {{--<select id="input-sort" class="form-control col-sm-3">--}}
                    {{--<option value="" selected="selected">پیشفرض</option>--}}
                    {{--<option value="">نام (الف - ی)</option>--}}
                    {{--<option value="">نام (ی - الف)</option>--}}
                    {{--<option value="">قیمت (کم به زیاد)</option></option>--}}
                    {{--<option value="">قیمت (زیاد به کم)</option>--}}
                    {{--<option value="">امتیاز (بیشترین)</option>--}}
                    {{--<option value="">امتیاز (کمترین)</option>--}}
                    {{--<option value="">مدل (A - Z)</option>--}}
                    {{--<option value="">مدل (Z - A)</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-1 text-right">--}}
                    {{--<label class="control-label" for="input-limit">نمایش :</label>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-2 text-right">--}}
                    {{--<select id="input-limit" class="form-control">--}}
                    {{--<option value="" selected="selected">20</option>--}}
                    {{--<option value="">25</option>--}}
                    {{--<option value="">50</option>--}}
                    {{--<option value="">75</option>--}}
                    {{--<option value="">100</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="row products-category">
                        @foreach($products as $product)
                            <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                <div class="product-thumb clearfix">
                                    <div class="image"><a
                                                href="{{route('product.single', ['slug' => $product->slug])}}"><img
                                                    src="{{$product->photos[0]->path}}" alt="" title=""
                                                    class="img-responsive"/></a></div>
                                    <div class="caption">
                                        <h4>
                                            <a href="{{route('product.single', ['slug' => $product->slug])}}">{{$product->title}}</a>
                                        </h4>


                                        @if($product->discount_price)
                                            <p class="price"><span class="price-new">{{$product->discount_price}}
                                                    تومان</span> <span class="price-old">{{$product->price}}
                                                    تومان</span><span class="saving">{{round(abs(($product->price-$product->discount_price)/$product->price * 100))}}
                                                    %</span></p>
                                        @else
                                            <p class="price"> {{$product->price}} تومان </p>
                                        @endif

                                    </div>
                                    <div class="button-group">
                                        <a href="{{route('product.single', ['slug' => $product->slug])}}"
                                           class="btn-primary">مشاهده محصول</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center">{{$products->links()}}</div>
                    @else
                    <div class="alert alert-warning text-center col-md-6 col-md-offset-3">
                        <p>موردی یافت نشد!</p>
                    </div>

                @endif
                
            </div>
            <!--Middle Part End -->
        </div>
    </div>
@endsection

