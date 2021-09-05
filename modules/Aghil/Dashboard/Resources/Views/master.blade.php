<!DOCTYPE html>
<html lang="fa">
@include('Dashboard::layout.head')
<body>
@include('Dashboard::layout.sidebar')
<div class="content">
    @include('Dashboard::layout.header')
    @include('Dashboard::layout.breadcrumb')
    <div class="main-content">
        @yield('content')
    </div>
</div>
</body>
@include('Dashboard::layout.foot')
</html>