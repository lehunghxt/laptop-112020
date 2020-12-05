@extends('user.layoutUser.design')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập tài khoản của bạn</h2>
                    <form method="POST" action="{{ url('login') }}">
                        {{ csrf_field() }}
                        @if ($errors->has('email'))
                            <span style="color: red;">{{ $errors->first('email') }}</span>
                        @endif
                        <input type="email" id="email" name="email" placeholder="Email" required/>
                        @if ($errors->has('password'))
                            <span style="color: red;">{{ $errors->first('password') }}</span>
                        @endif
                        <input type="password" id="password" name="password" placeholder="Password" required/>
                        <a href="{{ url('register') }}">Đăng ký tài khoản ?</a>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
