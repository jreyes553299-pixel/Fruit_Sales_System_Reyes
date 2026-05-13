<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Fruit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('fruits.update', $fruit) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Fruit Name</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="name" name="name" type="text" value="{{ $fruit->name }}" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">Category</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="category" name="category" type="text" value="{{ $fruit->category }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price per kilogram</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="price" name="price" type="number" step="0.01" min="0" value="{{ $fruit->price }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="stock_quantity">Stock Quantity</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="stock_quantity" name="stock_quantity" type="number" min="0" value="{{ $fruit->stock_quantity }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="description" name="description">{{ $fruit->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="availability">Availability</label>
                            <select class="shadow border rounded w-full py-2 px-3 text-gray-700" id="availability" name="availability" required>
                                <option value="In Stock" {{ $fruit->availability == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                                <option value="Out of Stock" {{ $fruit->availability == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Update Fruit
                            </button>
                            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('fruits.index') }}">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
