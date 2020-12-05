@extends('user.layoutUser.design')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs" style="display: flex;justify-content: space-between;align-items: center;">
                <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"> Thêm Thông Tin Địa Chỉ</li>
                </ol>
            </div>
            <div class="col-md-12" style="display: flex;justify-content: center;height: 45vh;">
                <form class="col-md-5" action="{{ url('add-user-info') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ" required>
                    @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                    </div>
                    <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" required>
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                    </div>
                    <button type="submit" class="btn btn-danger">Thêm</button>
                </form>
            </div>
        </div>
    </section>
@endsection
