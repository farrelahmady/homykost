@extends('main')

@section('content')
    <section id="hero"
        class=" relative  bg-black text-white h-screen   bg-cover bg-center bg-opacity-0 bg-[url('/../public/images/hero.jpg')]">
        <div class="bg-black bg-opacity-40 h-screen absolute left-0 flex flex-col justify-center container">
            <h1 class="uppercase font-bold text-4xl">selamat datang di homykost.com</h1>
            <h2 class="capitalize text-3xl">tembalang, semarang, provinsi jawa tengah</h2>
        </div>
    </section>
    <section
        class=" relative  bg-black text-white h-screen  bg-cover bg-center bg-opacity-0 bg-[url('/../public/images/hero2.jpg')]">
        <div class="bg-black bg-opacity-40 h-screen absolute left-0 flex flex-col justify-center container">
            <h2 class="capitalize text-3xl">dapatkan hunian nyaman hanya di <span class="uppercase">homykost.com</span></h2>
        </div>
    </section>
@endsection
