<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thông tin game</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include("organizer.layouts._paritals._style")
    @toastr_css
    @yield('header_custom')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include("organizer.layouts._paritals._nav")

    @include("organizer.layouts._paritals._sldebar")
    <div class="content-wrapper  px-4 py-2">
        <div class="container-fluid">
        @yield('main_content')
        </div>
    </div>
    <!-- /.content-wrapper -->



</div>
<!-- ./wrapper -->
@include("organizer.layouts._paritals._footer")
@include("organizer.layouts._paritals._script")
@yield('footer_custom')
@jquery
@toastr_js
@toastr_render
</body>

</html>
