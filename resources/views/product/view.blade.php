<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-3xl text-black uppercase tracking-tight">
                {{ __('Product Detail') }}
            </h2>
            <div class="flex gap-3">
                <a href="{{ route('product.index') }}" class="inline-flex items-center px-4 py-2 bg-white border-2 border-black text-black font-bold uppercase tracking-wider rounded-xl hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all focus:outline-none">
                    <svg class="-ml-1 mr-2 w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" d="M15 19l-7-7 7-7"></path></svg>
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-indigo-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] overflow-hidden">
                <!-- Header -->
                <div class="px-8 py-6 border-b-4 border-black bg-sky-300 flex justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-black text-black uppercase tracking-wider">{{ $product->name }}</h3>
                        <p class="text-black font-bold text-sm mt-1 uppercase">Product ID: #{{ $product->id }}</p>
                    </div>
                    <div class="flex gap-2">
                        <x-edit-product :url="route('product.edit', $product->id)" />
                        <x-delete-product :url="route('product.delete', $product->id)" />
                    </div>
                </div>

                <div class="p-0">
                    <!-- Details Grid -->
                    <div class="divide-y-4 divide-black">
                        <!-- Quantity -->
                        <div class="flex justify-between items-center p-6 bg-white">
                            <span class="text-black font-black uppercase tracking-wide">Stock Quantity</span>
                            <span class="px-4 py-2 bg-green-300 border-2 border-black rounded-xl text-sm font-black uppercase shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                                {{ $product->qty }} Items Available
                            </span>
                        </div>

                        <!-- Price -->
                        <div class="flex justify-between items-center p-6 bg-indigo-50">
                            <span class="text-black font-black uppercase tracking-wide">Unit Price</span>
                            <span class="text-3xl font-black text-black">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>

                        <!-- Owner -->
                        <div class="flex justify-between items-center p-6 bg-white">
                            <span class="text-black font-black uppercase tracking-wide">Assigned Owner</span>
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-pink-300 border-2 border-black rounded-full flex items-center justify-center text-black font-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                                    {{ strtoupper(substr($product->user->name ?? '?', 0, 1)) }}
                                </div>
                                <span class="text-black font-black uppercase">{{ $product->user->name ?? 'Unknown' }}</span>
                            </div>
                        </div>

                        <!-- Timestamps -->
                        <div class="grid grid-cols-2 divide-x-4 divide-black">
                            <div class="p-6 bg-indigo-50">
                                <p class="text-xs font-black uppercase text-gray-600 mb-1">Created At</p>
                                <p class="text-black font-bold italic">{{ $product->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            <div class="p-6 bg-indigo-50">
                                <p class="text-xs font-black uppercase text-gray-600 mb-1">Last Updated</p>
                                <p class="text-black font-bold italic">{{ $product->updated_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
