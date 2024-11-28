<x-guest-layout>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white">
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="{{ asset('PUBLICIDAD-LICORERIA.webm') }}" type="video/webm" />
        </video>
        <div class="masthead">
            <div class="masthead-content text-white">
                <div class="container-fluid px-4 px-lg-0">
                    <div
                        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                            <header class="flex flex-col">
                                <div class="flex mb-8 lg:justify-center">
                                    <h1 class='italic text-4xl'>Perri Pepsi</h1>
                                </div>
                                <div class="flex">
                                    @if (Route::has('login'))
                                        <nav class="-mx-3 flex flex-1 justify-end">
                                            @auth
                                                <a href="{{ url('/dashboard') }}"
                                                    class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                    Inicio
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}"
                                                    class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                    Inicia Sesión
                                                </a>
                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}"
                                                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                        Registrate
                                                    </a>
                                                @endif
                                            @endauth
                                        </nav>
                                    @endif
                                </div>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
