<!DOCTYPE html>
<html lang="en">

@include('partials.head-light')

<body class="fix-header card-no-border logo-center">

@include('partials.preloader')

<div id="main-wrapper">

    @include('partials.header')

    @include('partials.sidebar')

    <div class="page-wrapper">

        @yield('banner')

        @yield('upcoming')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @yield('breadcrumb-main')

                    @yield('content')

                </div>
            </div>
        </div>

        @include('partials.footer')

    </div>

</div>

@include('partials.javascript-light')

</body>

</html>
