@extends('main')

@section('content')
    <section id="login" class="container h-screen w-full flex flex-col justify-center bg-slate-700">

        <div class="rounded-xl w-1/2 mx-auto bg-white">
            <h1 class="text-2xl uppercase text-center py-3  font-bold border-b-2 bg-slate-100 rounded-t-xl">Login Form</h1>
            <form action="{{ Route::has('auth.login') ? route('auth.login') : '' }}"
                method="{{ Route::has('auth.login') ? 'POST' : '' }}">
                @csrf
                @if (Session::has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Something went wrong!</strong>
                        <span class="block sm:inline">{{ Session::get('error') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                @endif
                <div class="flex flex-col gap-4  p-4">
                    <div class="form-input">
                        <label for="username">username</label>
                        <input required id="username" name="username" type="text" placeholder="Enter Username">
                    </div>
                    <div class="form-input">
                        <label for="password">password</label>
                        <input required id="password" name="password" type="password" placeholder="Password">
                    </div>

                    <button type="submit" class="btn text-lg mt-4">Login</button>
                    @if (!Request::is('admin*'))
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-center block text-blue-500 font-semibold">Belum
                                punya akun? Daftar disini</a>
                        @endif
                        @if (Route::has('beranda'))
                            <a href="{{ route('beranda') }}" class="text-center block text-blue-500 font-semibold">Kembali
                                ke
                                Beranda</a>
                        @endif
                    @endif
                </div>
            </form>
        </div>
    </section>
@endsection
