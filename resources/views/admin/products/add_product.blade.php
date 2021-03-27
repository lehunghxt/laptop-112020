@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/add-product') }}" enctype="multipart/form-data">
            <button type="submit" class="btn btn-sm btn-primary">Thêm Laptop</button>
            <hr>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label for="cate_id">Hãng Laptop</label>
                        <select name="cate_id" class="form-control form-control-sm" id="cate_id" required>
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
                        <label for="pro_name">Tên sản phẩm</label>
                        <input type="text" class="form-control form-control-sm" id="pro_name" name="pro_name" placeholder="Tên sản phẩm" required/>
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
                            <select name="config_detail[{{ $config->id }}]" class="form-control form-control-sm" id="{{ $config->config_name }}">
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
                        <label for="pro_price">Giá tiền</label>
                        <input type="text" class="form-control form-control-sm" id="pro_price" name="pro_price" placeholder="Giá tiền" required/>
                        @if ($errors->has('pro_price'))
                            <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pro_qty">Số lượng</label>
                        <input type="number" class="form-control form-control-sm" id="pro_qty" name="pro_qty" placeholder="Số lượng" required/>
                        @if ($errors->has('pro_qty'))
                        <span class="text-danger">{{ $errors->first('pro_qty') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="pro_des">Mô tả</label>
                <textarea class="form-control form-control-sm" id="pro_des" name="pro_des"></textarea>
                @if ($errors->has('pro_des'))
                    <span class="text-danger">{{ $errors->first('pro_des') }}</span>
                @endif
            </div>
            <hr>
            <div class="form-group">
                <label for="pro_image">Hình ảnh</label>
                <input type="file" class="form-control form-control-sm" id="pro_image" name="pro_image"/>
                @if ($errors->has('pro_image'))
                    <span class="text-danger">{{ $errors->first('pro_image') }}</span>
                @endif
            </div>
            <hr>
            <div class="form-check">
                <input type="checkbox" value="951236" class="form-check-input" id="pro_status" name="pro_status">
                <label class="form-check-label" for="pro_status">Active Laptop</label>
            </div>
            <hr>
        </form>
    </div>
</div>
@endsection


