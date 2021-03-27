@extends('user.layoutUser.design')
@section('content')
{{-- SLIDER HEADER --}}
{{-- @include('user.layoutUser.slider') --}}
<section>
    <div class="container">
        <div class="row">
            {{-- LEFT SIDE BAR --}}
            @include('user.layoutUser.left_sidebar')

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                <h2 class="title text-center">LAPTOP {{ $cateDetail->cate_name }}</h2>
                    @foreach ($proInCate as $pro)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper" style="border: 0.1px solid rgb(245, 242, 242);border-radius: 20px;box-shadow: 1px 1px 1px 1px rgb(221, 217, 217);">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a style="width: 100%;height: 170px; display: flex;justify-content: center;align-items: center;" href="{{ url('p/'.$pro->pro_slug) }}">
                                            <img style="width: 100%;height: aotu;" src="{{ asset('admin/img/products/'.$pro->pro_image) }}" alt="" />
                                        </a>
                                        <h4>{{ number_format($pro->pro_price,0,',','.') }}đ</h4>
                                        <p style="font-size: 12px !important;">{{$pro->pro_name}}</p>
                                        <button style="font-size: 12px !important;" onclick="addToCart(this);" ref1="{{ $pro->id }}" ref2="{{ $pro->pro_code }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm vào giỏ hàng
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 text-center">
                        {!! $proInCate->render() !!}
                    </div>
                </div><!--features_items-->
                @include('user.layoutUser.tab_content')
                @include('user.layoutUser.recommended_items')
            </div>
        </div>
    </div>
</section>
@endsection
