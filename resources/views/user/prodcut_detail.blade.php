@extends('user.layoutUser.design')
@section('content')
<section>
    <div class="container">
        <div class="row">
            {{-- LEFT SIDE BAR --}}
            @include('user.layoutUser.left_sidebar')
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img style="width:327px;height:378px;object-fit:scale-down;" src="{{ asset('admin/img/products/'.$product->pro_image) }}" alt="" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="{{ asset('user/images/product-details/new.jpg') }}" class="newarrival" alt="" />
                            <h2>{{ $product->pro_name }}</h2>
                            <p>Product Code: {{ $product->pro_code }}</p>
                            <span style="display: flex;justify-content:space-between;align-items: center">
                                <span style="font-size: 20px">{{ number_format($product->pro_price,0,',','.') }}đ</span>
                                @if ($product->pro_status == 'active')
                                    <form method="POST" action="{{ url('addCart') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="pro_id" value="{{ $product->id }}">
                                        <input type="hidden" name="pro_code" value="{{ $product->pro_code }}">
                                        <button type="submit" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm vào giỏ hàng
                                        </button>
                                    </form>
                                @else
                                    <button type="submit" class="btn btn-light disabled  add-to-cart">
                                        {{-- <i class="fa fa-shopping-cart"></i> --}}
                                        Sản phẩm ngừng kinh doanh
                                    </button>
                                @endif
                            </span>
                            <p>Thông tin cấu hình:</p>
                            @foreach ($product_config as $config)
                                <span class="btn btn-sm btn-danger">{{ $config->config_name }}: {{ $config->config_detail_name }}</span>
                            @endforeach
                        </div><!--/product-information-->
                    </div>
                    <hr><br>
                    <div class="col-md-12 product-information">
                        {!! $product->pro_des !!}
                    </div>
                </div><!--/product-details-->
                @include('user.layoutUser.tab_content')
                @include('user.layoutUser.recommended_items')
            </div>
        </div>
    </div>
</section>
@endsection
