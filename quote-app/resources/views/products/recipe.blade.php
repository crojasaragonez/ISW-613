<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Recipe for {{$product->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="/products/{{$product->id}}/recipe">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <label>Ingredient:</label>
                        <select name="ingredient_id">
                            @foreach ($ingredients as $ingredient)
                            <option value="{{$ingredient->id}}">
                                {{$ingredient->name}} ({{$ingredient->unit}})
                            </option>
                            @endforeach
                        </select>
                        <input type="number" name="quantity" required value="1">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                        <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="/products">Cancel</a>
                    </form>
                    <ul>
                        @forelse ($recipe_ingredients as $line)
                        <li class="inline">
                            <div class="mr-2">
                                <form method="POST" action="/products/{{$product->id}}/recipe/{{$line->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 rounded">x</button>
                                </form>
                            </div>
                            <div>
                                {{$line->quantity}} {{$line->ingredient->unit}} of {{$line->ingredient->name}}
                            </div>
                        </li>
                        @empty
                        <li>
                            No ingredients found 😥
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
