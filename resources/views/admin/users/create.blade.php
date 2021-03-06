@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">ایجاد کاربر جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form id="myForm" method="post" action="/administrator/users">
                            @csrf
                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" name="name" class="form-control" placeholder="نام را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="last_name">نام خانوادگی</label>
                                <input type="text" name="last_name" class="form-control" placeholder="نام خانوادگی را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="national_code">کد ملی</label>
                                <input type="text" name="national_code" class="form-control" placeholder="کد ملی را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="phone">شماره تماس</label>
                                <input type="text" name="phone" class="form-control" placeholder="شماره تماس را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input type="text" name="email" class="form-control" placeholder="شماره تماس را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label for=""> تعیین نقش کاربر</label>
                                <select name="roles[]" id="" class="form-control" multiple>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class=" control-label">وضعیت</label>
                                <div style="direction: rtl;">
                                    <label class="radio-inline">
                                        <input type="radio" value="1" name="status">
                                        فعال</label>
                                    <label class="radio-inline">
                                        <input type="radio"  value="0" name="status">
                                        غیرفعال</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password"> رنتخاب رمز</label>
                                <input type="password" name="password" class="form-control" placeholder="رمز عبور را انتخاب کنید...">
                            </div>
                            <div class="form-group">
                                <label for="confirmed" class="control-label">تکرار رمز عبور</label>
                                <input type="password" class="form-control"  placeholder="تکرار رمز عبور" name="password_confirmed">
                            </div>


                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
