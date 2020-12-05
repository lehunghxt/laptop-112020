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
    @if(Session::has('flash_message_error'))
        <div class="alert alert-danger">
            {{ Session::get('flash_message_error') }}
        </div>
    @endif
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success">
            {{ Session::get('flash_message_success') }}
        </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-sm table-bordered dataTable text-center" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($configs as $config)
                                    <tr role="row" class="odd">
                                        <td>{{ $config->id }}</td>
                                        <td>{{ $config->config_name }}</td>
                                        <td>
                                            <a href="{{ url('admin/list-config-detail/'.$config->id) }}" class="btn btn-info btn-circle">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                            <a href="{{ url('admin/edit-config/'.$config->id) }}" class="btn btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST" style="display: inline-block" action="{{ url('admin/delete_config/'.$config->id) }}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-circle">
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
