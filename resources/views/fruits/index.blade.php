<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fruits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 text-green-600 font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('fruits.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Fruit</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Name</th>
                                <th class="px-4 py-2 border">Category</th>
                                <th class="px-4 py-2 border">Price/kg</th>
                                <th class="px-4 py-2 border">Stock</th>
                                <th class="px-4 py-2 border">Availability</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fruits as $fruit)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $fruit->id }}</td>
                                    <td class="px-4 py-2 border">{{ $fruit->name }}</td>
                                    <td class="px-4 py-2 border">{{ $fruit->category }}</td>
                                    <td class="px-4 py-2 border">{{ $fruit->price }}</td>
                                    <td class="px-4 py-2 border">{{ $fruit->stock_quantity }}</td>
                                    <td class="px-4 py-2 border">{{ $fruit->availability }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('fruits.show', $fruit) }}" class="text-blue-600 mr-2">View</a>
                                        <a href="{{ route('fruits.edit', $fruit) }}" class="text-green-600 mr-2">Edit</a>
                                        <form action="{{ route('fruits.destroy', $fruit) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
