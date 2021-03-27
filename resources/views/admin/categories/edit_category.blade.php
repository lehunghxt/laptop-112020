@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4 col-4" style="margin: 0 auto;">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa tên hãng laptop</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/edit-category/'.$category->id) }}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="cate_name">Tên hãng laptop</label>
              <input type="text" class="form-control" id="cate_name" value="{{ $category->cate_name }}" name="cate_name" placeholder="Cate Name" required>
              @if ($errors->has('cate_name'))
                <span class="text-danger">{{ $errors->first('cate_name') }}</span>
             @endif
            </div>
            <div class="form-check">
                <input type="checkbox" value="951236" {{($category->cate_status=='active')?'checked':''}} class="form-check-input" id="cate_status" name="cate_status">
                <label class="form-check-label" for="cate_status">HIển thị hãng laptop</label>
            </div><br>
            <button type="submit" class="btn btn-primary">Cập nhập</button>
          </form>
    </div>
</div>

@endsection
