<div class="p-6 space-y-6" wire:poll.5s="loadData">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fa-solid fa-chart-simple mr-2 text-blue-600"></i>Hasil Pemilihan
        </h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center">
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mr-4">
                <i class="fa-solid fa-users text-blue-600 text-lg"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Total User</p>
                <p class="text-2xl font-bold text-gray-800">{{ $totalUsers }}</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center">
            <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center mr-4">
                <i class="fa-solid fa-check-circle text-emerald-600 text-lg"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Sudah Memilih</p>
                <p class="text-2xl font-bold text-emerald-600">{{ $voted }}</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center">
            <div class="w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center mr-4">
                <i class="fa-solid fa-hourglass-half text-rose-600 text-lg"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Belum Memilih</p>
                <p class="text-2xl font-bold text-rose-600">{{ $notVoted }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100">
        <h2 class="text-lg font-bold text-gray-800 mb-6">Perolehan Suara</h2>
        
        <div class="flex gap-4">
            
            <div class="flex flex-col justify-between h-64 pb-8 text-xs text-gray-400 font-medium text-right w-8">
                @foreach($chartSteps as $step)
                    <span>{{ $step }}</span>
                @endforeach
                <span>0</span>
            </div>

            <div class="relative flex-1 h-64 border-b border-gray-200">
                
                <div class="absolute inset-0 flex flex-col justify-between pointer-events-none pb-8 z-0">
                    @foreach($chartSteps as $step)
                        <div class="w-full h-px border-t border-dashed border-gray-200"></div>
                    @endforeach
                    <div class="h-0"></div> 
                </div>

                <div class="absolute inset-0 flex items-end justify-around gap-2 px-2 z-10">
                    @forelse($candidates as $candidate)
                        <div class="relative w-full flex flex-col items-center group h-full justify-end pb-0">
                            
                            <div class="mb-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bottom-[{{ $candidate['height'] }}%] text-xs font-bold text-gray-700 bg-white shadow-sm border px-2 py-0.5 rounded-lg mb-2">
                                Jumlah Suara: {{ $candidate['votes'] }}
                            </div>
                            
                            <div class="{{ $candidate['color_class'] }} w-full max-w-[40px] rounded-t-md transition-all duration-1000 ease-out shadow-sm hover:opacity-90 relative group-hover:shadow-md"
                                 style="height: {{ $candidate['height'] }}%;">
                            </div>
                            
                            <div class="absolute top-full mt-2 w-full">
                                <p class="text-[10px] font-bold text-gray-500 text-center leading-tight truncate px-1">
                                    {{ $candidate['name'] }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="w-full h-full flex items-center justify-center">
                            <p class="text-gray-400 text-sm">Data tidak tersedia</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 flex flex-col">
            <h2 class="text-lg font-bold text-gray-800 mb-6">Persentase Suara</h2>

            <div class="flex-grow flex flex-col items-center justify-center">
                @if($totalVotes > 0)
                    <div class="relative w-48 h-48 rounded-full shadow-inner mb-8 transition-all duration-1000"
                         style="background: conic-gradient({{ $pieChartGradient }})">
                    </div>

                    <div class="w-full grid grid-cols-2 gap-3">
                        @foreach($candidates as $candidate)
                            <div class="flex items-center p-2 rounded-lg hover:bg-gray-50 transition">
                                <div class="w-3 h-3 rounded-full {{ $candidate['color_class'] }} mr-3 shadow-sm"></div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-700">{{ $candidate['name'] }}</span>
                                    <span class="text-xs text-gray-500">{{ $candidate['percentage'] }}% ({{ $candidate['votes'] }})</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-10 text-gray-400">
                        <div class="w-48 h-48 bg-gray-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fa-solid fa-chart-pie text-4xl text-gray-300"></i>
                        </div>
                        <p>Menunggu suara masuk...</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>