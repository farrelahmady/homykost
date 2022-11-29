@extends('dashboard.main')

@section('content')
    <section class="px-8 w-full">
        <div class="flex justify-between items-center">
            <h1 class="text-4xl uppercase text-left py-8">Penghuni</h1>
        </div>
        <table>
            <tr>
                <th>Kos / Kontrakan</th>
                <th>Penghuni</th>
                <th>Lama Sewa</th>
                <th>Tanggal Masuk</th>
                <th>Bukti Pembayaran</th>
                <th>Status / Aksi</th>
            </tr>
            @if ($penghuni)
                @foreach ($penghuni as $p)
                    @if (is_array($p['kos']))
                        <tr>
                            <td>
                                {{ $p['kos']['nama'] }}
                            </td>
                            <td>
                                <p>{{ $p['customer']['nama'] }}</p>
                                <a href="https://wa.me/{{ $p['customer']['no_handphone'] }}" target="_blank"
                                    class="text-xs text-sky-600">Hubungi
                                    saya</a>
                            </td>
                            <td>{{ $p['lama_sewa'] }} Bulan</td>
                            <td>{{ $p['tanggal_masuk'] }}</td>
                            </td>
                            <td class="flex justify-center">
                                @if ($p['bukti_pembayaran'])
                                    <a href="{{ $p['bukti_pembayaran'] }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ $p['bukti_pembayaran'] }}" alt="" class="w-24">
                                    </a>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($p['bukti_pembayaran'] && !$p['status_pembayaran'])
                                    <a class="btn w-32 inline-block text-center whitespace-pre-line "
                                        href="{{ route('pesanan.konfirmasi', $p['id']) }}">Konfirmasi Pembayaran</a>
                                @elseif ($p['status_pembayaran'] &&
                                    \Carbon\Carbon::parse($p['tanggal_masuk'])->addMonth($p['lama_sewa'])->isBefore(\Carbon\Carbon::now()))
                                    <p>Sudah Keluar</p>
                                @elseif ($p['status_pembayaran'])
                                    <p>Lunas</p>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </table>
    </section>

    <section>

    </section>
@endsection
