<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/3d342bf6aa.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <title>Homykost {{ isset($title) ? "| $title" : '' }}</title>
</head>

<body class="h-screen flex flex-col">
    @includeIf('dashboard.header')
    <div id="container" class="flex flex-1 ">
        @includeIf('dashboard.sidebar')
        @yield('content')
    </div>
</body>

</html>
