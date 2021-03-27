@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng - {{ $order->order_code }} - {{ $order->customer->name }} - {{ price($order->total_price) }}đ</h6>
        @if ($order->order_status == 'new')
        <div class="d-flex justify-content-center">
            <button class="btn btn-sm btn-outline-danger">
                In đơn hàng
            </button>
            <form action="{{ url('admin/done-order') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <button type="submit" class="btn btn-sm btn-outline-success">
                    Hoàn Thành
                </button>
            </form>
        </div>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm table-bordered dataTable text-center" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng</th>
                                    <th>Thời gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_detail as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td style="text-align: left;">{{ $order->name }}</td>
                                        <td style="text-align: left;">{{ price($order->price) }}đ</td>
                                        <td>{{ $order->qty }}</td>
                                        <td>{{ changeTime($order->created_at) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
