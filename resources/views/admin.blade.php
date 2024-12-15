<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <h1 class="text-3xl font-bold underline">
        Hello admin
    </h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="text-black font-bold pl-10 pt-10 ">Logout</button>
    </form>
</body>

</html>
