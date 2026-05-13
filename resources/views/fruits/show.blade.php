<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Fruit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Fruit Name:</label>
                        <p class="text-gray-900">{{ $fruit->name }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                        <p class="text-gray-900">{{ $fruit->category }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Price per kilogram:</label>
                        <p class="text-gray-900">{{ $fruit->price }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Stock Quantity:</label>
                        <p class="text-gray-900">{{ $fruit->stock_quantity }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                        <p class="text-gray-900">{{ $fruit->description }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Availability:</label>
                        <p class="text-gray-900">{{ $fruit->availability }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('fruits.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
