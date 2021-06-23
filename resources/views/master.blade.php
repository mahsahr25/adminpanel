@include('adminlayout.head')
<body class="hold-transition sidebar-mini">
{{--<div class="wrapper">--}}
@include('adminlayout.header')
@yield('content')
@include('adminlayout.footer')
{{--</div>--}}
@include('adminlayout.footerscript')
</body>
</html>
