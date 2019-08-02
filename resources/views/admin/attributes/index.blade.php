@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">ویژگی ها</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('attributes-group.create')}}">
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
                {{--Sessions Start--}}
                @if(Session::has('attribueGroup_delete'))
                    <div class="alert alert-danger">
                        <div class="text-center">{{session('attribueGroup_delete')}}</div>
                    </div>
                @endif
                @if(Session::has('attribueGroup_update'))
                    <div class="alert alert-success">
                        <div class="text-center">{{session('attribueGroup_update')}}</div>
                    </div>
                @endif
                @if(Session::has('attribueGroup_create'))
                    <div class="alert alert-success">
                        <div class="text-center">{{session('attribueGroup_create')}}</div>
                    </div>
                @endif
                {{--Sessions End--}}
                <div class="table-responsive">
                    <table dir="rtl" class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th>عنوان</th>
                            <th>نوع</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        <tbody>
                        @foreach($attributesGroup as $attribute)
                            <tr>
                                <td class="text-center">{{$attribute->id}}</td>
                                <td>{{$attribute->title}}</td>
                                <td>{{$attribute->type}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{route('attributes-group.edit', $attribute->id)}}">ویرایش</a>
                                    <div style="display: inline-block">
                                        <form method="post" action="/administrator/attributes-group/{{$attribute->id}}">
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