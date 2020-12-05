@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable text-center" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">stt</th>
                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1">Số đơn hàng</th>
                                    <th rowspan="1" colspan="1">Email</th>
                                    <th rowspan="1" colspan="1">Status</th>
                                    <th rowspan="1" colspan="1">Create at</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt=1; ?>
                                @foreach ($users as $user)
                                    <tr role="row" class="odd">
                                        <td>{{ $stt }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->carts_count }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <form style="display: inline-block" action="{{ url('admin/change-status-customer/'.$user->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    @if ($user->status=='active')
                                                        <button type="submit" class="btn btn-sm btn-outline-success btn-circle">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    @endif
                                                    @if ($user->status=='disable')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger btn-circle">
                                                            <i class="fas fa-ban"></i>
                                                        </button>
                                                    @endif
                                                </form>
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
