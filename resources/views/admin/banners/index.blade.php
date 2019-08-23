@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">لیست بنرها</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('banners.create')}}">
                        <i class="fa fa-plus"></i> جدید
                    </a>
                </div>
                {{--<div class="box-tools pull-right">--}}
                    {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                    {{--</button>--}}
                {{--</div>--}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                {{--Sessions Start--}}
                @if(Session::has('delete-banner'))
                    <div class="alert alert-danger">
                        <div style="direction: rtl;"  class="text-center">{{session('delete-banner')}}</div>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <div class="text-center">{{session('success')}}</div>
                    </div>
                @endif
                @if(Session::has('edit-banner'))
                    <div class="alert alert-success">
                        <div class="text-center">{{session('edit-banner')}}</div>
                    </div>
                @endif
                {{--Sessions End--}}
                <div class="table-responsive">
                    <table dir="rtl" class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th>عنوان</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td class="text-center">{{$banner->id}}</td>
                                <td>{{$banner->alt}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{route('banners.edit', $banner->id)}}">ویرایش</a>
                                    <div style="display: inline-block">
                                        <form method="post" action="/administrator/banners/{{$banner->id}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>
@endsection