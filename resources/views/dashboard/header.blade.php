<nav class="navbar z-50 left-0 top-0 bg-sky-900 w-full flex justify-between">
    <div class="mr-16 my-4 text-white">
        <img id="logo" class="h-9 mx-auto" src="{{ asset('images/logo.png') }}" alt="homykost">
        <h1 class="uppercase font-bold font-serif text-xs">homykost.com</h1>
    </div>
    <ul class="flex text-white">
        <li><a href="{{ route('auth.logout') }}">logout</a></li>
    </ul>
</nav>
