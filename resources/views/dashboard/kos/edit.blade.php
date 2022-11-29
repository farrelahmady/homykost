@extends('dashboard.main')

@section('content')
    <section class="px-8 w-full  overflow-auto">
        <h1 class="text-4xl capitalize text-center py-8">Tambah Kos</h1>
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
        <form action="{{ Route::has('kos.store') ? route('kos.store') : '' }}"
            method="{{ Route::has('kos.store') ? 'POST' : '' }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-4  p-4">
                <div class="form-input">
                    <label for="foto">foto</label>
                    <input id="foto" name="foto[]" type="file" placeholder="masukkan foto" multiple>
                </div>
                <div class="form-input">
                    <label for="nama">nama</label>
                    <input id="nama" name="nama" type="text" placeholder="masukkan nama"
                        value="{{ $kos['nama'] }}">
                </div>
                <div class="form-input">
                    <label for="jenis">jenis</label>
                    <select name="jenis" id="jenis">
                        <option value="Kos" {{ strtolower($kos['jenis']) == 'kos' ? 'selected' : '' }}>Kos</option>
                        <option value="Kontrakan" {{ strtolower($kos['jenis']) == 'kontrakan' ? 'selected' : '' }}>Kontrakan
                        </option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="alamat">alamat</label>
                    <input id="alamat" name="alamat" type="text" placeholder="masukkan alamat"
                        value="{{ $kos['alamat'] }}">
                </div>
                <div class="form-input">
                    <label for="kelurahan">kelurahan</label>
                    <input id="kelurahan" name="kelurahan" type="text" placeholder="masukkan kelurahan"
                        value="{{ $kos['keluarahan'] }}">
                </div>
                <div class="form-input">
                    <label for="kecamatan">kecamatan</label>
                    <input id="kecamatan" name="kecamatan" type="text" placeholder="masukkan kecamatan"
                        value="{{ $kos['kecamatan'] }}">
                </div>
                <div class="form-input">
                    <label for="kota">kota</label>
                    <input id="kota" name="kota" type="text" placeholder="masukkan kota"
                        value="{{ $kos['kota'] }}">
                </div>
                <div class="form-input">
                    <label for="harga_per_bulan">harga per bulan</label>
                    <input id="harga_per_bulan" name="harga_per_bulan" type="number" min="50000" step="10000"
                        placeholder="masukkan harga per bulan" value="{{ $kos['harga_per_bulan'] }}">
                </div>
                <div class="form-input">
                    <label>fasilitas kos</label>
                    @if ($fasilitas)
                        @foreach ($fasilitas as $fas)
                            <div>
                                <input type="checkbox" name="fasilitas[]" id="{{ $fas['fasilitas'] }}"
                                    value="{{ $fas['id'] }}" class="w-fit"
                                    {{ collect($kos['faslitaskos'])->firstWhere('id', $fas['id']) ? 'checked' : '' }}>
                                <label for="{{ $fas['fasilitas'] }}">{{ $fas['fasilitas'] }}</label>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="submit" class="btn text-lg mt-4">Perbarui Data</button>
            </div>
        </form>
    </section>
@endsection
