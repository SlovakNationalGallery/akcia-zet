<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('googletagmanager::head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Umenie × propaganda, hoax, kult osobnosti a iné dôležité témy v podcastoch, videách, článkoch a ďalších formátoch">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta property="og:title" content="Akcia ZET — umenovedná výprava" />
        <meta property="og:description" content="Umenie × propaganda, hoax, kult osobnosti a iné dôležité témy v podcastoch, videách, článkoch a ďalších formátoch" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://akciazet.sng.sk/" />
        <meta property="og:image" content="https://akciazet.sng.sk/img/og_image.png" />
        <title>Akcia ZET — umenovedná výprava</title>

        {{-- Favicons --}}
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#413939">
        <meta name="msapplication-TileColor" content="#413939">
        <meta name="theme-color" content="#413939">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <x-embed-styles />

        {{-- Additional styles --}}
        {{ $styles ?? '' }}

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        @livewireStyles
    </head>
    <body class="antialiased">
        @include('googletagmanager::body')
        <div class="bg-gradient-to-b from-white to-yellow-200">
            @php
                $isPopped = request()->routeIs('actors')
                            || request()->routeIs('articles.index')
                            || request()->routeIs('research-articles.index')
                            || request()->routeIs('about');
            @endphp
            <nav class="relative {{ $isPopped ? 'md:h-48' : 'h-20' }} px-6 pt-4 md:px-8 z-20">
                {{-- Desktop nav --}}
                <div class="hidden md:flex justify-between">
                    <a href="{{ route('home') }}" class="text-4xl lg:text-5xl block text-yellow-400 text-shadow-left font-mono">AKCIA</a>
                    @php
                        $colorClass = request()->routeIs('home') ? 'text-gray-400' : 'text-red-800';
                        $hoverColorClass = request()->routeIs('home') ? 'text-gray-800' : 'text-gray-400';
                        $activeClass = ''
                    @endphp

                    <ul class="slab tracking-wide flex md:text-2xl space-x-4 lg:space-x-8 xl:text-4xl {{ $colorClass }} mt-2">
                        <li class="{{ request()->routeIs('actors') ? 'transform translate-y-20 scale-200 tracking-normal' : '' }}">
                            @if(request()->routeIs('actors'))
                                <x-spotlight class="px-3 transform -skew-x-24" />
                            @endif
                            <a class="hover:{{ $hoverColorClass }}{{ request()->routeIs('actors') ? ' text-gray-400' : '' }}" href="{{ route('actors') }}">
                                Aktéri
                            </a>
                        </li>
                        <li>
                            <a class="hover:{{ $hoverColorClass }}{{ request()->routeIs('home') ? ' text-gray-400' : '' }}" href="{{ route('home') }}">
                                Artefakt
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('articles.index') ? 'transform translate-y-20 -translate-x-4 scale-200  tracking-normal' : '' }}">
                            @if(request()->routeIs('articles.index'))
                                <x-spotlight class="px-3 transform -skew-x-12" />
                            @endif
                            <a class="hover:{{ $hoverColorClass }}{{ request()->routeIs('articles.*') ? ' text-gray-400' : '' }}" href="{{ route('articles.index') }}">
                                Pridané
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('research-articles.index') ? 'transform translate-y-20 -translate-x-4 scale-200  tracking-normal' : '' }}">
                            @if(request()->routeIs('research-articles.index'))
                                <x-spotlight class="px-3 pl-4 transform skew-x-12" />
                            @endif
                            <a class="hover:{{ $hoverColorClass }}{{ request()->routeIs('research-articles.*') ? ' text-gray-400' : '' }}" href="{{ route('research-articles.index') }}">
                                Texty
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('about') ? 'transform translate-y-20 -translate-x-4 scale-200  tracking-normal' : '' }}">
                            @if(request()->routeIs('about'))
                                <x-spotlight class="px-3 pl-4 transform skew-x-24" />
                            @endif
                            <a class="hover:{{ $hoverColorClass }}{{ request()->routeIs('about') ? ' text-gray-400' : '' }}" href="{{ route('about') }}">
                                Prečo
                            </a>
                        </li>
                    </ul>
                    <a href="{{ route('home') }}" class="text-4xl lg:text-5xl block text-yellow-400 text-shadow-right font-mono">ZET</a>
                </div>

                {{-- Mobile nav --}}
                <div class="md:hidden">
                    <div class="relative flex justify-between">
                        <a href="{{ route('home') }}" class="text-5xl block text-yellow-400 text-shadow-left font-mono">A*Z</a>
                        <div x-data="{ show: false }" x-cloak>
                            <a x-on:click="show = true">
                                <svg viewBox="0 0 100 120" width="40" height="40" class="inline-block fill-current text-yellow-400 text-5xl mt-3" style="filter: drop-shadow(0.04em -0.02em 0 #ce4369)">
                                    <rect width="100" height="8"></rect>
                                    <rect y="40" width="100" height="8"></rect>
                                    <rect y="80" width="100" height="8"></rect>
                                </svg>
                            </a>
                            <div x-show="show"
                                class="fixed inset-0 bg-pink-700 z-10 flex flex-col justify-between p-6"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform translate-x-full"
                                x-transition:enter-end="opacity-100 transform translate-x-0"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform translate-x-0"
                                x-transition:leave-end="opacity-0 transform translate-x-full"
                            >
                                <h3 class="text-5xl text-yellow-200 text-center font-mono">
                                    <a href="{{ route('home') }}">AKCIA ZET</a>
                                </h3>
                                <ul class="text-center slab text-6xl font-bold text-gray-200 mt-10 space-y-4">
                                    <li><a class="hover:{{ $hoverColorClass }}{{ request()->routeIs('actors')     ? ' text-yellow-400' : '' }}" href="{{ route('actors') }}">Aktéri</a></li>
                                    <li><a class="hover:{{ $hoverColorClass }}" href="{{ route('home') }}">Artefakt</a></li>
                                    <li><a class="hover:{{ $hoverColorClass }}{{ request()->routeIs('articles.*') ? ' text-yellow-400' : '' }}" href="{{ route('articles.index') }}">Pridané</a></li>
                                    <li><a class="hover:{{ $hoverColorClass }}{{ request()->routeIs('research')   ? ' text-yellow-400' : '' }}" href="{{ route('research-articles.index') }}">Texty</a></li>
                                    <li><a class="hover:{{ $hoverColorClass }}{{ request()->routeIs('about')      ? ' text-yellow-400' : '' }}" href="{{ route('about') }}">Prečo</a></li>
                                </ul>
                                <div class="text-right">
                                    <a x-on:click="show = false">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="text-gray-200 inline-block fill-current w-16 h-16">
                                            <defs/>
                                            <path d="M77.6 21.1l-28 28.1-28.1-28.1-1.9 1.9 28 28.1-28 28.1 1.9 1.9L49.6 53l28 28.1 2-1.9-28.1-28.1L79.6 23z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            {{ $slot }}
        </div>

        @livewireScripts
        {{-- Additional scripts --}}
        {{ $scripts ?? '' }}
    </body>
</html>
