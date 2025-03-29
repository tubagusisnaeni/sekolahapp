<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel with DaisyUI</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-200">
    <div class="navbar bg-primary text-primary-content">
        <a class="btn btn-ghost normal-case text-xl">My App</a>
    </div>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>

    <footer class="footer p-4 bg-neutral text-neutral-content text-center">
        <p>© 2025 My App. All rights reserved.</p>
    </footer>
</body>
</html>
