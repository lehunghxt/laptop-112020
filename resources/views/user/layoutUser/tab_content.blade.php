<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categories as $key => $cate)
                <li class="{{ ($key==0)?'active':'' }}"><a style="font-size: 9px !important;" href="#{{$cate->cate_name}}" data-toggle="tab">{{ $cate->cate_name }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="tab-content">
        @foreach ($categories as $key => $cate)
            <div class="tab-pane fade {{ ($key==0)?'active':'' }} in" id="{{ $cate->cate_name }}" >
                @foreach ($cate->indexProducts as $pro)
                    <div class="col-sm-3  col-xs-6">
                        <div class="product-image-wrapper" style="border: 0.1px solid rgb(245, 242, 242);border-radius: 20px;box-shadow: 1px 1px 1px 1px rgb(221, 217, 217);">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a style="width: 100%;height: 170px; display: flex;justify-content: center;align-items: center;" href="{{ url('p/'.$pro->pro_slug) }}">
                                        <img style="width: 100%;height:auto;" src="{{ asset('admin/img/products/'.$pro->pro_image) }}" alt="{{ $pro->pro_name }}" />
                                    </a>
                                    <h4>{{ price($pro->pro_price) }} Đ</h4>
                                    <p style="font-size: 12px !important;">{{ $pro->pro_name }}</p>
                                    <button style="font-size: 12px !important;" onclick="addToCart(this);" ref1="{{ $pro->id }}" ref2="{{ $pro->pro_code }}" class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm vào giỏ hàng
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div><!--/category-tab-->
