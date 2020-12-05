@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Sản Phẩm</h6>
        <a href="{{ url('admin/add-product') }}" class="btn btn-sm btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Thêm Sản Phẩm</span>
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
                        <input class="form-control col-3" id="myInput" type="text" placeholder="Search.."><br>
                        <table style="font-size: 14px;"
                                class="table table-sm table-bordered dataTable"
                                id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info"
                                style="width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1">STT</th>
                                    <th rowspan="1" colspan="1">Tên</th>
                                    <th rowspan="1" colspan="1">Hãng</th>
                                    <th rowspan="1" colspan="1">Giá</th>
                                    <th rowspan="1" colspan="1">Hình ảnh</th>
                                    <th rowspan="1" colspan="1">Số lượng</th>
                                    <th rowspan="1" colspan="1">Cấu hình</th>
                                    <th rowspan="1" colspan="1">action</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                    $url_segment = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
                                    $stt=1;
                                    $stt = (int)($url_segment-1)*10 + $stt;
                                ?>
                                @foreach ($products as $pro)
                                    <tr role="row" class="odd">
                                        <td align="center">{{ $stt }}</td>
                                        <td style="max-width: 15vw;">
                                            {{ $pro->pro_name }}
                                        </td>
                                        <td class="text-center">
                                            <span class="w-100 btn btn-sm btn-outline-dark">
                                                {{ $pro->category->cate_name }}
                                            </span>
                                        </td>
                                        <td align="center">{{ price($pro->pro_price) }}đ</td>
                                        <td align="center">
                                            <img style="width: 55px;" src="{{asset('admin/img/products/'.$pro->pro_image)}}" alt="">
                                        </td>
                                        <td class="text-center">{{ $pro->pro_qty }}</td>
                                        <th class="text-center">
                                            @if (!empty($pro->productConfigDetail))
                                                @foreach ($pro->productConfigDetail as $item)
                                                    <span style="font-size: 9px;font-weight: bold;" class="btn btn-dark btn-sm m-1">{{$item->config_detail_name}}</span>
                                                @endforeach
                                            @endif
                                        </th>
                                        <td class="text-center">
                                            <a href="{{ url('admin/edit-product/'.$pro->id) }}" class="btn btn-sm btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form style="display: inline-block" method="POST" action="{{ url('admin/delete-product/'.$pro->id) }}">
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
                        {!! $products->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
