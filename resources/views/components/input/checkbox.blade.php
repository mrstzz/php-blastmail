
@props([
    'label',
    'name',
    'checked' => null,
    'isCheckedWhen' => null,
])



<label for="{{ $name }}" class="inline-flex items-center">
    <input id="{{ $name }}" type="checkbox" value="1" {{ $attributes }}
        @if($checked or $isCheckedWhen == $attributes->get('value')) checked @endif
        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" 
        name="{{ $name }}" >
    <span class="ms-2 text-sm text-gray-600 whitespace-nowrap">{{ $label }}</span>
</label>