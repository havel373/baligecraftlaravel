<!DOCTYPE html>
<html lang="en">
@include('theme.admin.head')
<body>
    {{$slot}}
@include('theme.admin.js')
@yield('custom_js')
</body>
</html>