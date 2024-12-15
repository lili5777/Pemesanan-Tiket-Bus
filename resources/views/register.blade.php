<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>

<body>
    <div class="w-full bg-gradient-to-t from-cyan-500 to-[#1B4242] grid place-items-center h-screen ">
        <div class="bg-white p-5 rounded-sm shadow-lg">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1 class="text-center text-black font-bold py-5">Register</h1>
                <div class="flex gap-2 bg-[#e6e6e6] p-2 rounded-md mb-5">
                    <img src="{{ asset('/gambar/user.png') }}" alt="" class="w-5 h-5">
                    <input type="text" name="name" class=" focus:outline-none focus:border-none bg-[#e6e6e6] "
                        placeholder="Name">
                </div>
                <div class="flex gap-2 bg-[#e6e6e6] p-2 rounded-md">
                    <img src="{{ asset('/gambar/mail.png') }}" alt="" class="w-5 h-5">
                    <input type="text" name="username" class=" focus:outline-none focus:border-none bg-[#e6e6e6] "
                        placeholder="Username">
                </div>
                <div class="flex gap-2 bg-[#e6e6e6] p-2 rounded-md my-5">
                    <img src="{{ asset('/gambar/padlock.png') }}" alt="" class="w-5 h-5">
                    <input type="password" name="password" class=" focus:outline-none focus:border-none bg-[#e6e6e6] "
                        placeholder="Password">
                </div>
                <input type="hidden" name="level" value="admin">
                {{-- <div class="flex gap-2 bg-[#e6e6e6] p-2 rounded-md my-5">
                    <img src="{{ asset('/gambar/padlock.png') }}" alt="" class="w-5 h-5">
                    <input type="password" name="password" class=" focus:outline-none focus:border-none bg-[#e6e6e6] "
                        placeholder="Password">
                    <select name="level" id="level" class="w-full bg-[#e6e6e6] text-[#9ca3af]">
                        <option value="">Pilih Role</option>
                        <option value="admin" class="text-black">admin</option>
                        <option value="user" class="text-black">user</option>
                    </select>
                </div> --}}
                <center>
                    <button class="bg-cyan-600 py-2 px-8 rounded-md text-white" type="submit">Daftar</button>
                </center>
            </form>
        </div>
    </div>
</body>

</html>
