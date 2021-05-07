<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web Laptop Online">
    <meta name="author" content="Hung Le">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laptop Hùng Lê | {{ isset($meta_title)? $meta_title:'Trang chủ' }}</title>
    <link href="{{ url('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('user/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ url('user/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ url('user/css/animate.css') }}" rel="stylesheet">
	<link href="{{ url('user/css/main.css') }}" rel="stylesheet">
	<link href="{{ url('user/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    {{-- <link rel="shortcut icon" href="{{ url('user/images/ico/favicon.ico') }}"> --}}
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('user/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('user/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('user/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ url('user/images/ico/apple-touch-icon-57-precomposed.png') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head><!--/head-->

<body>

    @include('user.layoutUser.header')
	@yield('content')
    {{-- @include('user.layoutUser.footer') --}}

    <script src="{{ url('user/js/jquery.js') }}"></script>
	<script src="{{ url('user/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('user/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ url('user/js/price-range.js') }}"></script>
    <script src="{{ url('user/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ url('user/js/main.js') }}"></script>
    <script>
        function addToCart(e){
            var token    = $('meta[name="csrf-token"]').attr('content');
            var pro_id   = $(e).attr('ref1');
            var pro_code = $(e).attr('ref2');

            $.ajax({
                url: '{{ url('addCart') }}',
                type: 'POST',
                data: {
                    _token: token,
                    pro_id: pro_id,
                    pro_code: pro_code,
            },
            success: function (res) {
                if(res=="done"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Đã thêm sản phẩm vào giỏ hàng !',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#c_qty').text(parseInt($('#c_qty').text())+1);
                }
            }
            });
        }
    </script>
</body>
</html>
