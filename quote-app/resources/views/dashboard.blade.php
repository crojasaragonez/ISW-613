<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row justify-center ">
                        @foreach($quotes as $quote)
                            <div class="bg-emerald-200 w-1/4 h-28 text-center ml-12 mr-12" >
                            <p>{{$quote->state}}</p>
                            <h1 style="font-size:40pt"><strong>{{$quote->count}}</strong></h1>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
