<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $res = Http::post(config('app.api') . 'auth/signin', [
            'username' => $req->username,
            'password' => $req->password
        ]);

        if ($res->ok()) {
            $data = $res->collect();


            session()->put('user', $data);
            session()->put('cookie', $res->header('Set-Cookie'));

            if (in_array('ROLE_OWNER', $data->toArray()['roles'])) {
                return redirect()->route('dashboard');
            }
            return redirect()->route('kos');
        }

        return redirect()->back()->with('error', $res->json()['message']);
    }

    public function register(Request $req)
    {
        $data = [
            'username' => $req->username,
            'email' => $req->email,
            'password' => $req->password,
            'nama' => $req->nama,
            'no_handphone' => $req->no_handphone,
            'no_rekening' => $req->no_rekening,
            'jenis_kelamin' => $req->jenis_kelamin,
            'role' => [$req->role],
        ];

        $data['foto_profil'] = $req->hasFile('foto_profil') ?  asset('storage/' . $req->file('foto_profil')->store('images/user/customer', 'public')) : null;

        $res = Http::post(config('app.api') . 'auth/signup', $data);

        return $res->ok() ? redirect()->route('login') : redirect()->back()->with('error', $res->json()['message']);
    }

    public function logout()
    {
        $res = Http::post(config('app.api') . 'auth/signout');

        if ($res->ok()) {
            session()->forget('user');
            return redirect()->route('login');
        }

        return redirect()->back()->with('error', $res->json()['message']);
    }
}
