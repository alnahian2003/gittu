<div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class=" bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div {{ $attributes->merge(['class' => 'p-6 text-gray-100']) }}>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
