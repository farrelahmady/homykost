<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')
    <title>Homykost {{ isset($title) ? "| $title" : '' }}</title>
</head>

<body>
    @includeUnless(Request::is('login') || Request::is('admin*'), 'components.navbar')
    <div id="container" class="{{ !Request::is('login') ? 'pt-10' : '' }}">
        @yield('content')
    </div>
</body>

</html>
