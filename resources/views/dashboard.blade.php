<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-3xl text-black uppercase tracking-tight">
                {{ __('Dashboard Overview') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Welcome Banner -->
            <div class="bg-sky-300 border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] p-8 flex flex-col md:flex-row items-center justify-between transition-transform hover:-translate-y-1 hover:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] duration-300">
                <div>
                    <h1 class="text-4xl font-black text-black uppercase mb-2">Welcome Back, {{ Auth::user()->name }}! 👋</h1>
                    <p class="text-black font-bold text-lg">Here's what's happening with your inventory today.</p>
                </div>
                <div class="mt-6 md:mt-0">
                    <a href="{{ route('product.create') }}" class="inline-flex items-center px-6 py-3 bg-yellow-300 border-2 border-black text-black font-black uppercase tracking-wider rounded-xl hover:-translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:translate-y-0 active:shadow-none transition-all focus:outline-none">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" d="M12 4v16m8-8H4"></path></svg>
                        Add New Product
                    </a>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Products Stat Card -->
                <div class="bg-pink-300 border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] p-6 transition-transform hover:-translate-y-1 hover:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-black text-black uppercase">Total Products</h3>
                        <div class="p-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                            <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        </div>
                    </div>
                    <p class="text-6xl font-black text-black">{{ $productCount ?? 0 }}</p>
                    <a href="{{ route('product.index') }}" class="mt-6 inline-block font-bold text-black border-b-2 border-black hover:text-white hover:bg-black transition-colors">View All Products &rarr;</a>
                </div>

                <!-- Categories Stat Card -->
                <div class="bg-purple-300 border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] p-6 transition-transform hover:-translate-y-1 hover:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-black text-black uppercase">Categories</h3>
                        <div class="p-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                            <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                    </div>
                    <p class="text-6xl font-black text-black">{{ $categoryCount ?? 0 }}</p>
                    @can('admin-only')
                    <a href="{{ route('category.index') }}" class="mt-6 inline-block font-bold text-black border-b-2 border-black hover:text-white hover:bg-black transition-colors">Manage Categories &rarr;</a>
                    @else
                    <p class="mt-6 font-bold text-black opacity-70">Read Only Access</p>
                    @endcan
                </div>

                <!-- System Status Card -->
                <div class="bg-green-300 border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] p-6 transition-transform hover:-translate-y-1 hover:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-black text-black uppercase">System Status</h3>
                        <div class="p-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                            <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <div class="w-4 h-4 bg-green-500 border-2 border-black rounded-full animate-pulse mr-3"></div>
                        <p class="text-xl font-black text-black uppercase">Online & Active</p>
                    </div>
                    <p class="mt-6 font-bold text-black">Role: {{ Auth::user()->role }}</p>
                </div>
            </div>
            
            <!-- Quick Tips Section -->
            <div class="bg-white border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] p-6 relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-yellow-300 rounded-full border-4 border-black opacity-50"></div>
                <h3 class="text-2xl font-black text-black uppercase mb-4 relative z-10">🚀 Quick Tips</h3>
                <ul class="space-y-3 relative z-10 font-bold text-black">
                    <li class="flex items-center"><span class="w-2 h-2 bg-black mr-3"></span> Use the Products tab to manage inventory levels.</li>
                    @can('admin-only')
                    <li class="flex items-center"><span class="w-2 h-2 bg-black mr-3"></span> As an admin, you can create new categories for better organization.</li>
                    @endcan
                    <li class="flex items-center"><span class="w-2 h-2 bg-black mr-3"></span> Explore the About Me page to know more about the developer.</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
