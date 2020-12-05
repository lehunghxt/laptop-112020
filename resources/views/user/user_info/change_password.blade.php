@extends('user.layoutUser.design')
@section('content')
    <section id="cart_items" style="height: 75vh;">
        <div class="container">
            <div class="breadcrumbs" style="display: flex;justify-content: space-between;align-items: center;">
                <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"> Đổi mật khẩu</li>
                </ol>
            </div>
            <div class="col-md-12" style="display: flex;justify-content: center;height: 45vh;">
                <form class="col-md-5" action="{{ url('change-pasword') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="old_password">Mật khẩu cũ:</label>
                        <input type="password" class="form-control" name="old_password" value="{{ old('old_password') }}" id="old_password" placeholder="Mật khẩu cũ" required>
                        @if ($errors->has('old_password'))
                            <span class="text-danger">{{ $errors->first('old_password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu mới:</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password" placeholder="Mật khẩu mới" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Xác nhận mật khẩu mới:</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Xác nhận mật khẩu mới" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-danger">Đổi mật khẩu</button>
                </form>
            </div>
        </div>
    </section>
@endsection
