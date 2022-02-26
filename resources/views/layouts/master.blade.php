<!DOCTYPE html>
<html lang="en">
@include('layouts.partial._head')
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    @include('layouts.partial._sidebar')
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mb-3">
            <div class="container-fluid">
                <button class="btn btn-outline-dark" id="sidebarToggle">Toggle Menu</button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>
<!-- Bootstrap core JS-->
@include('layouts.partial._script')
</body>
</html>
