@extends('user.layoutUser.design')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="col-md-12" style="padding-bottom: 50px;">
            <form method="POST" action="{{ url('checkout') }}">
                {{ csrf_field() }}
                <label>Chọn một địa chỉ để giao hàng:</label><br>
                @if ($errors->has('user_info_id'))
                    <span class="text-danger">{{ $errors->first('user_info_id') }}</span>
                @endif
                <div class="row">
                    <?php $id=1; ?>
                    @foreach ($user_infos as $info)
                        <div class="col-md-6 well well-sm">
                            <div class="radio">
                            <label style="padding:30px 80% 30px 10px;"><input type="radio" value="{{ $info->id }}" name="user_info_id"><b>Địa chỉ {{ $id }}:</b> </label>
                            <p>{{ $info->address }}</p>
                            <p>{{ $info->phone }}</p>
                            </div>
                        </div>
                        <?php $id++; ?>
                    @endforeach
                </div>
                <div class="form-group col-md-12">
                    <label for="order_note">Ghi chú cho đơn hàng:</label>
                    @if ($errors->has('order_note'))
                        <span class="text-danger">{{ $errors->first('order_note') }}</span>
                    @endif
                    <textarea class="form-control" rows="5" name="order_note" id="order_note" placeholder="Ghi chú cho đơn hàng của bạn . . ."></textarea>
                  </div>
                <button type="submit" class="btn btn-danger">Xác Nhận Đơn Hàng</button>
              </form>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">image</td>
                        <td>name</td>
                        <td>code</td>
                        <td>qty</td>
                        <td>price</td>
                        <td>totle</td>
                    </tr>
                </thead>
                <tbody>
                    @if (Session::has('cart'))
                    <?php $total = 0; ?>
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
                                    <?php
                                        $price = (array_key_exists($pro->pro_code, $carts))?$pro->pro_price*$carts[$pro->pro_code]['pro_qty']:'';
                                        $total += $price;
                                    ?>
                                    {{ number_format($price,0,',','.') }}đ
                                </td>
                            </tr>
                        @endforeach
                    @endif
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td><span>{{ number_format($total,0,',','.') }}đ</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection
