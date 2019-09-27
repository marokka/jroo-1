<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Aushev">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jroo - Админ панель</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('admin_assets/img/favicon.ico')}}" type="image/x-icon">


    <!-- Bootstrap core CSS-->
    <link href="{{ asset('admin_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Main styles -->
    <link href="{{ asset('admin_assets/css/admin.css')}}" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="{{ asset('admin_assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css">
    <!-- Plugin styles -->
    <link href="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('admin_assets/vendor/dropzone.css')}}">
    <!-- Your custom styles -->
    <link href="{{ asset('admin_assets/css/custom.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('admin_assets/css/fileinput.min.css')}}">

</head>

<body class="fixed-nav sticky-footer" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('admin.index')}}">JROO - Админ панель</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    @widget('admin.menu.leftMenuWidget')
</nav>
<!-- /Navigation-->
@yield('content')
<!-- /.container-wrapper-->
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © JROO {{date("Y")}}</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Page level plugin JavaScript-->
<script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('admin_assets/vendor/jquery.selectbox-0.2.js')}}"></script>
<script src="{{ asset('admin_assets/vendor/retina-replace.min.js')}}"></script>
<script src="{{ asset('admin_assets/vendor/jquery.magnific-popup.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('admin_assets/js/admin.js')}}"></script>

<script src="{{asset('admin_assets/js/bootbox.all.min.js')}}"></script>

<script src="{{ asset('admin_assets/js/custom.js')}}"></script>

<!-- Custom scripts for this page-->

<script src="{{asset('admin_assets/vendor/dropzone.js')}}"></script>
<script src="{{asset('admin_assets/js/fileinput.min.js')}}"></script>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
