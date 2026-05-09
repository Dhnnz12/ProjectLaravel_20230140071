<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-3xl text-black uppercase tracking-tight">
                {{ __('About Me') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- 1. Identity Banner (Profile Header) -->
            <div class="bg-sky-300 border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] p-8 flex flex-col md:flex-row items-center justify-between transition-transform hover:-translate-y-1 hover:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] duration-300">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="w-24 h-24 bg-white border-4 border-black rounded-2xl flex items-center justify-center text-5xl font-black text-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                        {{ strtoupper(substr($data->nama, 0, 1)) }}
                    </div>
                    <div class="text-center md:text-left">
                        <h1 class="text-4xl font-black text-black uppercase mb-2">{{ $data->nama }}</h1>
                        <p class="text-black font-bold text-lg uppercase tracking-widest">{{ $data->prodi }}</p>
                    </div>
                </div>
                <div class="mt-6 md:mt-0">
                    <div class="px-6 py-3 bg-yellow-300 border-2 border-black text-black font-black uppercase tracking-wider rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                        Student ID: {{ $data->nim }}
                    </div>
                </div>
            </div>

            <!-- 2. Personal Details Grid (Stats Card Style) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Email Card -->
                <div class="bg-pink-300 border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] p-6 transition-transform hover:-translate-y-1 hover:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-black text-black uppercase">Email</h3>
                        <div class="p-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                            <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>
                    <p class="text-xl font-black text-black break-all">{{ $data->email }}</p>
                    <a href="mailto:{{ $data->email }}" class="mt-6 inline-block font-bold text-black border-b-2 border-black hover:text-white hover:bg-black transition-colors">Send Email &rarr;</a>
                </div>

                <!-- Phone Card -->
                <div class="bg-purple-300 border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] p-6 transition-transform hover:-translate-y-1 hover:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-black text-black uppercase">Phone</h3>
                        <div class="p-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                            <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                    </div>
                    <p class="text-2xl font-black text-black">{{ $data->telepon }}</p>
                    <p class="mt-6 font-bold text-black opacity-70 italic">Call or WhatsApp</p>
                </div>

                <!-- Location Card -->
                <div class="bg-green-300 border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] p-6 transition-transform hover:-translate-y-1 hover:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-black text-black uppercase">Location</h3>
                        <div class="p-3 bg-white border-2 border-black rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                            <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                    </div>
                    <p class="text-2xl font-black text-black">{{ $data->alamat }}</p>
                    <p class="mt-6 font-bold text-black opacity-70 italic">Yogyakarta, Indonesia</p>
                </div>
            </div>
            
            <!-- 3. Biography Section (Quick Tips Style) -->
            <div class="bg-white border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] p-8 relative overflow-hidden transition-transform hover:-translate-y-1 hover:shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] duration-300">
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-indigo-300 rounded-full border-4 border-black opacity-50"></div>
                <h3 class="text-2xl font-black text-black uppercase mb-6 relative z-10">📖 Biography</h3>
                <div class="relative z-10">
                    <p class="text-xl font-bold text-black leading-relaxed italic">
                        "{{ $data->bio }}"
                    </p>
                </div>
            </div>

            <!-- 4. Interests & Socials -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Interests -->
                <div class="bg-yellow-300 border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] p-6">
                    <h3 class="text-2xl font-black text-black uppercase mb-4">🎯 Interests</h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach(explode(',', $data->hobi) as $hobi)
                            <span class="px-4 py-2 bg-white border-2 border-black text-black font-black uppercase text-xs rounded-xl shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                                {{ trim($hobi) }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- Connect Socials -->
                <div class="bg-black border-4 border-black rounded-2xl shadow-[8px_8px_0px_0px_rgba(79,70,229,1)] p-6 flex flex-col justify-center">
                    <h3 class="text-2xl font-black text-white uppercase mb-6">🔗 Connect with Me</h3>
                    <div class="flex gap-4">
                        @if($data->github_url)
                        <a href="{{ $data->github_url }}" target="_blank" class="flex-1 px-4 py-3 bg-white border-2 border-black text-black text-center font-black uppercase text-xs rounded-xl hover:bg-yellow-300 transition-colors">
                            GitHub
                        </a>
                        @endif
                        @if($data->linkedin_url)
                        <a href="{{ $data->linkedin_url }}" target="_blank" class="flex-1 px-4 py-3 bg-indigo-500 border-2 border-black text-white text-center font-black uppercase text-xs rounded-xl hover:bg-white hover:text-black transition-colors">
                            LinkedIn
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Footer Action -->
            <div class="text-center pt-8">
                <button onclick="window.print()" class="px-10 py-4 bg-black text-white font-black uppercase tracking-widest rounded-xl hover:bg-indigo-600 transition-all hover:-translate-y-1 hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] shadow-xl">
                    Print Full Profile
                </button>
            </div>

        </div>
    </div>
</x-app-layout>