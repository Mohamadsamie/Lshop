@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4><div class="card-header">{{ __('بازیابی کلمه عبور مدیران') }}</div></h4>
                <br>


                <div class="card-body">
                    @if (session('status'))
                        <div class="text-center alert alert-success" role="alert">
                            {{--{{ session('status') }}--}}
                            ما لینک تغییر رمز عبور را به ایمیل شما ارسال کردیم
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('آدرس ایمیل:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                        <strong>کاربری با ایمیل فوق یافت نشد!</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ارسال لینک بازیابی پسورد') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
