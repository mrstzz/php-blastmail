


@props(['headers','body'])





<div class="w-full overflow-hidden overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm shadow-slate-200/60">
    <table class="w-full text-left text-sm text-slate-700">
        <thead class="border-b border-slate-200 bg-slate-50/90 text-xs font-semibold uppercase tracking-wider text-slate-500">
            <tr>
                @foreach ($headers as $header)
                    <th scope="col" class="whitespace-nowrap p-4">{{ $header }}</th>
                    
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
                {{ $body }}
        </tbody>
    </table>
</div>
