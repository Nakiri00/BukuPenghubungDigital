@include('backend.header')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @yield('breadcrumb')
    </div>
    @yield('content')
</div>

@include('backend.footer')
