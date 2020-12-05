<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Loại Laptop</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach ($categories as $cate)
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{ url('c/'.$cate->cate_slug) }}">{{ $cate->cate_name }}</a></h4>
                    </div>
                </div>
            @endforeach
        </div><!--/category-products-->
    </div>
</div>
