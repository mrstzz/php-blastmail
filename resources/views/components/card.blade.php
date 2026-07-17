


<div class="py-8 sm:py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden border border-white/80 bg-white/85 shadow-xl shadow-slate-300/40 backdrop-blur-xl sm:rounded-2xl">
            
            <div {{ $attributes->merge(['class' => 'p-6 text-slate-900 sm:p-8']) }}>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
