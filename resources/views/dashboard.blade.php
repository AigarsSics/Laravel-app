<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        @include('layouts.menu')
    </x-slot>

    <div class="py-12">
        @yield('content')
    </div>

</x-app-layout>
