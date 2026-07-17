
@props([
    'label',
    'name',
    'checked' => null,
    'isCheckedWhen' => null,
])



<label for="{{ $name }}" class="inline-flex items-center">
    <input id="{{ $name }}" type="checkbox" value="1" {{ $attributes }}
        @if($checked or $isCheckedWhen == $attributes->get('value')) checked @endif
        class="rounded border-slate-300 text-emerald-600 shadow-sm focus:ring-emerald-500" 
        name="{{ $name }}" >
    <span class="ms-2 whitespace-nowrap text-sm font-medium text-slate-600">{{ $label }}</span>
</label>
