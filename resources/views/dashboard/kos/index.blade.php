@extends('dashboard.main')

@section('content')
    <section class="px-8 w-full">
        <div class="flex justify-between items-center">
            <h1 class="text-4xl uppercase text-left py-8">kos</h1>
            <a class="btn text-white px-4" href="{{ route('dashboard.kos.add') }}">Tambah Kos</a>
        </div>
        <table>
            <tr>
                <th>nama</th>
                <th>jenis</th>
                <th>alamat</th>
                <th>harga per bulan</th>
                <th>aksi</th>
            </tr>
            @if ($kos)
                @foreach ($kos as $k)
                    <tr>
                        <td>{{ $k['nama'] }}</td>
                        <td>{{ $k['jenis'] }}</td>
                        <td>{{ $k['alamat'] }}, {{ $k['keluarahan'] }}, {{ $k['kecamatan'] }}, {{ $k['kota'] }}</td>
                        <td>{{ $k['harga_per_bulan'] }}</td>
                        <td class="flex justify-center gap-2">
                            {{-- <a href="{{ route('dashboard.kos.edit', $k['id']) }}"
                                class=" bg-blue-500 text-white p-3 rounded-lg flex-1 text-center"><i
                                    class="fa-regular
                                fa-pen-to-square"></i></a> --}}
                            <a href="{{ route('kos.delete', $k['id']) }}"
                                class=" bg-red-500 text-white p-3 rounded-lg flex-1 text-center"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </section>

    <section>

    </section>
@endsection
