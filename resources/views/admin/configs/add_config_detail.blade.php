@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4 col-md-5" style="margin:0 auto;">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Thêm cấu hình chi tiết</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/add-config-detail/'.$config->id) }}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="config_detail_name">Tên cấu hình chi tiết</label>
              <input type="text" class="form-control form-control-sm" id="config_detail_name" name="config_detail_name" placeholder="Tên cấu hình chi tiết" required>
              @if ($errors->has('config_detail_name'))
                <span class="text-danger">{{ $errors->first('config_detail_name') }}</span>
             @endif
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Thêm</button>
          </form>
    </div>
</div>
@endsection
