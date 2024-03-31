<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to posty</title>
    @vite( 'resources/css/app.css','resources/js/app.js',)
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center justify-center">
            <li><a href="" class="p-3">Home</a></li>
            <li><a href="" class="p-3">Dashboard</a></li>
            <li><a href="" class="p-3">Post</a></li>
        </ul>

        <ul class="flex items-center justify-center">
            <li><a href="" class="p-3">Piyal Hossein</a></li>
            <li><a href="" class="p-3">Log out</a></li>
            <li><a href="" class="p-3">Log in</a></li>
            <li><a href="" class="p-3">Register</a></li>
        </ul>
    </nav>
    {{ $slot }}
</body>
</html>