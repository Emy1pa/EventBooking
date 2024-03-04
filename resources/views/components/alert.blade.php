<div {{ $attributes->merge(['class' => 'p-4 rounded']) }}>
    @if ($type === 'success')
        <div class="bg-green-500 text-white px-4 py-2 rounded shadow-md">
            {{ $slot }}
        </div>
    @elseif ($type === 'warning')
        <div class="bg-yellow-500 text-white px-4 py-2 rounded shadow-md">
            {{ $slot }}
        </div>
    @elseif ($type === 'danger')
        <div class="bg-red-500 text-white px-4 py-2 rounded shadow-md">
            {{ $slot }}
        </div>
    @else
        <div class="bg-blue-500 text-white px-4 py-2 rounded shadow-md">
            {{ $slot }}
        </div>
    @endif
</div>
