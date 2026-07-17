<x-layouts.app>

    <x-slot name="header">
        <x-h2> {{ __('Templates') }} </x-h2>
    </x-slot>


    <x-card class="space-y-4">

        <div class="flex justify-between items-center"> 
            <div><span class="opacity-70">{{ __('Name') }}: </span> {{ $template->name }}</div>
            <x-button.link secondary href="{{ route('templates.index') }}" class="text-sm"> {{ __('Back to list') }} </x-button.link>
        </div>

        <div class="flex justify-center rounded-2xl border border-slate-200 bg-slate-50/80 p-8 shadow-inner sm:p-16"> 
            {!! $template->body !!} 
        </div>
    </x-card>

</x-layouts.app> 
