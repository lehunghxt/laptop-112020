@extends('user.layoutUser.design')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng ký tài khoản</h2>
                    <form method="POST" action="{{ url('register') }}">
                        {{ csrf_field() }}
                            @if ($errors->has('name'))
                                <span style="color: red;">{{ $errors->first('name') }}</span>
                            @endif
                        <input type="text" name="name" placeholder="Tên" required/>

                            @if ($errors->has('address'))
                                <span style="color: red;">{{ $errors->first('address') }}</span>
                            @endif
                        <input type="text" name="address" placeholder="Địa chỉ" required/>

                            @if ($errors->has('phone'))
                                <span style="color: red;">{{ $errors->first('phone') }}</span>
                            @endif
                        <input type="text" name="phone" placeholder="Số điện thoại" required/>

                            @if ($errors->has('email'))
                                <span style="color: red;">{{ $errors->first('email') }}</span>
                            @endif
                        <input type="email" name="email" placeholder="Email Address" required/>

                            @if ($errors->has('password'))
                                <span style="color: red;">{{ $errors->first('password') }}</span>
                            @endif
                        <input type="password" name="password" placeholder="Mật khẩu" required/>

                        <input type="password" name="password_confirmation" placeholder="Xác nhập khẩu" />

                        <div class="form-group">
                            <label for="captcha">Captcha</label>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span style="color: red;">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
