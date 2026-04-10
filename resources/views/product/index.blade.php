<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Products') }}
            </h2>
            <div class="flex gap-2">
                @can('export-product')
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Export
                </button>
                @endcan
                @can('manage-product')
                <a href="{{ route('product.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Product
                </a>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full text-left table-auto min-w-max">
                            <thead>
                                <tr>
                                    <th class="p-4 border-b border-gray-200 dark:border-gray-700">Name</th>
                                    <th class="p-4 border-b border-gray-200 dark:border-gray-700">Quantity</th>
                                    <th class="p-4 border-b border-gray-200 dark:border-gray-700">Price</th>
                                    <th class="p-4 border-b border-gray-200 dark:border-gray-700">User ID</th>
                                    <th class="p-4 border-b border-gray-200 dark:border-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="p-4">{{ $product->name }}</td>
                                        <td class="p-4">{{ $product->quantity }}</td>
                                        <td class="p-4">Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                                        <td class="p-4">{{ $product->user->name ?? $product->user_id }}</td>
                                        <td class="p-4 flex gap-3">
                                            <a href="{{ route('product.show', $product->id) }}" class="text-blue-500 hover:underline">View</a>
                                            @can('update', $product)
                                            <a href="{{ route('product.edit', $product->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                            @endcan
                                            @can('delete', $product)
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-4 text-center text-gray-500">No products found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
