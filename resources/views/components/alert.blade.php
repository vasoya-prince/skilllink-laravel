@props(['type' => 'success'])

@if($type === 'success')
    <div class="mb-4 p-3 bg-green-100 border-l-4 border-green-600 text-green-800 rounded">
        {{ $slot }}
    </div>
@endif

@if($type === 'error')
    <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-600 text-red-800 rounded">
        {{ $slot }}
    </div>
@endif
