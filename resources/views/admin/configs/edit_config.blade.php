@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4 col-md-5" style="margin:0 auto;">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Sửa cấu hình</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/edit-config/'.$config->id) }}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="config_name">Tên cấu hình</label>
            <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" id="config_name" value="{{ $config->config_name }}" name="config_name" placeholder="Tên Cấu Hình" required>
              @if ($errors->has('config_name'))
                <span class="text-danger">{{ $errors->first('config_name') }}</span>
             @endif
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Cập nhập</button>
          </form>
    </div>
</div>

@endsection
