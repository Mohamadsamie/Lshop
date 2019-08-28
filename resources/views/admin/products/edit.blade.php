@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{asset('/css/dropzone.css')}}">
@endsection

@section('content')
    <section id="app" class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">ویرایش محصول {{$product->title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/administrator/products/{{$product->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="title">نام</label>
                                <input value="{{$product->title, old('title')}}" type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="slug">نام مستعار</label>
                                <input value="{{$product->slug, old('slug')}}" type="text" name="slug" class="form-control" placeholder="نام مستعار محصول را وارد کنید...">
                            </div>
                            {{--Vue.js component--}}
                            <attribute-component :brands="{{ $brands }}" :product="{{ $product }}"></attribute-component>
                            {{--Vue.js component--}}
                            <div class="form-group" style="direction: rtl;">
                                <label for="status"> وضعیت نشر</label><br>
                                <input  type="radio" name="status" value="0" @if($product->status == 0) checked @endif ><span style="margin: 0 10px;">منتشر نشده</span>
                                <input  type="radio" name="status" value="1" @if($product->status == 1) checked @endif ><span style="margin: 0 10px;">منتشر شده</span>
                            </div>
                            <div class="form-group">
                                <label for="stock">موجودی انبار</label>
                                <input value="{{$product->stock, old('price')}}" type="number" name="stock" class="form-control" placeholder="موجودی محصول را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="price">قیمت محصول</label>
                                <input value="{{$product->price, old('price')}}" type="number" name="price" class="form-control" placeholder="قیمت محصول را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="discount_price">قیمت ویژه</label>
                                <input value="{{$product->discount_price, old('discount_price')}}" type="number" name="discount_price" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea id="description" type="text" name="description" class="ckeditor form-control">{{$product->description, old('description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">گالری تصاویر</label>
                                <input  value="{{old('photo_id[]')}}" type="hidden" name="photo_id[]" id="product-photo">
                                <div id="photo" class="dropzone"></div>
                                <div class="row">
                                    @foreach($product->photos as $photo)
                                        <div class="col-sm-3" id="updated_photo_{{$photo->id}}">
                                            <img class="img-responsive" src="{{$photo->path}}">
                                            <button type="button" class="btn btn-danger" onclick="removeImages({{$photo->id}})">حذف</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="meta_title">عنوان سئو</label>
                                <input value="{{$product->meta_title, old('meta_title')}}" type="text" name="meta_title" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="meta_desc">توضیحات سئو</label>
                                <textarea type="text" name="meta_desc" class="form-control" >{{$product->meta_desc, old('meta_desc')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">کلمات کلیدی سئو</label>
                                <input value="{{$product->meta_keywords, old('meta_keywords')}}" type="text" name="meta_keywords" class="form-control">
                            </div>

                            <button type="submit" onclick="productGalley()" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script-vuejs')
    <script src="{{asset('admin/js/app.js')}}"></script>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/js/dropzone.js')}}"></script>
    <script type="text/javascript" src="{{asset('/admin/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        Dropzone.autoDiscover = false;
        var photosGallery = []
        var photos = [].concat({{$product->photos->pluck('id')}})
        var drop = new Dropzone('#photo', {
            addRemoveLinks: true,
            url: "{{ route('photos.upload') }}",
            sending: function(file, xhr, formData){
                formData.append("_token","{{csrf_token()}}")
            },
            success: function(file, response){
                photosGallery.push(response.photo_id)
            }
        });
        productGalley =function () {
            document.getElementById('product-photo').value = photosGallery.concat(photos)
        }
        CKEDITOR.replace('description',{
            customConfig: 'config.js',
            toolbar: 'simple',
            language: 'fa',
            removePlugins: 'cloudservices'
        })
        removeImages = function(id){
            var index = photos.indexOf(id)
            photos.splice(index, 1);
            document.getElementById('updated_photo_' + id).remove();
        }
    </script>
@endsection
