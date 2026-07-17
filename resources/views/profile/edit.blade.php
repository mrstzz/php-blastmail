<x-layouts.app>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold tracking-tight text-slate-950">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-8 sm:py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="border border-white/80 bg-white/85 p-4 shadow-xl shadow-slate-300/40 backdrop-blur-xl sm:rounded-2xl sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="border border-white/80 bg-white/85 p-4 shadow-xl shadow-slate-300/40 backdrop-blur-xl sm:rounded-2xl sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="border border-white/80 bg-white/85 p-4 shadow-xl shadow-slate-300/40 backdrop-blur-xl sm:rounded-2xl sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
