<nav class="bg-slate-200 h-full">
    <ul class="py-8">
        {{-- <li class="w-full hover:bg-slate-300 {{ Request::is('dashboard') ? 'bg-slate-300' : '' }}"><a
                href="{{ route('dashboard') }}" class="p-4  flex w-full h-full">Dashboard</a></li> --}}
        <li class="w-full hover:bg-slate-300 {{ Request::is('dashboard/kos') ? 'bg-slate-300' : '' }}"><a
                href="{{ route('dashboard.kos') }}" class="p-4 flex w-full h-full">Kos</a>
        </li>
        <li class="w-full hover:bg-slate-300 {{ Request::is('dashboard/penghuni') ? 'bg-slate-300' : '' }}"><a
                href="{{ route('dashboard.penghuni') }}" class="p-4 flex w-full h-full">Penghuni</a></li>
    </ul>
</nav>
