<!DOCTYPE html>
<html lang="en">
@include('theme.userDashboard.head')
<body>
    @include('theme.userDashboard.header')
    {{$slot}}
@include('theme.userDashboard.js')
@include('theme.userDashboard.footer')
@yield('custom_js')
</body>
</html>