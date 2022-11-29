<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        //return view('dashboard.index');
        return redirect()->route('dashboard.kos');
    }

    public function kos()
    {
        $res = Http::pool(function ($pool) {
            $pool->as('kos')->withHeaders([
                'Cookie' => session()->get('cookie')
            ])->get(config('app.api') . 'kos/owner');
        });
        $kos = $res['kos']->ok() ? $res['kos']->collect()->filter(function ($kos) {
            return $kos['owner']['id'] == session()->get('user')['id'];
        })->values() : [];

        //dd($kos->toArray());

        $data = [
            'kos' => $kos
        ];
        return view('dashboard.kos.index', $data);
    }
    public function addKos()
    {

        $res = Http::pool(function ($pool) {
            $pool->as('fasilitas')->withHeaders([
                'Cookie' => session()->get('cookie')
            ])->get(config('app.api') . 'fasilitas');
        });

        $data = [
            'fasilitas' => $res['fasilitas']->ok() ? $res['fasilitas']->collect() : [],
        ];

        return view('dashboard.kos.add', $data);
    }

    public function editKos($id)
    {
        $res = Http::pool(function ($pool) use ($id) {
            $pool->as('kos')->withHeaders([
                'Cookie' => session()->get('cookie')
            ])->get(config('app.api') . 'kos/owner');
            $pool->as('fasilitas')->withHeaders([
                'Cookie' => session()->get('cookie')
            ])->get(config('app.api') . 'fasilitas');
        });

        $data = [
            'kos' => $res['kos']->ok() ? $res['kos']->collect()->firstWhere('id', $id) : [],
            'fasilitas' => $res['fasilitas']->ok() ? $res['fasilitas']->collect() : [],
        ];


        return view('dashboard.kos.edit', $data);
    }

    public function penghuni()
    {
        $res = Http::withHeaders([
            'Cookie' => session()->get('cookie')
        ])->get(config('app.api') . 'pesanan/owner');


        $data = [
            'penghuni' => $res->ok() ? $res->collect() : [],
        ];

        //dd(Carbon::parse($penghuni['tanggal_masuk'])->addMonth());

        return view('dashboard.penghuni.index', $data);
    }
}
