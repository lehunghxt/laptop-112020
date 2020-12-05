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
                    <h2 class="title text-center">Laptop Mới</h2>
                    @foreach ($products as $pro)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper" style="border: 0.1px solid rgb(245, 242, 242);border-radius: 20px;box-shadow: 1px 1px 1px 1px rgb(221, 217, 217);">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{ url('p/'.$pro->pro_slug) }}">
                                            <img style="width: 255px;height: 150px;object-fit:contain;" src="{{ asset('admin/img/products/'.$pro->pro_image) }}" alt="" />
                                        </a>
                                        <h4>{{ number_format($pro->pro_price,0,',','.') }}đ</h4>
                                        <p>{{$pro->pro_name}}</p>
                                        @if ($pro->pro_status == 'active')
                                            <form method="POST" action="{{ url('addCart') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="pro_id" value="{{ $pro->id }}">
                                                <input type="hidden" name="pro_code" value="{{ $pro->pro_code }}">
                                                <button type="submit" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Thêm vào giỏ hàng
                                                </button>
                                            </form>
                                        @else
                                            <button type="submit" class="btn btn-light disabled  add-to-cart">
                                                Sản phẩm ngừng kinh doanh
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!--features_items-->
                @foreach ($proEachCate as $cate)
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Laptop {{ $cate->cate_name }}</h2>
                        @foreach ($cate->indexProducts as $pro)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper" style="border: 0.1px solid rgb(245, 242, 242);border-radius: 20px;box-shadow: 1px 1px 1px 1px rgb(221, 217, 217);">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{ url('p/'.$pro->pro_slug) }}">
                                                <img style="width: 255px;height: 150px;object-fit:contain;" src="{{ asset('admin/img/products/'.$pro->pro_image) }}" alt="" />
                                            </a>
                                            <h4>{{ number_format($pro->pro_price,0,',','.') }}đ</h4>
                                            <p>{{$pro->pro_name}}</p>
                                            @if ($pro->pro_status == 'active')
                                                <form method="POST" action="{{ url('addCart') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="pro_id" value="{{ $pro->id }}">
                                                    <input type="hidden" name="pro_code" value="{{ $pro->pro_code }}">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!--features_items-->
                    <hr style="background: red">
                @endforeach
                @include('user.layoutUser.tab_content')
                @include('user.layoutUser.recommended_items')
            </div>
        </div>
    </div>
</section>
@endsection
