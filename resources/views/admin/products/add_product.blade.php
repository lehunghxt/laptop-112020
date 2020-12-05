@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Thêm Sản Phẩm</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/add-product') }}" enctype="multipart/form-data">
            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
            <hr>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label for="cate_id">Hãng Laptop</label>
                        <select name="cate_id" class="form-control" id="cate_id" required>
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->cate_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cate_id'))
                            <span class="text-danger">{{ $errors->first('cate_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pro_name">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Product Name" required/>
                        @if ($errors->has('pro_name'))
                            <span class="text-danger">{{ $errors->first('pro_name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            {{-- Config Detail --}}
            <div class="row">
                @foreach ($configs as $config)
                    <div class="col">
                        <div class="form-group">
                            <label for="{{ $config->config_name }}">{{ $config->config_name }}</label>
                            <select name="config_detail[{{ $config->id }}]" class="form-control" id="{{ $config->config_name }}">
                                @foreach ($config->configDetail as $conf_detail)
                                    <option value="{{ $conf_detail->id }}">{{ $conf_detail->config_detail_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('config_detail.'.$config->id))
                                <span class="text-danger">{{ $errors->first('config_detail.'.$config->id) }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- END --}}
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="pro_price">Giá Tiền</label>
                        <input type="text" class="form-control" id="pro_price" name="pro_price" placeholder="Giá Tiền" required/>
                        @if ($errors->has('pro_price'))
                            <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pro_qty">Số Lượng</label>
                        <input type="number" class="form-control" id="pro_qty" name="pro_qty" placeholder="Số Lượng" required/>
                        @if ($errors->has('pro_qty'))
                        <span class="text-danger">{{ $errors->first('pro_qty') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="pro_des">Mô Tả</label>
                <textarea class="form-control" id="pro_des" name="pro_des"></textarea>
                @if ($errors->has('pro_des'))
                    <span class="text-danger">{{ $errors->first('pro_des') }}</span>
                @endif
            </div>
            <hr>
            <div class="form-group">
                <label for="pro_image">Hình Ảnh</label>
                <input type="file" class="form-control" id="pro_image" name="pro_image" placeholder="Tên Cấu Hình" />
                @if ($errors->has('pro_image'))
                    <span class="text-danger">{{ $errors->first('pro_image') }}</span>
                @endif
            </div>
            <hr>
            <div class="form-check">
                <input type="checkbox" value="951236" class="form-check-input" id="pro_status" name="pro_status">
                <label class="form-check-label" for="pro_status">Active Product</label>
            </div>
            <hr>

        </form>
    </div>
</div>


@endsection
