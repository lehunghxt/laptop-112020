<?php $url =  url()->current(); ?>

<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Loại Laptop</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach ($categories as $cate)
                <a href="{{ url('c/'.$cate->cate_slug) }}">
                    <div class="panel panel-default" >
                        <div class="panel-heading {{(preg_match("/".$cate->cate_slug."/i",$url))? 'active-menu':''}}" >
                            <h4 class="panel-title">{{ $cate->cate_name }}</h4>
                        </div>
                    </div>
                </a>
            @endforeach
        </div><!--/category-products-->
    </div>
</div>

