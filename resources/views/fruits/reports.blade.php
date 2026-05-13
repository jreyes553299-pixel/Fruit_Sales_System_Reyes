<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fruit Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <form method="GET" action="{{ route('fruits.reports') }}" class="mb-4 flex gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                            <select name="category" class="shadow border rounded py-2 px-3 text-gray-700">
                                <option value="">All Categories</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Availability:</label>
                            <select name="availability" class="shadow border rounded py-2 px-3 text-gray-700">
                                <option value="">All Availability</option>
                                <option value="In Stock" {{ request('availability') == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                                <option value="Out of Stock" {{ request('availability') == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Filter</button>
                        </div>
                    </form>

                    <div class="flex gap-4 mb-4">
                        <a href="{{ route('fruits.export.pdf', request()->all()) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" target="_blank">Export as PDF (Print)</a>
                        <a href="{{ route('fruits.export.excel', request()->all()) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export as Excel (CSV)</a>
                    </div>
                </div>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
