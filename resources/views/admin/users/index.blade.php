@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">لیست کاربران</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('users.create')}}">
                        <i class="fa fa-plus"></i> افزودن
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
                @include('admin.partials.form-errors')
                @if(Session::has('delete_user'))
                    <div class="alert alert-danger">
                        <div class="text-center">{{session('delete_user')}}</div>
                    </div>
                @endif
                @if(Session::has('update_user'))
                    <div class="alert alert-success">
                        <div class="text-center">{{session('update_user')}}</div>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <div class="text-center">{{session('success')}}</div>
                    </div>
                @endif
                {{--Sessions End--}}
                <div class="table-responsive">
                    <table dir="rtl" class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">نام</th>
                            <th>ایمیل</th>
                            <th>شماره تماس</th>
                            <th class="text-center">نقش</th>
                            <th class="text-center">وضعیت</th>
                            <th>تاریخ عضویت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{$user->name . ' ' . $user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td class="text-center">
                                    <ul class="list-unstyled">
                                        @foreach($user->roles as $role)
                                            <li>{{$role->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                @if($user->status == 0)
                                    <td class="text-center"><span class="label label-danger">غیرفعال</span></td>
                                @else
                                    <td class="text-center"><span class="label label-success">فعال</span></td>
                                @endif
                                <td>{{Hekmatinasser\Verta\Verta::instance($user->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{route('users.edit', $user->id)}}">ویرایش</a>
                                    <div style="display: inline-block">
                                        <form method="post" action="/administrator/users/{{$user->id}}">
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