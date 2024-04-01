<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to posty</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200 mb-10">
    @if(@session()->has('message'))
    <div
    class="fixed max-sm:w-[90%] top-[5px] left-1/2 -translate-x-1/2 bg-white text-slate-700 px-2 max-sm:px-1 py-3 border border-sky-500"
    id="message"
    >
        <p>
            {{session('message')}}
        </p>
    </div>
    @endif
    <nav class="p-6 max-sm:p-3 bg-white flex justify-between">
        <ul class="flex items-center justify-center">
            <li><a href="{{ route('index') }}" class="p-3 max-sm:p-2 hover:underline">Home</a></li>
            <li><a href="{{ route('dashboard') }}" class="p-3 max-sm:p-2 hover:underline">Dashboard</a></li>
        </ul>

        <ul class="flex items-center justify-center">
            @auth
            <li><a href="" class="p-3 max-sm:p-2">{{'@'}}{{auth()->user()->username}}</a></li>
            <li><form action="{{ route('logout') }}" method="POST">@csrf <button type="submit" class="hover:underline">Log out</button></form></li>
            @else
            <li><a href="{{ route('login') }}" class="p-3 max-sm:p-2 hover:underline">Log in</a></li>
            <li><a href="{{ route('register') }}" class="p-3 max-sm:p-2 hover:underline">Register</a></li>
            @endauth
        </ul>
    </nav>
    
    {{ $slot }}
</body>
<script src="{{ @asset('js/main.js') }}"></script>
</html>