<x-repo-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Top 30 Repositories 🌟') }}
            </h2>
    </x-slot>
    <x-repo-container class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
        @forelse ($repositories as $repository)
            <x-repo-card :repo='$repository'></x-repo-card>

        @empty
            Fuck off!
        @endforelse
    </x-repo-container>

</x-repo-layout>
