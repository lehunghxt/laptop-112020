@extends('admin.layoutAdmin.design')
@section('content')
<div class="card shadow mb-4 col-4" style="margin: 0 auto;">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/add-category') }}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="cate_name">Category Name</label>
              <input type="text" class="form-control" id="cate_name" name="cate_name" placeholder="Cate Name" required>
              @if ($errors->has('cate_name'))
                <span class="text-danger">{{ $errors->first('cate_name') }}</span>
             @endif
            </div>
            <div class="form-check">
                <input type="checkbox" value="951236" class="form-check-input" id="cate_status" name="cate_status">
                <label class="form-check-label" for="cate_status">Active Category</label>
            </div><br>
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
    </div>
</div>

@endsection
