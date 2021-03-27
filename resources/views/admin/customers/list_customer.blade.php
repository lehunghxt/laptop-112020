@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách khách hàng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm table-bordered dataTable" id="dataTable" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số đơn hàng</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt=1; ?>
                                @foreach ($users as $user)
                                    <tr role="row" class="odd">
                                        <td style="text-align: center;">{{ $stt }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td style="text-align: center;">{{ $user->carts_count }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <button ref='{{ url('admin/change-status-customer/'.$user->id) }}' class="btnChangeStatus btn btn-sm btn-outline-{{($user->status=='active')?'success':'danger'}} btn-circle">
                                                <i class="fas fa-{{($user->status=='active')?'check':'ban'}}"></i>
                                            </button>
                                        </td>
                                        <td>{{ changeTime($user->created_at) }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="text">Chi Tiết</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $stt++ ?>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $users->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
