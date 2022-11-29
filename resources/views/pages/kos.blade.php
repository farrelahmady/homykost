@extends('main')

@section('content')
    <section class="min-h-screen flex flex-col justify-center container">

        <h1 class="text-4xl capitalize text-center py-8">Info Kos / Kontrakan</h1>

        <section class="grid grid-cols-2">
            @if ($kos)
                @foreach ($kos as $k)
                    <div class="card">
                        <div class="image">
                            <img src="{{ isset($k['fotokos'][0]['src']) ? $k['fotokos'][0]['src'] : asset('images/default.jpeg') }}"
                                alt="{{ $k['nama'] }}" class="h-96 object-cover">
                        </div>
                        <div class="content">
                            <div>
                                <h1>{{ $k['nama'] }}</h1>
                                <h4 class="text-center text-xs mb-2">{{ $k['alamat'] }}, {{ $k['keluarahan'] }},
                                    {{ $k['kecamatan'] }}, {{ $k['kota'] }}</h4>
                                <p>Tipe : Kos</p>
                                <ul class="mt-1">Fasilitas :
                                    @if ($k['faslitaskos'])
                                        @foreach ($k['faslitaskos'] as $f)
                                            <li>{{ $f['fasilitas'] }}</li>
                                        @endforeach
                                    @else
                                        -
                                    @endif

                            </div>
                            </ul>

                            <div class="text-center flex flex-col gap-2">
                                <p class="tracking-widest font-bold">Rp.
                                    {{ number_format($k['harga_per_bulan'], 2, ',', '.') }} / Bulan</p>
                                <a href="{{ route('pesan', $k['id']) }}"
                                    class="btn text-white w-full inline-block">Pesan</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </section>
    </section>
@endsection
