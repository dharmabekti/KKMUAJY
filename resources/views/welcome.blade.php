<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KKM - UAJY </title>
        <!------------------------------------------ ICON-------------->
        <link rel="icon" href="{{ asset('template/image/logo.png') }}" type="image" sizes="16x16">

        <!-- Fonts -->
        <link rel="icon" href="{{ asset('template/image/logo.png') }}" type="image" sizes="16x16">

        <!-- Bootstrap -->
        <link href="{{ asset('template/gentella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('template/gentella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ asset('template/gentella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
        <!-- iCheck -->
        <link href="{{ asset('template/gentella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="{{ asset('template/gentella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
        <!-- JQVMap -->
        <link href="{{ asset('template/gentella/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="{{ asset('template/gentella/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{ asset('template/gentella/build/css/custom.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('template/sweetalert/dist/sweetalert.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="  ">
            <div class="content"><br><br>
                <div class="title m-b-md">KETENTUAN PKM</div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                  <textarea type="text" readonly name="ketentuan" class="form-control has-feedback-left" id="inputSuccess2" rows="17" placeholder="Ketentuan PKM">{{ $ketentuan_temp }}</textarea>
                  <span class="fa fa-file form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="links">
                    <a href="{{ route('register.index') }}">Daftar</a>
                    <a href="{{ route('login.index') }}">Login</a>
                    <a href="{{ route('login.download') }}">{{ $pedoman_temp }}</a>
                </div>
                <br><br>
            </div>
        </div>
        <script src="{{ asset('template/sweetalert/sweetalert.js') }}"></script>
        @include('sweet::alert')
    </body>
</html>
