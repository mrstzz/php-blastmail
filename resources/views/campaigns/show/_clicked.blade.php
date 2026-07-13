<x-slot name="header">
    <x-h2> {{ __('Campaigns') }} </x-h2>

</x-slot>

<div class="space-y-4">


    <x-form class="flex justify-end" action="{{ route('campaigns.show', ['what' => $what, 'campaign' => $campaign->id]) }}" get>
        <x-input.text id="search" :placeholder="__('Search')" type="text" name="search" :value="$search" autofocus />
    </x-form>

    <x-table :headers="[__('Name'),__('# Clicks'),__('Email')]">

        <x-slot name="body">
            
             @foreach ($query as $item)
                <tr>
                    <x-table.td> {{ $item->subscriber->name }} </x-table.td>
                    <x-table.td> {{ $item->clicks }} </x-table.td>
                    <x-table.td> {{ $item->subscriber->email }} </x-table.td>

                </tr>
                
            @endforeach
            

        </x-slot>
    </x-table>
    {{ $query->links() }}
</div>
