<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body class="fix-header card-no-border">

@include('partials.preloader')

<div id="main-wrapper">

    @include('partials.header')

    @include('partials.sidebar')

    <div class="page-wrapper">

        <div class="container-fluid">

            @include('partials.breadcrumb')

            <div class="row">

                <div class="col-12">

                    @yield('banner')

                    @yield('content')

                </div>

            </div>

        </div>

        @include('partials.footer')

    </div>

</div>

@include('partials.javascript')
</body>

</html>