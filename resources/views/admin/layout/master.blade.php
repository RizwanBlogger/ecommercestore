<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminLTE 3 | Dashboard</title>
    @include('admin.include.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.include.topbar')
        @include('admin.include.sidebar')
        @yield('content')
        @include('admin.include.footer')
        @include('admin.include.script')
    </div>
</body>

</html>
