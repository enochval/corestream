<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">@yield('breadcrumb-title')</h3>
        <ol class="breadcrumb">
            @yield('breadcrumb')
            {{--<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">@yield('breadcrumb')</li>--}}
        </ol>
    </div>

    {{--@if(!auth()->guest())
    <div class="col-md-6 col-4 align-self-center">
        <div class="d-flex m-t-10 justify-content-end">
            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                <div class="m-l-10 align-self-center">
                    <h3 class="m-b-0">&#8358;18090</h3>
                    <h5 class="text-muted m-b-0">Wallet</h5></div>
            </div>
        </div>
    </div>
    @endif--}}
</div>
