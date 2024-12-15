<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body>
    <div class="w-full bg-[#ebe9e0] grid place-items-center h-screen ">
        <div class="bg-white p-5 rounded-lg shadow-xl w-80">

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1 class="text-center text-black font-bold py-5">LOGIN</h1>
                @if (session('error'))
                    <div class="bg-red-500 text-white p-2 rounded-lg mb-3 text-center">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="flex gap-2 bg-[#e6e6e6] p-2 rounded-md">
                    <img src="{{ asset('/gambar/user.png') }}" alt="" class="w-5 h-5">
                    <input type="text" name="username" class=" focus:outline-none focus:border-none bg-[#e6e6e6] "
                        placeholder="Username" required>
                </div>
                <div class="flex gap-2 bg-[#e6e6e6] p-2 rounded-md my-5">
                    <img src="{{ asset('/gambar/padlock.png') }}" alt="" class="w-5 h-5">
                    <input type="password" name="password" class=" focus:outline-none focus:border-none bg-[#e6e6e6] "
                        placeholder="Password" required>
                </div>

                <center>
                    <button class="bg-[#f1c17f] hover:bg-yellow-500 py-2 px-8 rounded-md text-black font-medium"
                        type="submit">Login</button>
                </center>
            </form>
        </div>
    </div>
</body>

</html>
