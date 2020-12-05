@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4 col-8" style="margin: 0 auto;">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Category</h6>
        <a href="{{ url('admin/add-category') }}" class="btn btn-sm btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Add Category</span>
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
                    <div class="col-sm-12">
                        <table class="table table-sm table-bordered dataTable text-center" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">Stt</th>
                                    <th rowspan="1" colspan="1">Cate Name</th>
                                    <th rowspan="1" colspan="1">Số Lượng</th>
                                    <th rowspan="1" colspan="1">Status</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt=1; ?>
                                @foreach ($categories as $cate)
                                    <tr role="row" class="odd">
                                        <td>{{ $stt }}</td>
                                        <td>
                                            <a href="{{ url('admin/'.$cate->cate_slug.'/list-products') }}" class="w-50 btn btn-sm btn-outline-secondary">
                                                {{ $cate->cate_name }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $cate->products_count }}
                                        </td>
                                        <td>
                                            @if ($cate->cate_status=='active')
                                                <button type="submit" class="btn btn-sm btn-outline-success btn-circle">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif
                                            @if ($cate->cate_status=='disable')
                                                <button type="submit" class="btn btn-sm btn-outline-danger btn-circle">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            @endif
                                            {{-- {{ $cate->cate_status }} --}}
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/edit-category/'.$cate->id) }}" class="btn btn-sm btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form style="display: inline-block" method="POST" action="{{ url('admin/delete-category/'.$cate->id) }}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-danger btn-circle">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    <?php $stt++; ?>
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
