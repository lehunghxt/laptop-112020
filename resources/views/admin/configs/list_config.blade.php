@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4 col-md-6"  style="margin: 0 auto;">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Cấu Hình</h6>
        <a href="{{ url('admin/add-config') }}" class="btn btn-sm btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Thêm Cấu Hinh</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-sm table-bordered dataTable text-center" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">STT</th>
                                    <th rowspan="1" colspan="1">Tên cấu hình</th>
                                    <th rowspan="1" colspan="1">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($configs as $config)
                                    <tr role="row" class="odd">
                                        <td>{{ $config->id }}</td>
                                        <td align="left">{{ $config->config_name }}</td>
                                        <td>
                                            <a style="width: 1.5rem;height:1.5rem;font-size:10px;" title="Thêm cấu hình chi tiết" href="{{ url('admin/list-config-detail/'.$config->id) }}" class="btn btn-info btn-circle">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                            <a style="width: 1.5rem;height:1.5rem;font-size:10px;" href="{{ url('admin/edit-config/'.$config->id) }}" class="btn btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST" style="display: inline-block" action="{{ url('admin/delete_config/'.$config->id) }}">
                                                {{ csrf_field() }}
                                                <button style="width: 1.5rem;height:1.5rem;font-size:10px;" type="submit" class="btn btn-danger btn-circle delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
