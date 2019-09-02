@extends('frontend.layouts.master')

@section('content')

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-xs-12">
            <!-- Slideshow Start-->
            @if(count($slides) > 0)
                <div class="slideshow single-slider owl-carousel">
                    @foreach($slides as $slide)
                        <div class="item"> <a href="{{$slide->link}}"><img class="img-responsive" src="{{$slide->photo->path}}" alt="{{$slide->alt}}" /></a> </div>
                    @endforeach
                </div>
            @endif
            <!-- Slideshow End-->
            <!-- Banner Start-->
            @if(count($banners) > 0)
                <div class="marketshop-banner">
                    <div class="row">
                        @foreach($banners as $banner)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a target="_blank" href="{{$banner->link}}"><img src="{{$banner->photo->path}}" alt="{{$banner->alt}}"/></a></div>
                        @endforeach
                    </div>
                </div>
            @endif
            <!-- Banner End-->
            <!-- محصولات Tab Start -->
            <div id="product-tab" class="product-tab">
                <ul id="tabs" class="tabs">
                    <li><a href="#tab-latest">جدیدترین</a></li>
                    <li><a href="#tab-special">ویژه</a></li>
                    <li><a href="#tab-bestseller">پرفروش</a></li>
                    <li><a href="#tab-featured">پیشنهادی</a></li>

                </ul>
                <div id="tab-latest" class="tab_content">
                    <div class="owl-carousel product_carousel_tab">
                        @foreach($latestProduct as $product)
                            @if($product->status == 1 && $product->stock > 0)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.single', ['slug' => $product->slug])}}"><img src="{{$product->photos[0]->path}}" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
                                    <div class="caption">
                                        <h4><a href="{{route('product.single', ['slug' => $product->slug])}}">{{$product->title}}</a></h4>
                                        @if($product->discount_price)
                                            <p class="price"><span class="price-new">{{$product->discount_price}} تومان</span> <span class="price-old">{{$product->price}} تومان</span><span class="saving">{{round(abs(($product->price-$product->discount_price)/$product->price * 100))}}%</span></p>
                                        @else
                                            <p class="price"> {{$product->price}} تومان </p>
                                        @endif
                                    </div>
                                    <div class="button-group">
                                        <a class="btn-primary" href="{{route('cart.add', ['id'=> $product->id])}}" ><span>افزودن به سبد</span></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div id="tab-special" class="tab_content">
                    <div class="owl-carousel product_carousel_tab">
                        @foreach($discountedProduct as $product)
                            @if($product->status == 1 && $product->stock > 0 && $product->discount_price != null)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.single', ['slug' => $product->slug])}}"><img src="{{$product->photos[0]->path}}" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
                                    <div class="caption">
                                        <h4><a href="{{route('product.single', ['slug' => $product->slug])}}">{{$product->title}}</a></h4>
                                        @if($product->discount_price)
                                            <p class="price"><span class="price-new">{{$product->discount_price}} تومان</span> <span class="price-old">{{$product->price}} تومان</span><span class="saving">{{round(abs(($product->price-$product->discount_price)/$product->price * 100))}}%</span></p>
                                        @else
                                            <p class="price"> {{$product->price}} تومان </p>
                                        @endif
                                    </div>
                                    <div class="button-group">
                                        <a class="btn-primary" href="{{route('cart.add', ['id'=> $product->id])}}" ><span>افزودن به سبد</span></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>


                <div id="tab-bestseller" class="tab_content">
                    <div class="owl-carousel product_carousel_tab">
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/product-3.jpg" alt="کفش راحتی مردانه" title="کفش راحتی مردانه" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">مربای انجیر</a></h4>
                                <p class="price"> <span class="price-new">32000 تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-25%</span> </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick="cart.add('46');"><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/product-4.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">تن ماهی طبیعت</a></h4>
                                <p class="price"> 211000 تومان </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick="cart.add('43');"><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/product-5.jpg" alt="آیفون 7" title="آیفون 7" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">ناگت مرغ</a></h4>
                                <p class="price"> 2200000 تومان </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/product-6.jpg" alt="تیشرت آستین بلند مردانه" title="تیشرت آستین بلند مردانه" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">نودل نودالیت</a></h4>
                                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-20%</span> </p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-featured" class="tab_content">
                    <div class="owl-carousel product_carousel_tab">
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/product-3.jpg" alt="کفش راحتی مردانه" title="کفش راحتی مردانه" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">مربای انجیر</a></h4>
                                <p class="price"> <span class="price-new">32000 تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-25%</span> </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick="cart.add('46');"><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/product-4.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">تن ماهی طبیعت</a></h4>
                                <p class="price"> 211000 تومان </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick="cart.add('43');"><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/product-5.jpg" alt="آیفون 7" title="آیفون 7" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">ناگت مرغ</a></h4>
                                <p class="price"> 2200000 تومان </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/product-6.jpg" alt="تیشرت آستین بلند مردانه" title="تیشرت آستین بلند مردانه" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">نودل نودالیت</a></h4>
                                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-20%</span> </p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    <!-- محصولات Tab Start -->
            <!-- Banner Start -->
            <div class="marketshop-banner">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/banner-8.jpg" alt="2 Block Banner" title="2 Block Banner" /></a></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/product-9.jpg" alt="2 Block Banner 1" title="2 Block Banner 1" /></a></div>
                </div>
            </div>
            <!-- Banner End -->
            <!-- دسته ها محصولات Slider Start-->
            <div class="category-module" id="latest_category">
                <h3 class="subtitle">  آرایشی و بهداشتی -  <a class="viewall" href="category.tpl">نمایش همه</a></h3>
                <div class="category-module-content">
                    <ul id="sub-cat" class="tabs">
                        <li><a href="#tab-cat1">لوازم آرایشی</a></li>
                        <li><a href="#tab-cat2">لوازم بهداشتی</a></li>
                        <li><a href="#tab-cat3">لوازم شخصی برقی</a></li>
                        <li><a href="#tab-cat4">عطر</a></li>
                        <li><a href="#tab-cat5">ابزار سلامت</a></li>
                    </ul>
                    <div id="tab-cat1" class="tab_content">
                        <div class="owl-carousel latest_category_tabs">
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-10.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">کرم شوینده</a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-11.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html"> کرم پودر 4 تایی </a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-12.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">دستمال مرطوب</a></h4>
                                    <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-13.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">تونیک پاک کننده</a></h4>
                                    <p class="price"> 211000 تومان </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-14.jpg" alt="لپ تاپ hp پاویلیون" title="لپ تاپ hp پاویلیون" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">پاک کننده چشم</a></h4>
                                    <p class="price"> 122000 تومان </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-10.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">کرم شوینده</a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-cat2" class="tab_content">
                        <div class="owl-carousel latest_category_tabs">
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-10.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">کرم شوینده</a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-11.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html"> کرم پودر 4 تایی </a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-12.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">دستمال مرطوب</a></h4>
                                    <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-13.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">تونیک پاک کننده</a></h4>
                                    <p class="price"> 211000 تومان </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-14.jpg" alt="لپ تاپ hp پاویلیون" title="لپ تاپ hp پاویلیون" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">پاک کننده چشم</a></h4>
                                    <p class="price"> 122000 تومان </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-10.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">کرم شوینده</a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-cat3" class="tab_content">
                        <div class="owl-carousel latest_category_tabs">
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-10.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">کرم شوینده</a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-11.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html"> کرم پودر 4 تایی </a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-12.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">دستمال مرطوب</a></h4>
                                    <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-13.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">تونیک پاک کننده</a></h4>
                                    <p class="price"> 211000 تومان </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-14.jpg" alt="لپ تاپ hp پاویلیون" title="لپ تاپ hp پاویلیون" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">پاک کننده چشم</a></h4>
                                    <p class="price"> 122000 تومان </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-10.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">کرم شوینده</a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-cat4" class="tab_content">
                        <div class="owl-carousel latest_category_tabs">
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-10.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">کرم شوینده</a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-11.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html"> کرم پودر 4 تایی </a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-12.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">دستمال مرطوب</a></h4>
                                    <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-13.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">تونیک پاک کننده</a></h4>
                                    <p class="price"> 211000 تومان </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-14.jpg" alt="لپ تاپ hp پاویلیون" title="لپ تاپ hp پاویلیون" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">پاک کننده چشم</a></h4>
                                    <p class="price"> 122000 تومان </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-10.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">کرم شوینده</a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-cat5" class="tab_content">
                        <div class="owl-carousel latest_category_tabs">
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-10.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">کرم شوینده</a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-11.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html"> کرم پودر 4 تایی </a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-12.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">دستمال مرطوب</a></h4>
                                    <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-13.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">تونیک پاک کننده</a></h4>
                                    <p class="price"> 211000 تومان </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-14.jpg" alt="لپ تاپ hp پاویلیون" title="لپ تاپ hp پاویلیون" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">پاک کننده چشم</a></h4>
                                    <p class="price"> 122000 تومان </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="image/product/product-10.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html">کرم شوینده</a></h4>
                                    <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- دسته ها محصولات Slider End-->

            <!-- دسته ها محصولات Slider Start -->
            <!--<h3 class="subtitle">البسه - <a class="viewall" href="categories.html">نمایش همه</a></h3>-->
            <!--<div class="owl-carousel latest_category_carousel">-->
            <!--<div class="product-thumb">-->
            <!--<div class="image"><a href="product.html"><img src="image/product/iphone_6-220x330.jpg" alt="کرم مو آقایان" title="کرم مو آقایان" class="img-responsive" /></a></div>-->
            <!--<div class="caption">-->
            <!--<h4><a href="product.html">کرم مو آقایان</a></h4>-->
            <!--<p class="price"> 42300 تومان </p>-->
            <!--<div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>-->
            <!--</div>-->
            <!--<div class="button-group">-->
            <!--<button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>-->
            <!--<div class="add-to-links">-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--<div class="product-thumb">-->
            <!--<div class="image"><a href="product.html"><img src="image/product/nikon_d300_5-220x330.jpg" alt="محصولات مراقبت از مو" title="محصولات مراقبت از مو" class="img-responsive" /></a></div>-->
            <!--<div class="caption">-->
            <!--<h4><a href="product.html">محصولات مراقبت از مو</a></h4>-->
            <!--<p class="price"> <span class="price-new">66000 تومان</span> <span class="price-old">90000 تومان</span> <span class="saving">-27%</span> </p>-->
            <!--<div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>-->
            <!--</div>-->
            <!--<div class="button-group">-->
            <!--<button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>-->
            <!--<div class="add-to-links">-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--<div class="product-thumb">-->
            <!--<div class="image"><a href="product.html"><img src="image/product/nikon_d300_4-220x330.jpg" alt="کرم لخت کننده مو" title="کرم لخت کننده مو" class="img-responsive" /></a></div>-->
            <!--<div class="caption">-->
            <!--<h4><a href="product.html">کرم لخت کننده مو</a></h4>-->
            <!--<p class="price"> 88000 تومان </p>-->
            <!--</div>-->
            <!--<div class="button-group">-->
            <!--<button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>-->
            <!--<div class="add-to-links">-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--<div class="product-thumb">-->
            <!--<div class="image"><a href=""><img src="image/product/macbook_5-220x330.jpg" alt="ژل حمام بانوان" title="ژل حمام بانوان" class="img-responsive" /></a></div>-->
            <!--<div class="caption">-->
            <!--<h4><a href="product.html">ژل حمام بانوان</a></h4>-->
            <!--<p class="price"> <span class="price-new">19500 تومان</span> <span class="price-old">21900 تومان</span> <span class="saving">-4%</span> </p>-->
            <!--</div>-->
            <!--<div class="button-group">-->
            <!--<button class="btn-primary" type="button" onClick="cart.add('61');"><span>افزودن به سبد</span></button>-->
            <!--<div class="add-to-links">-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick="wishlist.add('61');"><i class="fa fa-heart"></i></button>-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick="compare.add('61');"><i class="fa fa-exchange"></i></button>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--<div class="product-thumb">-->
            <!--<div class="image"><a href="product.html"><img src="image/product/macbook_4-220x330.jpg" alt="عطر گوچی" title="عطر گوچی" class="img-responsive" /></a></div>-->
            <!--<div class="caption">-->
            <!--<h4><a href="product.html">عطر گوچی</a></h4>-->
            <!--<p class="price"> 85000 تومان </p>-->
            <!--<div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>-->
            <!--</div>-->
            <!--<div class="button-group">-->
            <!--<button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>-->
            <!--<div class="add-to-links">-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--<div class="product-thumb">-->
            <!--<div class="image"><a href="product.html"><img src="image/product/macbook_3-220x330.jpg" alt="رژ لب گارنیر" title="رژ لب گارنیر" class="img-responsive" /></a></div>-->
            <!--<div class="caption">-->
            <!--<h4><a href="product.html">رژ لب گارنیر</a></h4>-->
            <!--<p class="price"> 123000 تومان </p>-->
            <!--</div>-->
            <!--<div class="button-group">-->
            <!--<button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>-->
            <!--<div class="add-to-links">-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--<div class="product-thumb">-->
            <!--<div class="image"><a href="product.html"><img src="image/product/macbook_2-220x330.jpg" alt="عطر نینا ریچی" title="عطر نینا ریچی" class="img-responsive" /></a></div>-->
            <!--<div class="caption">-->
            <!--<h4><a href="product.html">عطر نینا ریچی</a></h4>-->
            <!--<p class="price"> 110000 تومان </p>-->
            <!--</div>-->
            <!--<div class="button-group">-->
            <!--<button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>-->
            <!--<div class="add-to-links">-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>-->
            <!--<button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!-- دسته ها محصولات Slider End -->

            <!-- برند Logo Carousel Start-->
            @if(count($brands) > 0)
                <div id="carousel" class="owl-carousel nxt">
                    @foreach($brands as $brand)
                        <div class="item text-center">
                            <a href="#"><img src="{{$brand->photo->path}}" alt="{{$brand->title}}" class="img-responsive" /></a>
                        </div>
                    @endforeach
                </div>
            @endif
            <!-- برند Logo Carousel End -->
        </div>
        <!--Middle Part End-->
    </div>
@endsection