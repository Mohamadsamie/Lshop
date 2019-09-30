@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">سفارشات</h3>
                {{--<div class="box-tools pull-right">--}}
                    {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                    {{--</button>--}}
                {{--</div>--}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                {{--Sessions Start--}}
                @if(Session::has('delete'))
                    <div class="alert alert-danger">
                        <div style="direction: rtl;"  class="text-center">{{session('delete')}}</div>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <div class="text-center">{{session('success')}}</div>
                    </div>
                @endif
                @if(Session::has('edit'))
                    <div class="alert alert-success">
                        <div class="text-center">{{session('edit')}}</div>
                    </div>
                @endif
                {{--Sessions End--}}
                <div class="table-responsive">
                    <table dir="rtl" class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">مقدار</th>
                            <th class="text-center">وضعیت</th>
                        </tr>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="text-center">{{$order->id}}</td>
                                <td class="text-center">{{$order->amount}}</td>
                                @if($order->status == 0)
                                    <td class="text-center"><span class="label label-danger">پرداخت نشده</span></td>
                                @else
                                    <td class="text-center"><span class="label label-success">پرداخت شده</span></td>
                                @endif
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