<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.includes.header')
</head>
<body class="sb-nav-fixed">
{{--navbar--}}
@include('backend.includes.nav')
{{--end navbar--}}
<div id="layoutSidenav">
    @include('backend.includes.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                @include('backend.includes.breadcrumb')

               @yield('content')

            </div>
        </main>
        @include('backend.includes.footer')
    </div>
</div>
@include('backend.includes.script')
</body>
</html>
