@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-xl border-slate-200 bg-white/90 text-slate-900 shadow-sm shadow-slate-200/50 placeholder:text-slate-400 focus:border-emerald-400 focus:ring-emerald-400']) }}>
