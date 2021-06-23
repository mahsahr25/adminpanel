<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> پنل مدیریت | @yield('title')</title>
@include('adminlayout.head')
<body class="hold-transition sidebar-mini">
{{--<div class="wrapper">--}}
@include('adminlayout.header')
{{--@yield('breadcrumb')--}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @yield('pagehead')
                </div>
                <div class="col-sm-6">
{{--                    <ol class="breadcrumb float-sm-left">--}}
                        <div class="col-1 offset-lg-10">
                            <a href="@yield('back')">
                                <button type="button" class="btn btn-info btn-sm"><i class="fa fa-arrow-left " aria-hidden="true" ></i></button>
                            </a>
                        </div>
                        {{--                            <li class="breadcrumb-item"><a href="#">دسته بندی ها></a></li>--}}
                        {{--                            <li class="breadcrumb-item active">جداول کاربران</li>--}}
{{--                    </ol>--}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@yield('content')
</div>
<!-- /.content-wrapper -->
@include('adminlayout.footer')
{{--</div>--}}
@include('adminlayout.footerscript')
</body>
</html>
