<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Client
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/clients">
                        @csrf
                        <label>Name:</label>
                        <input type="text" name="name" required>
                        <label>Email:</label>
                        <input type="email" name="email" required>
                        <button>Save</button>
                        <a href="/clients">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
