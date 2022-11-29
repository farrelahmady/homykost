<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function beranda()
    {

        //dd(session()->has('user'));
        return view('pages.beranda');
    }

    public function login()
    {
        return view('pages.login', ['title' => "Login"]);
    }

    public function register()
    {
        return view('pages.register', ['title' => "Register"]);
    }

    public function kos()
    {
        $res = Http::withHeaders([
            'Cookie' => session()->get('cookie')
        ])->get(config('app.api') . 'kos');

        $data = [
            'kos' => $res->ok() ? $res->collect() : [],
            'title' => "Kos"
        ];

        return view('pages.kos', $data);
    }

    public function pesan($id)
    {
        $res = Http::withHeaders([
            'Cookie' => session()->get('cookie')
        ])->get(config('app.api') . 'kos');
        $kos = $res->ok() ? $res->collect()->firstWhere('id', $id) : [];

        $data = [
            'kos' => $kos,
            'title' => $kos['nama']
        ];

        return view('pages.pesan', $data);
    }

    public function pesanan()
    {
        $res = Http::withHeaders([
            'Cookie' => session()->get('cookie')
        ])->get(config('app.api') . 'pesanan');

        $data = [
            'pesanan' => $res->ok() ? $res->collect() : [],
            'title' => "Pesanan"
        ];

        //dd($data);
        return view('pages.pesanan', $data);
    }
}
