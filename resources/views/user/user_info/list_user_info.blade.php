@extends('user.layoutUser.design')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" style="display: flex;justify-content: space-between;align-items: center;">
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="active">User Info</li>
            </ol>
            <div>
                <a class="btn btn-info" href="{{ url('add-user-info') }}">Thêm Thông Tin Địa Chỉ</a>
                <a class="btn btn-warning" href="{{ url('change-pasword') }}">Đổi mật khẩu</a>
                <form style="display: inline-block" method="POST" action="{{ url('logout') }}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger"><i class="fa fa-sign-out"></i> Đăng Xuất</button>
                </form>
            </div>
        </div>
        <div class="table-responsive cart_info text-center">
            <h4>Danh sách địa chỉ:</h4>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="text-center">id</td>
                        <td>address</td>
                        <td>phone</td>
                        <td style="width: 150px">action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach ($user_infos as $info)
                        <tr>
                            <td class="text-center">{{ $id }}</td>
                            <td>{{ $info->address }}</td>
                            <td>{{ $info->phone }}</td>
                            <td style="display: flex;justify-content:space-around;align-items: center">
                                <a href="{{ url('edit-user-info/'.$info->id) }}" class="btn btn-warning">edit</a>
                                <form style="display: inline-block" method="POST" action="{{ url('delete-user-info') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $info->id }}">
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php $id++; ?>
                    @endforeach
                </tbody>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="table-responsive cart_info text-center">
                <h4>Danh sách đơn hàng:</h4>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="text-center">STT</td>
                            <td>Mã đơn hàng</td>
                            <td>Ghi chú</td>
                            <td>Tổng tiền</td>
                            <td>Trạng thái</td>
                            <td>Ngày mua</td>
                            <td>Chi Tiết</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1; ?>
                        @foreach ($order_user as $order)
                            <tr>
                                <td class="text-center">{{ $id }}</td>
                                <td>{{ $order->order_code }}</td>
                                <td>{{ $order->order_note }}</td>
                                <td>{{ price($order->total_price) }}đ</td>
                                <td>
                                    <span class="btn btn-sm btn-primary">{{ $order->order_status }}</span>
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <button ref="{{ $order->order_code }}" onclick="showAll(this);" class="btn btn-sm btn-info">Chi Tiết</button>
                                </td>
                            </tr>
                            <tr id="{{ $order->order_code }}" style="display: none;">
                                <td colspan="5">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <td>Tên sản phẩm</td>
                                                <td>Số lượng</td>
                                                <td>Đơn giá</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderDetail as $detail)
                                                <tr>
                                                    <td>{{ $detail->name }}</td>
                                                    <td>{{ $detail->qty }}</td>
                                                    <td>{{ price($detail->price) }}đ</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <?php $id++; ?>
                        @endforeach
                    </tbody>
                </table>
            {{--  --}}
        </div>
    </div>
</section>
@endsection
