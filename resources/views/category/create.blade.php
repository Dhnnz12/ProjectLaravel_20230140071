<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-3xl text-black uppercase tracking-tight">
                {{ __('Create Category') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-indigo-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Neubrutalist Card -->
            <div class="bg-white border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] overflow-hidden">
                <div class="px-8 py-6 border-b-4 border-black bg-purple-300">
                    <h3 class="text-2xl font-black text-black uppercase tracking-wider">Category Details</h3>
                    <p class="text-black font-bold text-sm mt-1 uppercase">Enter information to create a new category.</p>
                </div>

                <div class="p-10">
                    <form method="POST" action="{{ route('category.store') }}" novalidate>
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <!-- Category Name Input -->
                            <div class="col-span-2">
                                <label for="name" class="block text-sm font-black text-black uppercase mb-2">Category Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                    class="block w-full px-4 py-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] focus:ring-0 focus:border-black font-bold transition-all duration-300 {{ $errors->has('name') ? 'border-red-500' : '' }}" 
                                    placeholder="E.g. Electronics" required>
                                @error('name') 
                                    <p class="text-red-500 text-xs font-black uppercase mt-2">{{ $message }}</p> 
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-10 pt-6 border-t-4 border-black">
                            <a href="{{ route('category.index') }}" class="mr-4 inline-flex items-center px-6 py-3 bg-white border-2 border-black text-black font-black uppercase tracking-wider rounded-xl hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all focus:outline-none">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-8 py-3 bg-purple-300 border-2 border-black text-black font-black uppercase tracking-wider rounded-xl hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all focus:outline-none">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                  <path stroke-linecap="square" stroke-linejoin="miter" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Create Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
