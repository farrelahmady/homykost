<nav class="navbar fixed z-50 left-0 top-0 bg-white w-full">
    @includeIf('components.logo')
    <ul class="flex">
        @if (Route::has('beranda'))
            <li><a href="{{ route('beranda') }}">beranda</a></li>
        @endif
        @if (Route::has('kos'))
            <li><a href="{{ route('kos') }}">kos</a></li>
        @endif
        @if (Session::has('user'))
            @if (Route::has('pesanan'))
                <li><a href="{{ route('pesanan') }}">pesanan</a></li>
            @endif
            @if (Route::has('auth.logout'))
                <li><a href="{{ route('auth.logout') }}">logout</a></li>
            @endif
        @else
            @if (Route::has('login'))
                <li><a href="{{ route('login') }}">login</a></li>
            @endif
        @endif
    </ul>
</nav>
