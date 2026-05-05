<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-3xl text-black uppercase tracking-tight">
                {{ __('Category List') }}
            </h2>
            <div class="flex gap-3">
                <a href="{{ route('category.create') }}" class="inline-flex items-center px-4 py-2 bg-sky-300 border-2 border-black text-black font-bold uppercase tracking-wider rounded-xl hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all focus:outline-none">
                    <svg class="-ml-1 mr-2 w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    New Category
                </a>
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
                    <h3 class="text-xl font-black text-black uppercase tracking-wider">All Categories</h3>
                </div>
                
                <div class="p-0 overflow-x-auto">
                    <table class="w-full text-left table-auto whitespace-nowrap border-collapse">
                        <thead>
                            <tr class="bg-sky-200 text-black text-sm font-black uppercase tracking-wider border-b-4 border-black">
                                <th class="px-6 py-4 border-r-4 border-black w-16 text-center">No.</th>
                                <th class="px-6 py-4 border-r-4 border-black">Category Name</th>
                                <th class="px-6 py-4 border-r-4 border-black">Total Products</th>
                                <th class="px-6 py-4 w-32 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y-4 divide-black">
                            @forelse($categories as $category)
                                <tr class="hover:bg-gray-100 transition-colors duration-200 group">
                                    <td class="px-6 py-4 text-black font-bold border-r-4 border-black text-center">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 font-black text-black border-r-4 border-black">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 bg-purple-300 border-2 border-black rounded-full flex items-center justify-center mr-4 group-hover:-translate-y-1 transition-transform duration-300 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                                                <span class="text-black font-black text-sm uppercase">{{ substr($category->name, 0, 1) }}</span>
                                            </div>
                                            <span class="uppercase">{{ $category->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 border-r-4 border-black">
                                        <span class="inline-flex items-center px-3 py-1 border-2 border-black rounded-lg text-xs font-black uppercase shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] bg-orange-300 text-black">
                                            {{ $category->products_count }} {{ Str::plural('Product', $category->products_count) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 flex gap-2 justify-center">
                                        <a href="{{ route('category.edit', $category->id) }}" class="p-2 bg-sky-300 text-black border-2 border-black rounded-xl hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all duration-200" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="square" stroke-linejoin="miter" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                        </a>
                                        <form action="{{ route('category.delete', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-red-400 text-black border-2 border-black rounded-xl hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all duration-200" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="square" stroke-linejoin="miter" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center bg-indigo-50 border-t-4 border-black">
                                        <div class="flex flex-col items-center justify-center text-black">
                                            <svg class="h-12 w-12 mb-4 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            <p class="text-lg font-black uppercase">No categories found</p>
                                            <p class="text-sm mt-1 font-bold">Get started by creating a new category.</p>
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
