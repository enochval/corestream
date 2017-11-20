<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>

@include('partials.preloader')

<section id="wrapper">

    @yield('content')

</section>

@include('partials.javascript')
</body>

</html>