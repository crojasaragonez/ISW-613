<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clients
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ $clients->links() }}
                    <a href="/clients/create">New Client</a>
                    <table class="table-auto min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <form method="GET">
                                <td>
                                    <input type="text" name="id" autofocus value="{{request()->get('id')}}">
                                </td>
                                <td>
                                    <input type="text" name="name" value="{{request()->get('name')}}">
                                </td>
                                <td>
                                    <input type="text" name="email" value="{{request()->get('email')}}">
                                </td>
                                <td>
                                    <button>Filter</button>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($clients as $client)
                        <tr>
                            <td>{{$client->id}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->email}}</td>
                            <td>
                                <a href="/clients/{{$client->id}}/edit">Edit</a>
                                <a href="/clients/{{$client->id}}/delete">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="4">No data found 😥</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
