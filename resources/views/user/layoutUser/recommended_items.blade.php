<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản Phẩm Liên Quan</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($productRecomment as $key => $products)
                <div class="item {{ ($key==0)?'active':'' }}">
                    @foreach ($products as $pro)
                        <div class="col-sm-4 col-xs-4">
                            <div class="product-image-wrapper" style="border: 0.1px solid rgb(245, 242, 242);border-radius: 20px;box-shadow: 1px 1px 1px 1px rgb(221, 217, 217);">
                                <div class="single-products">
                                    <div class="productinfo text-center" >
                                        <a style="width: 100%;height: 170px; display: flex;justify-content: center;align-items: center;" href="{{ url('p/'.$pro['pro_slug']) }}">
                                            <img style="width: 100%;height: auto:;" src="{{ asset('admin/img/products/'.$pro['pro_image']) }}" alt="" />
                                        </a>
                                        <h4>{{ price($pro['pro_price']) }} Đ</h4>
                                        <p style="font-size: 10px !important;">{{ $pro['pro_name'] }}</p>
                                        <button style="font-size: 10px !important;" onclick="addToCart(this);" ref1="{{ $pro['id'] }}" ref2="{{ $pro['pro_code'] }}" class=" btn btn-default add-to-cart">
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
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
    </div>
</div><!--/recommended_items-->
