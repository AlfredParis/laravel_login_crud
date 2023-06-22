<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body class="justify-center h-screen bg-white font-family-karla">

    @section('main')
        @parent
    @show

</body>

</html>
