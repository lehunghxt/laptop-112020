@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách laptop</h6>
        <a href="{{ url('admin/add-product') }}" class="btn btn-sm btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Thêm laptop mới</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <input class="form-control col-3" id="myInput" type="text" placeholder="Tìm kiếm.."><br>
                        <table style="font-size: 11px;"
                                class="table table-sm table-bordered dataTable"
                                id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info"
                                style="width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Hãng</th>
                                    <th>Giá</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Hiển thị</th>
                                    <th>Cấu hình</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                    $url_segment = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
                                    $stt=1;
                                    $stt = (int)($url_segment-1)*10 + $stt;
                                ?>
                                @foreach ($products as $pro)
                                    <tr >
                                        <td align="center">{{ $stt }}</td>
                                        <td style="max-width: 15vw;">
                                            {{ $pro->pro_name }}
                                        </td>
                                        <td class="text-left">
                                            <span>
                                                {{ $pro->category->cate_name }}
                                            </span>
                                        </td>
                                        <td align="left">{{ price($pro->pro_price) }}đ</td>
                                        <td align="center">
                                            <img style="width: 30px;" src="{{asset('admin/img/products/'.$pro->pro_image)}}" alt="">
                                        </td>
                                        <td class="text-center">{{ $pro->pro_qty }}</td>
                                        <td class="text-center">
                                            <button style="width: 1.5rem;height:1.5rem;font-size:10px;" ref='{{ url('admin/change-status-product/'.$pro->id) }}' class="btnChangeStatus btn btn-sm btn-outline-{{($pro->pro_status=='active')?'success':'danger'}} btn-circle">
                                                <i class="fas fa-{{($pro->pro_status=='active')?'check':'ban'}}"></i>
                                            </button>
                                        </td>
                                        <th class="text-left">
                                            @if (!empty($pro->productConfigDetail))
                                                @foreach ($pro->productConfigDetail as $item)
                                                    <span style="font-size: 8px;font-weight: bold;" class="btn btn-dark btn-sm m-1">{{$item->config_detail_name}}</span>
                                                @endforeach
                                            @endif
                                        </th>
                                        <td class="text-left">
                                            <a style="width: 1.5rem;height:1.5rem;font-size:10px;" href="{{ url('admin/edit-product/'.$pro->id) }}" class="btn btn-sm btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form style="display: inline-block" method="POST" action="{{ url('admin/delete-product/'.$pro->id) }}">
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
                        {!! $products->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
