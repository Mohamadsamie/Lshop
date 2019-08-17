@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{asset('/css/dropzone.css')}}">
@endsection

@section('content')
    <section id="app" class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">ایجاد محصول جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form id="myForm" method="post" action="/administrator/products">
                            @csrf
                            <div class="form-group">
                                <label for="title">نام</label>
                                <input type="text" name="title" class="form-control" placeholder="نام محصول را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="slug">نام مستعار</label>
                                <input type="text" name="slug" class="form-control" placeholder="نام مستعار محصول را وارد کنید...">
                            </div>
                            {{--Vue.js component--}}
                            <attribute-component :brands="{{ $brands }}"></attribute-component>
                            {{--Vue.js component--}}
                            <div class="form-group" style="direction: rtl;">
                                <label for="status"> وضعیت نشر</label><br>
                                <input type="radio" name="status" value="0" checked><span style="margin: 0 10px;">منتشر نشده</span>
                                <input type="radio" name="status" value="1"><span style="margin: 0 10px;">منتشر شده</span>
                            </div>
                            <div class="form-group">
                                <label for="price">قیمت محصول</label>
                                <input type="number" name="price" class="form-control" placeholder="قیمت محصول را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="discount_price">قیمت ویژه</label>
                                <input type="number" name="discount_price" class="form-control" placeholder="قیمت ویژه محصول را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label for="textareaDescription">توضیحات</label>
                                <textarea type="text" name="textareaDescription" class="ckeditor form-control" placeholder="توضیحات برند را وارد کنید..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">گالری تصاویر</label>
                                <input type="hidden" name="photo_id[]" id="product-photo">
                                <div id="photo" class="dropzone"></div>
                            </div>
                            <div class="form-group">
                                <label for="meta_title">عنوان سئو</label>
                                <input type="text" name="meta_title" class="form-control" placeholder="عنوان سئو را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="meta_desc">توضیحات سئو</label>
                                <textarea type="text" name="meta_desc" class="form-control" placeholder="توضیحات سئو را وارد کنید..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">کلمات کلیدی سئو</label>
                                <input type="text" name="meta_keywords" class="form-control" placeholder="کلمات کلیدی سئو را وارد کنید...">
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
        var photoGallery = []
        var drop = new Dropzone('#photo', {
            addRemoveLinks: true,
            url: "{{ route('photos.upload') }}",
            sending: function(file, xhr, formData){
                formData.append("_token","{{csrf_token()}}")
            },
            success: function(file, response){
                photoGallery.push(response.photo_id)
            }
        });
        productGalley =function () {
            document.getElementById('product-photo').value = photoGallery
        }
        CKEDITOR.replace('textareaDescription',{
            customConfig: 'config.js',
            toolbar: 'simple',
            language: 'fa',
            removePlugins: 'cloudservices'
        })
    </script>
@endsection