<nav class="flex items-center justify-between px-6 py-3 border-b border-gray-100">
    <div id="nav-left" class="flex items-center">
        <!-- Cambié 'route('home')' a 'route('posts.index')' para que apunte al blog -->
        <a href="{{ route('posts.index') }}">
            <x-application-mark />
        </a>
        <div class="ml-10 top-menu">
            <div class="flex space-x-4">
                <!-- Eliminé la referencia a 'home' porque ya no existe -->
                <!-- Dejé solo el enlace al blog -->
                <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('menu.blog') }}
                </x-nav-link>
            </div>
        </div>
    </div>
    <div id="nav-right" class="flex items-center md:space-x-6">
        @auth
            @include('layouts.partials.header-right-auth')
        @else
            @include('layouts.partials.header-right-guest')
        @endauth
    </div>
</nav>
