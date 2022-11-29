@extends('main')

@section('content')
    <section class="min-h-screen flex flex-col justify-center container">

        <h1 class="text-4xl capitalize text-center py-8">registrasi member</h1>
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
        <form action="{{ Route::has('auth.register') ? route('auth.register') : '' }}"
            method="{{ Route::has('auth.register') ? 'POST' : '' }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-4  p-4">
                <div class="form-input">
                    <label for="username">username</label>
                    <input required id="username" name="username" type="text" placeholder="masukkan Username">
                </div>
                <div class="form-input">
                    <label for="email">email</label>
                    <input required id="email" name="email" type="text" placeholder="masukkan email">
                </div>
                <div class="form-input">
                    <label for="password">password</label>
                    <input required id="password" name="password" type="password" placeholder="Password">
                </div>
                <div class="form-input">
                    <label for="nama">nama</label>
                    <input required required id="nama" name="nama" type="text" placeholder="masukkan nama">
                </div>
                <div class="form-input">
                    <label for="foto_profil">foto profil</label>
                    <input required id="foto_profil" name="foto_profil" type="file" placeholder="masukkan foto profile">
                </div>
                <div class="form-input">
                    <label for="no_handphone">Nomor Handphone</label>
                    <input required id="no_handphone" name="no_handphone" type="text"
                        placeholder="masukkan Nomor Handphone">
                </div>
                <div class="form-input">
                    <label for="no_rekening">Nomor rekening</label>
                    <input required id="no_rekening" name="no_rekening" type="text"
                        placeholder="masukkan Nomor rekening">
                </div>
                <div class="form-input">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="role">Role</label>
                    <select name="role" id="role">
                        <option value="customer">Customer</option>
                        <option value="owner">Owner</option>
                    </select>
                </div>
                <button type="submit" class="btn text-lg mt-4">register</button>
            </div>
        </form>
    </section>
@endsection
