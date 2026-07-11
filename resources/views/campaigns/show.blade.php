<x-layouts.app>
    <x-slot name="header">
        <x-h2> <a href="{{ route('campaigns.index') }}">{{ __('Campaigns') }}</a> > {{ $campaign->name }} > {{ __(str($what)->title()->toString()) }}</x-h2>
    </x-slot>

    <x-card>


        <div>{{$campaign->description}}</div>

        <x-tabs :tabs="[
            __('Statistics') => route('campaigns.show', ['what' => 'statistics', 'campaign' => $campaign->id]),
            __('Open') => route('campaigns.show', ['what' => 'open', 'campaign' => $campaign->id]),
            __('Clicked') => route('campaigns.show', ['what' => 'clicked', 'campaign' => $campaign->id]),
        ]">


            @include('campaigns.show._'.$what)
        </x-tabs>

    </x-card>
</x-layouts.app>