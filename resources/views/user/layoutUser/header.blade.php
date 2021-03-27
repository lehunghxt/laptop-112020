<header id="header"><!--header-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img style="width: 139px;height: 30px;object-fit: scale-down;" src="{{ asset('user/images/home/logo.jpg') }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if (Auth::guard('customer')->check())
                                <li>
                                    <a href="{{ url('user-info') }}"><i class="fa fa-user"></i> {{ Auth::guard('customer')->user()->name }}</a>
                                </li>
                            @else
                                <li><a href="{{ url('login') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                <li><a href="{{ url('register') }}"><i class="fa fa-lock"></i> Đăng ký</a></li>
                            @endif
                            <li><a href="{{ url('checkout') }}"><i class="fa fa-crosshairs"></i> Thanh Toán</a></li>
                            <li>
                                <?php
                                    $sum=0;
                                    if(Session::has('cart')){
                                        foreach (Session::get('cart') as $key => $value) {
                                           $sum += $value['pro_qty'];
                                        }
                                    }
                                ?>
                                <a href="{{ url('getCart') }}">
                                    <i class="fa fa-shopping-cart"></i>
                                     Giỏ Hàng <sup>(</sup><sup id="c_qty">{{$sum}}</sup><sup>)</sup>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Laptop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @php
                                        $categories = App\Category::get();
                                    @endphp
                                    @foreach ($categories as $cate)
                                        <li><a href="{{ url('c/'.$cate->cate_slug) }}">{{$cate->cate_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Liên Hệ</a></li>
                            <li><a href="#">Bảo Hành</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="GET" action="{{ url('search') }}">
                            <input type="text" name="s" id="search" placeholder="Tìm Kiếm" required autocomplete="off"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
    @if(Session::has('flash_message_error'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{ Session::get('flash_message_error') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if(Session::has('flash_message_success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ Session::get('flash_message_success') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
</header><!--/header-->
