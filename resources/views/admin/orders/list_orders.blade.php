@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng    </h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Mã đơn hàng</th>
                                    <th rowspan="1" colspan="1">Tên khách hàng</th>
                                    <th rowspan="1" colspan="1">Tổng tiền</th>
                                    <th rowspan="1" colspan="1">Trạng thái đơn hàng</th>
                                    <th rowspan="1" colspan="1">Thời gian</th>
                                    <th rowspan="1" colspan="1">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr role="row" class="odd">
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order_code }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ price($order->total_price) }}đ</td>
                                        <td>
                                            <span class="btn btn-sm btn-outline-info w-75">
                                                {{ $order->order_status }}
                                            </span>
                                        </td>
                                        <td>{{ changeTime($order->created_at) }}</td>
                                        <td>
                                            <a href="{{ url('admin/order-detail/'.$order->id) }}" class="btn btn-sm btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="text">Chi Tiết</span>
                                            </a>
                                        </td>
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
