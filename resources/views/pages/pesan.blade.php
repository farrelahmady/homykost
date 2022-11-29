@extends('main')

@section('content')

    <section class="min-h-screen flex flex-col justify-center container">
        <h1 class="text-4xl capitalize text-center py-8">Pesan Kos / Kontrakan</h1>
        <div class="card">
            <div class="image">
                <img src="{{ isset($k['fotokos'][0]['src']) ? $k['fotokos'][0]['src'] : asset('images/default.jpeg') }}"
                    class="h-96 object-cover">
            </div>
            <div class="content">
                <div>
                    <h1>{{ $kos['nama'] }}</h1>
                    <h4 class="text-center text-xs mb-2">{{ $kos['alamat'] }}, {{ $kos['keluarahan'] }},
                        {{ $kos['kecamatan'] }}, {{ $kos['kota'] }}</h4>
                    <p>Tipe : Kos</p>
                    <ul class="mt-1">Fasilitas :
                        @if ($kos['faslitaskos'])
                            @foreach ($kos['faslitaskos'] as $f)
                                <li>{{ $f['fasilitas'] }}</li>
                            @endforeach
                        @else
                            -
                        @endif

                </div>
                </ul>

                <div class="text-center flex flex-col gap-2">
                    <p class="tracking-widest font-bold">Rp. 1.000.000</p>
                    <form action="{{ route('kos.pesan', $kos['id']) }}" method="post">
                        @csrf
                        <for class="flex gap-2">
                            <div class="form-input flex-1">
                                <label for="lama_sewa">Lama Sewa (Bulan)</label>
                                <input type="number" name="lama_sewa" id="lama_sewa" class="input" min="1"
                                    value="1">
                            </div>

                            <div class="form-input flex-1">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input required type="date" name="tanggal_masuk" id="tanggal_masuk" class="input"
                                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                    value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                        </for>
                        <button type="submit" class="btn text-white w-full inline-block mt-2">Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
