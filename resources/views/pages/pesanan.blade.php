@extends('main')

@section('content')
    <section class="min-h-screen flex flex-col justify-center container">

        <h1 class="text-4xl capitalize text-center py-8">Status Pembayaran</h1>

        <table>
            <tr>
                <th>kos / kontrakan</th>
                <th>jenis</th>
                <th>Pemilik</th>
                <th>harga per bulan</th>
                <th>status</th>
                <th>upload bukti pembayaran</th>
            </tr>
            @if ($pesanan)
                @foreach ($pesanan as $p)
                    @if (is_array($p['kos']))
                        <tr>
                            <td>
                                <p class="font-medium">{{ $p['kos']['nama'] }}</p>
                                <p class="text-xs">{{ $p['kos']['alamat'] }}, {{ $p['kos']['keluarahan'] }},
                                    {{ $p['kos']['kecamatan'] }},
                                    {{ $p['kos']['kota'] }}</p>
                            </td>
                            <td>{{ $p['kos']['jenis'] }}</td>
                            <td>{{ $p['owner']['nama'] }}</td>
                            <td>{{ $p['kos']['harga_per_bulan'] }}</td>
                            <td>
                                @if ($p['status_pembayaran'])
                                    lunas
                                @elseif ($p['bukti_pembayaran'])
                                    menunggu konfirmasi
                                @else
                                    belum bayar
                                @endif
                            </td>
                            <td>
                                @if ($p['bukti_pembayaran'])
                                    <a href="{{ $p['bukti_pembayaran'] }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ $p['bukti_pembayaran'] }}" alt="" class="w-24">
                                    </a>
                                @else
                                    <form action="{{ route('pesanan.upload', $p['id']) }}" method="post"
                                        enctype="multipart/form-data" class="flex flex-col items-center gap-2">
                                        @csrf
                                        <input required type="file" name="bukti">
                                        <button class="btn w-full" type="submit">upload</button>
                                    </form>
                                @endif
                        </tr>
                    @endif
                @endforeach
            @endif
        </table>
    </section>
@endsection
