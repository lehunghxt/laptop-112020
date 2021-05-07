<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laptop Store">
    <meta name="author" content="Hung Le">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
    <!-- Custom fonts for this template-->
    <link href="{{ url('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ url('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('admin.layoutAdmin.sidebar')
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
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
                            position: 'center',
                            icon: 'success',
                            title: '{{ Session::get('flash_message_success') }}',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>
                @endif
                @include('admin.layoutAdmin.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Hung 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ url('admin/logout') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="{{ url('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('admin/js/sb-admin-2.min.js') }}"></script>

    <script src="{{ url('editor/ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace('pro_des'); </script>

    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            });
        });
        $('.delete').on('click', function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "Bạn có chắc chắn muốn xóa không!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent().submit();
                }
            })
        });
        $('.btnChangeStatus').on('click', function(e){
            var url = $(this).attr('ref');
            var thiss = $(this);
            var child = $(this).children();
            var token    = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: token,
            },
            success: function (res) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Đã thay đổi trạng thái !',
                    showConfirmButton: false,
                    timer: 1500
                });
                if(res=="active"){
                    child.removeClass('fas fa-ban');
                    child.addClass('fas fa-check');
                    thiss.removeClass('btn-outline-danger');
                    thiss.addClass('btn-outline-success');
                }else if(res == "disable"){
                    child.removeClass('fas fa-check');
                    child.addClass('fas fa-ban');
                    thiss.removeClass('btn-outline-success');
                    thiss.addClass('btn-outline-danger');
               }
            }
            });
        });
        $('a').on('click', function(){
            console.log('admin@123');
        });
    </script>
</body>
</html>
