<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Ingredient
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
                    <form method="POST" action="/ingredients">
                        @csrf
                        <label>Name:</label>
                        <input type="text" name="name" required>
                        <label>Unit:</label>
                        <input type="text" name="unit" required>
                        <label>Quantity:</label>
                        <input type="number" name="quantity" required>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                        <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="/ingredients">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
