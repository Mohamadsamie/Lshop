{{--@foreach($categories as $category)--}}
    {{--<li class="dropdown"><a href="#">{{$category->name}}</a>--}}
        {{--@if(count($category->childrenRecursive) > 0)--}}
            {{--<div class="dropdown-menu">--}}
                {{--<ul>--}}
                    {{--@foreach($category->childrenRecursive as $sub_category)--}}
                        {{--@if(count($sub_category->childrenRecursive) > 0)--}}
                            {{--<li> <a title="{{$sub_category->name}}" href="">{{$sub_category->name}}<span>&rsaquo;</span></a>--}}
                                {{--@if(count($sub_category->childrenRecursive) > 0)--}}
                                    {{--<div class="dropdown-menu hidden-md hidden-sm hidden-xs">--}}
                                        {{--<ul>--}}
                                            {{--@foreach($sub_category->childrenRecursive as $sub_category)--}}
                                                {{--<li> <a title="{{$sub_category->name}}" href="#">{{$sub_category->name}}</a></li>--}}
                                            {{--@endforeach--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                            {{--</li>--}}
                        {{--@else--}}
                            {{--<li> <a title="{{$sub_category->name}}" href="$">{{$sub_category->name}}</a></li>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--@endif--}}
    {{--</li>--}}
{{--@endforeach--}}



{{--------------------------------------------------}}
@foreach($products as $product)
    @if($product->status == 1 && $product->stock > 0)
        <div class="product-layout product-list col-xs-12">
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
        </div>
    @endif
@endforeach
{{--------------------------------------------------}}


