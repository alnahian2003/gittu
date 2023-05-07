@props(['repo'])

<div
    class="w-full max-w-md bg-gray-900 shadow-lg rounded-xl overflow-hidden mx-auto border-4 border-transparent hover:border-gradient-to-r hover:border-teal-500 transition">
    <a href="{{ $repo->url }}" target="_blank">
        <img class="w-full h-56 object-cover object-center" src="{{ $repo->owner_avatar }}" alt="avatar">
    </a>
    <div class="flex items-center px-6 py-3 bg-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>

        <h1 class="mx-3 text-white font-semibold text-lg">{{ $repo->stars_count }}🌟</h1>
    </div>
    <div class="py-4 px-6">
        <a href="{{ $repo->url }}" target="_blank">
            <h1 class="hover:text-teal-300 transition text-2xl font-semibold text-gray-100">{{ $repo->name }}</h1>
        </a>
        <p class="py-2 text-lg text-gray-400">{{ $repo->description }}</p>
        <div class="flex items-center mt-4 text-gray-400">
            <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                <path
                    d="M239.208 343.937c-17.78 10.103-38.342 15.876-60.255 15.876-21.909 0-42.467-5.771-60.246-15.87C71.544 358.331 42.643 406 32 448h293.912c-10.639-42-39.537-89.683-86.704-104.063zM178.953 120.035c-58.479 0-105.886 47.394-105.886 105.858 0 58.464 47.407 105.857 105.886 105.857s105.886-47.394 105.886-105.857c0-58.464-47.408-105.858-105.886-105.858zm0 186.488c-33.671 0-62.445-22.513-73.997-50.523H252.95c-11.554 28.011-40.326 50.523-73.997 50.523z" />
                <g>
                    <path
                        d="M322.602 384H480c-10.638-42-39.537-81.691-86.703-96.072-17.781 10.104-38.343 15.873-60.256 15.873-14.823 0-29.024-2.654-42.168-7.49-7.445 12.47-16.927 25.592-27.974 34.906C289.245 341.354 309.146 364 322.602 384zM306.545 200h100.493c-11.554 28-40.327 50.293-73.997 50.293-8.875 0-17.404-1.692-25.375-4.51a128.411 128.411 0 0 1-6.52 25.118c10.066 3.174 20.779 4.862 31.895 4.862 58.479 0 105.886-47.41 105.886-105.872 0-58.465-47.407-105.866-105.886-105.866-37.49 0-70.427 19.703-89.243 49.09C275.607 131.383 298.961 163 306.545 200z" />
                </g>
            </svg>
            <a href="{{ $repo->url }}">
                <h4 class="px-2 text-sm text-teal-300">{{ $repo->owner_name }}</h4>
            </a>
        </div>
        <div class="flex items-center mt-4 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
            </svg>

            <h1 class="px-2 text-sm">{{ $repo->owner_type }}</h1>
        </div>

        {{-- Repo Topics --}}
        <div class="mt-4 flex flex-wrap gap-2">
            @foreach ($repo->topics as $topic)
                <a href={{ 'https://github.com/topics/' . $topic }}
                    class="text-xs font-medium px-4 py-2 rounded-full bg-teal-900 text-teal-300 shrink-0"
                    target="_blank">
                    {{ $topic }}</a>
            @endforeach
        </div>
    </div>
</div>
