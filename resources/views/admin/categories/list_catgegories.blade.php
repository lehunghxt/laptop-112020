@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4 col-12" style="margin: 0 auto;">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách hãng laptop</h6>
        <a href="{{ url('admin/add-category') }}" class="btn btn-sm btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Thêm hãng Laptop</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm table-bordered dataTable text-center" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">STT</th>
                                    <th rowspan="1" colspan="1">Hãng laptop</th>
                                    <th rowspan="1" colspan="1">Số Lượng laptop</th>
                                    <th rowspan="1" colspan="1">Trạng thái</th>
                                    <th rowspan="1" colspan="1">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt=1; ?>
                                @foreach ($categories as $cate)
                                    <tr role="row" class="odd">
                                        <td>{{ $stt }}</td>
                                        <td style="text-align: left;">
                                            <a  href="{{ url('admin/'.$cate->cate_slug.'/list-products') }}">
                                                {{ $cate->cate_name }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $cate->products_count }}
                                        </td>
                                        <td>
                                            <button style="width: 1.5rem;height:1.5rem;font-size:10px;" ref='{{ url('admin/change-status-category/'.$cate->id) }}' class="btnChangeStatus btn btn-sm btn-outline-{{($cate->cate_status=='active')?'success':'danger'}} btn-circle">
                                                <i class="fas fa-{{($cate->cate_status=='active')?'check':'ban'}}"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <a style="width: 1.5rem;height:1.5rem;font-size:10px;" href="{{ url('admin/edit-category/'.$cate->id) }}" class="btn btn-sm btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form style="display: inline-block" method="POST" action="{{ url('admin/delete-category/'.$cate->id) }}">
                                                {{ csrf_field() }}
                                                <button style="width: 1.5rem;height:1.5rem;font-size:10px;" type="submit" class="btn btn-sm btn-danger btn-circle delete">
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
