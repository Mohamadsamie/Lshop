@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{asset('/css/dropzone.css')}}">
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{$slide->alt}} ویرایش اسلایدر </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/administrator/slides/{{$slide->id}}">
                            @csrf
                            <div class="form-group">
                                <img src="{{$slide->photo->path}}" class="img-responsive" width="225" alt=""> <span>تصویر اسلایدر</span>
                            </div>
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="alt">متن توضیحی</label>
                                <input type="text" name="alt" class="form-control" value="{{$slide->alt}}">
                            </div>
                            <div class="form-group">
                                <label for="link">لینک</label>
                                <input type="url" name="link" class="form-control" value="{{$slide->link}}" >
                            </div>
                            <div class="form-group">
                                <label for="photo">تصویر</label>
                                <input type="hidden" name="photo_id" id="slide-photo" value="{{$slide->photo_id}}">
                                <div id="photo" class="dropzone"></div>
                            </div>
                            <button type="submit" class="btn btn-success pull-left">بروزرسانی</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/js/dropzone.js')}}"></script>
    <script>
        var drop = new Dropzone('#photo', {
            addRemoveLinks: true,
            maxFiles: 1,
            url: "{{ route('photos.upload') }}",
            sending: function(file, xhr, formData){
                formData.append("_token","{{csrf_token()}}")
            },
            success: function(file, response){
                document.getElementById('slide-photo').value = response.photo_id
            }
        });
    </script>
@endsection