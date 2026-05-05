<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-3xl text-black uppercase tracking-tight">
                {{ __('Add New Product') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-indigo-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Neubrutalist Card -->
            <div class="bg-white border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] overflow-hidden">
                <div class="px-8 py-6 border-b-4 border-black bg-sky-300">
                    <h3 class="text-2xl font-black text-black uppercase tracking-wider">Product Details</h3>
                    <p class="text-black font-bold text-sm mt-1 uppercase">Enter information to create a new product inventory.</p>
                </div>

                <div class="p-10">
                    <form method="POST" action="{{ route('product.store') }}" novalidate>
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <!-- Product Name Input -->
                            <div class="col-span-2">
                                <label for="name" class="block text-sm font-black text-black uppercase mb-2">Product Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                    class="block w-full px-4 py-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] focus:ring-0 focus:border-black font-bold transition-all duration-300 {{ $errors->has('name') ? 'border-red-500' : '' }}" 
                                    placeholder="E.g. Wireless Noise-Cancelling Headphones" required>
                                @error('name') 
                                    <p class="text-red-500 text-xs font-black uppercase mt-2">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Quantity Input -->
                            <div>
                                <label for="qty" class="block text-sm font-black text-black uppercase mb-2">Stock Quantity <span class="text-red-500">*</span></label>
                                <input type="number" name="qty" id="qty" value="{{ old('qty') }}" 
                                    class="block w-full px-4 py-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] focus:ring-0 focus:border-black font-bold transition-all duration-300 {{ $errors->has('qty') ? 'border-red-500' : '' }}" 
                                    placeholder="0" required>
                                @error('qty') 
                                    <p class="text-red-500 text-xs font-black uppercase mt-2">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Price Input -->
                            <div>
                                <label for="price" class="block text-sm font-black text-black uppercase mb-2">Unit Price (Rp) <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-black font-black">
                                        <span>Rp</span>
                                    </div>
                                    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" 
                                        class="block w-full pl-12 pr-4 py-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] focus:ring-0 focus:border-black font-bold transition-all duration-300 {{ $errors->has('price') ? 'border-red-500' : '' }}" 
                                        placeholder="0.00" required>
                                </div>
                                @error('price') 
                                    <p class="text-red-500 text-xs font-black uppercase mt-2">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Owner Input -->
                            <div>
                                <label for="user_id" class="block text-sm font-black text-black uppercase mb-2">Owner / Assigner <span class="text-red-500">*</span></label>
                                <select name="user_id" id="user_id" 
                                    class="block w-full px-4 py-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] focus:ring-0 focus:border-black font-bold transition-all duration-300 {{ $errors->has('user_id') ? 'border-red-500' : '' }}" required>
                                    <option value="" disabled {{ old('user_id') ? '' : 'selected' }}>-- Select an Owner --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id') 
                                    <p class="text-red-500 text-xs font-black uppercase mt-2">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Category Input -->
                            <div>
                                <label for="category_id" class="block text-sm font-black text-black uppercase mb-2">Kategori <span class="text-red-500">*</span></label>
                                <select name="category_id" id="category_id" 
                                    class="block w-full px-4 py-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] focus:ring-0 focus:border-black font-bold transition-all duration-300 {{ $errors->has('category_id') ? 'border-red-500' : '' }}" required>
                                    <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') 
                                    <p class="text-red-500 text-xs font-black uppercase mt-2">{{ $message }}</p> 
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-10 pt-6 border-t-4 border-black">
                            <a href="{{ route('product.index') }}" class="mr-4 inline-flex items-center px-6 py-3 bg-white border-2 border-black text-black font-black uppercase tracking-wider rounded-xl hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all focus:outline-none">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-8 py-3 bg-sky-300 border-2 border-black text-black font-black uppercase tracking-wider rounded-xl hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all focus:outline-none">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                  <path stroke-linecap="square" stroke-linejoin="miter" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Create Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
