<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar-size="lg" data-sidebar-image="none"
    data-preloader="enable">

<head>
    @include('backend.components.head')
</head>

<body>
    {{-- preloader --}}
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    {{-- Begin page --}}
    <div id="layout-wrapper">

        {{-- Navbar Menu --}}
        @include('backend.components.navbar')

        {{-- Sidebar Menu --}}
        @include('backend.components.side-nav')

        {{-- Vertical Overlay --}}
        <div class="vertical-overlay"></div>

        {{-- ==========================================  --}}
        {{-- Start right Content here --}}
        {{-- ==========================================  --}}
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                @yield('content')
                            </div>
                            {{-- end .h-100 --}}
                        </div>
                        {{-- end col --}}
                    </div>
                </div>
                {{-- container-fluid --}}
            </div>
            {{-- End Page-content --}}

            {{-- Footer --}}
            @include('backend.components.footer')
        </div>
        {{-- End main content --}}
    </div>
    {{-- END layout-wrapper --}}

    {{-- Scripts --}}
    @include('backend.scripts.scripts')

    @include('backend.scripts.custom-scripts')
</body>

</html>
