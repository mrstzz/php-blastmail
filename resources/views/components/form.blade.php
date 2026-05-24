@props([
    'post' => null
])

@php
    $method = $post ? 'POST' : 'GET';
@endphp

<form method="{{ $method }}" {{ $attributes->class(['gap-4 flex flex-col']) }}>
    
    @if($method === 'POST')
        @csrf
    @endif

    {{ $slot }}
    
</form>