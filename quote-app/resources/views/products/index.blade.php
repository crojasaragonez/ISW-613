<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Products
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ $products->links() }}
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="/products/create">New Product</a>
                    <table class="table-auto min-w-full divide-y divide-gray-200 mt-6">
                        <thead class="bg-gray-50">
                        <tr>
                            <form method="GET">
                                <td>
                                    <input type="text" name="id" autofocus value="{{request()->get('id')}}">
                                </td>
                                <td>
                                    <input type="text" name="name" value="{{request()->get('name')}}">
                                </td>
                                <td></td>
                                <td>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Filter</button>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left uppercase tracking-wider">Id</th>
                            <th scope="col" class="px-6 py-4 text-left uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-4 text-left uppercase tracking-wider">is Active</th>
                            <th scope="col" class="px-6 py-4 text-left uppercase tracking-wider"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($products as $product)
                        <tr>
                            <td class="px-6 py-2 whitespace-nowrap">{{$product->id}}</td>
                            <td class="px-6 py-2 whitespace-nowrap">{{$product->name}}</td>
                            <td class="px-6 py-2 whitespace-nowrap"><input type="checkbox" name="is_active" {{$product->is_active ? 'checked' : ''}} disabled></td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-4 rounded" href="/products/{{$product->id}}/edit">Edit</a>
                                <a class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 rounded" href="/products/{{$product->id}}/delete">Delete</a>
                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 rounded" href="/products/{{$product->id}}/recipe">Recipe</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="4">No data found ????</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
