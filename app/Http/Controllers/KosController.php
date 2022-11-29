<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KosController extends Controller
{
    public function store(Request $req)
    {
        $res = Http::withHeaders([
            'Cookie' => session()->get('cookie')
        ])->post(config('app.api') . 'kos', [
            'nama' => $req->nama,
            'jenis' => $req->jenis,
            'alamat' => $req->alamat,
            'kelurahan' => $req->kelurahan,
            'kecamatan' => $req->kecamatan,
            'kota' => $req->kota,
            'harga_per_bulan' => $req->harga_per_bulan,
            'fasilitasKos' => $req->fasilitas,
        ]);

        if ($res->ok()) {
            $kos = $res->json()['payload'];
            if ($req->hasFile('foto')) {
                foreach ($req->file('foto') as $foto) {
                    $src = asset('storage/' . $foto->store('images/kos', 'public'));
                    $res = Http::withHeaders([
                        'Cookie' => session()->get('cookie')
                    ])->post(config('app.api') . 'fotokos', [
                        'src' => $src,
                        'kos_id' => $kos['id']
                    ]);
                }
            }
            return redirect()->route('dashboard.kos')->with('success', 'Kos berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Kos gagal ditambahkan');
        }
    }

    public function edit(Request $req)
    {
        $res = Http::withHeaders([
            'Cookie' => session()->get('cookie')
        ])->put(config('app.api') . 'kos', [
            'nama' => $req->nama,
            'jenis' => $req->jenis,
            'alamat' => $req->alamat,
            'kelurahan' => $req->kelurahan,
            'kecamatan' => $req->kecamatan,
            'kota' => $req->kota,
            'harga_per_bulan' => $req->harga_per_bulan,
            'fasilitas' => $req->fasilitas,
        ]);

        if ($res->ok()) {
            $kos = $res->json()['payload'];
            if ($req->hasFile('foto')) {
                foreach ($req->file('foto') as $foto) {
                    $src = asset('storage/' . $foto->store('images/kos', 'public'));
                    $res = Http::withHeaders([
                        'Cookie' => session()->get('cookie')
                    ])->post(config('app.api') . 'fotokos', [
                        'src' => $src,
                        'kos_id' => $kos['id']
                    ]);
                }
            }
            return redirect()->route('dashboard.kos')->with('success', 'Kos berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Kos gagal ditambahkan');
        }
    }

    public function delete($id)
    {
        $res = Http::withHeaders([
            'Cookie' => session()->get('cookie')
        ])->get(config('app.api') . 'kos/owner');

        $kos = $res->ok() ? $res->collect()->firstWhere('id', $id) : [];
        //dd($kos);
        if ($kos) {
            foreach ($kos['fotokos'] as $foto) {
                $fotoId = $foto['id'];
                $res = Http::withHeaders([
                    'Cookie' => session()->get('cookie')
                ])->delete(config('app.api') . "fotokos/$fotoId");
            }

            $res = Http::withHeaders([
                'Cookie' => session()->get('cookie')
            ])->delete(config('app.api') . "kos/$id");
        }
        if ($res->ok()) {
            return redirect()->route('dashboard.kos')->with('success', 'Kos berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Kos gagal dihapus');
        }
    }

    public function pesan(Request $req, $id)
    {
        $res = Http::withHeaders([
            'Cookie' => session()->get('cookie')
        ])->post(config('app.api') . 'pesanan', [
            'kos_id' => $id,
            'lama_sewa' => $req->lama_sewa,
            'tanggal_masuk' => Carbon::parse($req->tanggal_masuk)->format('d/m/Y'),
        ]);


        if ($res->ok()) {
            return redirect()->route('pesanan')->with('success', 'Kos berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Kos gagal dihapus');
        }
    }

    public function uploadBukti(Request $req, $id)
    {
        $res = Http::withHeaders([
            'Cookie' => session()->get('cookie')
        ])->put(config('app.api') . "pesanan/addMoney/1", [
            'src' => asset('storage/' . $req->file('bukti')->store('images/bukti', 'public')),
        ]);

        if ($res->ok()) {
            return redirect()->route('pesanan')->with('success', 'Kos berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Kos gagal dihapus');
        }
    }

    public function konfirmasi($id)
    {
        $res = Http::withHeaders([
            'Cookie' => session()->get('cookie')
        ])->put(config('app.api') . "pesanan/changeStatus/$id");



        if ($res->ok()) {
            return redirect()->route('dashboard.penghuni')->with('success', 'Kos berhasil dihapus');
        } else {
            dd($res->json());
            return redirect()->back()->with('error', 'Kos gagal dihapus');
        }
    }
}
