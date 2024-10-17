<x-app-layout title="Home Page">
    @section('hero')
        <div class="w-full py-32 text-center">
            <h1 class="text-2xl font-bold text-center text-gray-700 md:text-3xl lg:text-5xl">
                {{ __('home.hero.title') }} <span class="text-yellow-500">&lt;Jhontabo&gt;</span> <span class="text-gray-900">
                    Noticias</span>
            </h1>
            <p class="mt-1 text-lg text-gray-500">{{ __('home.hero.desc') }}</p>
            <a class="inline-block px-3 py-2 mt-5 text-lg text-white bg-gray-800 rounded" href="{{ route('posts.index') }}">
                {{ __('home.hero.cta') }}</a>
        </div>
    @endsection

    <div class="w-full mb-10">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl font-bold text-yellow-500"> {{ __('home.featured_posts') }} </h2>
            <div class="w-full">
                <!-- Aumenté el tamaño de la grilla a 2 columnas para hacer más grandes las tarjetas -->
                <div class="grid w-full grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-12">
                    @foreach ($featuredPosts as $post)
                        <!-- Ajusté el tamaño de las tarjetas para que ocupen más espacio -->
                        <x-posts.post-card :post="$post" class="col-span-1 transform transition-transform hover:scale-105" />
                    @endforeach
                </div>
            </div>
            <a class="block mt-10 text-lg font-semibold text-center text-yellow-500" href="{{ route('posts.index') }}">
                {{ __('home.more_posts') }}</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl font-bold text-yellow-500">{{ __('home.latest_posts') }}</h2>
        <div class="w-full mb-5">
            <!-- Aumenté el tamaño de la grilla a 2 columnas para los últimos posts también -->
            <div class="grid w-full grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-12">
                @foreach ($latestPosts as $post)
                    <!-- Mantengo el mismo efecto de hover y tamaño en las tarjetas -->
                    <x-posts.post-card :post="$post" class="col-span-1 transform transition-transform hover:scale-105" />
                @endforeach
            </div>
        </div>
        <a class="block mt-10 text-lg font-semibold text-center text-yellow-500" href="{{ route('posts.index') }}">
            {{ __('home.more_posts') }}</a>
    </div>
</x-app-layout>
