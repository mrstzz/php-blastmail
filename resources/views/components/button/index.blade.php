<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-full border border-transparent bg-slate-950 px-5 py-2.5 text-xs font-semibold uppercase tracking-wider text-white shadow-sm shadow-slate-300/70 transition duration-150 ease-in-out hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-400/60 focus:ring-offset-2 active:bg-slate-900']) }}>
    {{ $slot }}
</button>
