<!doctype html>
<html lang="en">
<head>

    @include('partials._head')

</head>
<body>
@include('partials._preload')
@include('partials._nav')

@yield('content')


@include('partials._footer')

@include('partials._javascript')

@yield('scripts')

</body>
</html>