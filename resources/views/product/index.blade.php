<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-3xl text-black uppercase tracking-tight">
                {{ __('Products Inventory') }}
            </h2>
            <div class="flex gap-3">
                @can('export-product')
                <button class="inline-flex items-center px-4 py-2 bg-sky-300 border-2 border-black text-black font-bold uppercase tracking-wider rounded-xl hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all focus:outline-none">
                    <svg class="-ml-1 mr-2 w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Export
                </button>
                @endcan
                @can('manage-product')
                <div class="inline-block hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all rounded-xl">
                    <x-add-product :url="route('product.create')" name="Product" />
                </div>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 bg-green-300 border-4 border-black rounded-2xl text-black px-6 py-4 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] flex items-center justify-between" role="alert">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3 text-black" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="block sm:inline font-black uppercase">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] overflow-hidden">
                <div class="px-6 py-5 border-b-4 border-black bg-sky-300">
                    <h3 class="text-xl font-black text-black uppercase tracking-wider">All Products</h3>
                </div>
                
                <div class="p-0 overflow-x-auto">
                    <table class="w-full text-left table-auto whitespace-nowrap border-collapse">
                        <thead>
                            <tr class="bg-sky-200 text-black text-sm font-black uppercase tracking-wider border-b-4 border-black">
                                <th class="px-6 py-4 border-r-4 border-black">No.</th>
                                <th class="px-6 py-4 border-r-4 border-black">Product Name</th>
                                <th class="px-6 py-4 border-r-4 border-black">Stock</th>
                                <th class="px-6 py-4 border-r-4 border-black">Price</th>
                                <th class="px-6 py-4 border-r-4 border-black">Owner</th>
                                <th class="px-6 py-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y-4 divide-black">
                            @forelse($products as $product)
                                <tr class="hover:bg-gray-100 transition-colors duration-200">
                                    <td class="px-6 py-4 text-black font-bold border-r-4 border-black">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 font-black text-black border-r-4 border-black">{{ $product->name }}</td>
                                    <td class="px-6 py-4 border-r-4 border-black">
                                        <span class="inline-flex items-center px-3 py-1 border-2 border-black rounded-lg text-xs font-black uppercase shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] {{ $product->qty > 10 ? 'bg-green-300 text-black' : 'bg-red-400 text-black' }}">
                                            {{ $product->qty }} Items
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-black font-black border-r-4 border-black">
                                        Rp {{ number_format($product->price, 2, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 border-r-4 border-black">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 bg-pink-300 border-2 border-black rounded-full flex items-center justify-center text-black font-black text-xs shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                                                {{ substr($product->user->name ?? 'U', 0, 1) }}
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-black text-black uppercase">{{ $product->user->name ?? 'Unknown' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 flex gap-2 justify-center">
                                        <a href="{{ route('product.show', $product->id) }}" class="p-2 bg-sky-300 text-black border-2 border-black rounded-xl hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all duration-200" title="View Details">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z" /><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" /></svg>
                                        </a>
                                        @can('update', $product)
                                        <div class="inline-block hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all rounded-xl">
                                            <x-edit-product :url="route('product.edit', $product->id)" />
                                        </div>
                                        @endcan
                                        @can('delete', $product)
                                        <div class="inline-block hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all rounded-xl">
                                            <x-delete-product :url="route('product.delete', $product->id)" />
                                        </div>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center bg-indigo-50 border-t-4 border-black">
                                        <div class="flex flex-col items-center justify-center text-black">
                                            <svg class="h-12 w-12 mb-4 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            <p class="text-lg font-black uppercase">No products found</p>
                                            <p class="text-sm mt-1 font-bold">Get started by creating a new product.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
