<!-- resources/views/layouts/guest.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <!-- Head común -->
</head>
<body class="bg-light">
    <main class="container mt-5">
        @yield('content')
    </main>
</body>
</html>

<!-- resources/views/layouts/dashboard.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <!-- Head común + estilos admin -->
</head>
<body>
    @include('partials.nav')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>