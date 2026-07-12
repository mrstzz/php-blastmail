<x-slot name="header">
    <x-h2> {{ __('Campaigns') }} </x-h2>

</x-slot>

<div class="space-y-4">


    <x-form class="flex justify-end" action="{{ route('campaigns.show', ['what' => $what, 'campaign' => $campaign->id]) }}" get>
        <x-input.text id="search" :placeholder="__('Search')" type="text" name="search" :value="$search" autofocus />
    </x-form>

    <x-table :headers="[__('Name'),__('# Clicks'),__('Email')]">

        <x-slot name="body">
            
            <tr>
                <x-table.td> Jeremias </x-table.td>
                <x-table.td> 1 </x-table.td>
                <x-table.td> email@.com </x-table.td>

            </tr>
            

        </x-slot>

    </x-table>
</div>
