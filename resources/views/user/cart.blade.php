@extends('user.layoutUser.design')
@section('content')
<section id="cart_items" style="height: 80vh;">
    <div class="container">
        <div class="breadcrumbs" style="display: flex;justify-content: space-between;align-items: center;">
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
            <a class="btn btn-danger" href="{{ url('checkout') }}">Thanh Toán</a>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed text-center">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình Ảnh</td>
                        <td>Tên sản phẩm</td>
                        <td>Mã sản phẩm</td>
                        <td>Số lượng</td>
                        <td>Đơn giá</td>
                        <td>Tổng tiền</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @if (Session::has('cart'))
                        @foreach ($products as $pro)
                            <tr>
                                <td>
                                    <a href="{{ url('p/'.$pro->pro_slug) }}">
                                        <img style="width: 110px;height:auto;object-fit:cover;" src="{{ asset('admin/img/products/'.$pro->pro_image) }}" alt="{{ $pro->pro_name }}">
                                    </a>
                                </td>
                                <td>{{ $pro->pro_name }}</td>
                                <td>{{ $pro->pro_code }}</td>
                                <td>
                                    <?php $qty = (array_key_exists($pro->pro_code, $carts))?$carts[$pro->pro_code]['pro_qty']:''; ?>
                                    {{ $qty }}
                                </td>
                                <td>{{ number_format($pro->pro_price,0,',','.') }}đ</td>
                                <td>
                                    <?php $price = (array_key_exists($pro->pro_code, $carts))?$pro->pro_price*$carts[$pro->pro_code]['pro_qty']:$pro->pro_price; ?>
                                    {{ number_format($price,0,',','.') }}đ
                                </td>
                                <td>
                                    <form style="display: inline-block" method="POST" action="{{ url('deleteCartItem') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="pro_code" value="{{ $pro->pro_code }}">
                                        <button type="submit" class="cart_quantity_delete" href=""><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection
