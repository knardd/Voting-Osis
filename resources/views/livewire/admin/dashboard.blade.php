<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Hasil Pemilihan</h1>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-4 rounded-xl shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fa-solid fa-users text-blue-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total User</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fa-solid fa-check-circle text-green-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Sudah Memilih</p>
                    <p class="text-2xl font-bold text-green-600">{{ $voted }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-md">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fa-solid fa-clock text-red-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Belum Memilih</p>
                    <p class="text-2xl font-bold text-red-600">{{ $notVoted }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts (Statik via Alpine.js atau render di backend) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold mb-4">Perolehan Suara</h2>
            <div class="space-y-3">
                @foreach($candidateNames as $index => $name)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>{{ $name }}</span>
                            <span>{{ $voteCounts[$index] }} suara</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" 
                                 style="width: {{ $totalVotes ? ($voteCounts[$index] / $totalVotes * 100) : 0 }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold mb-4">Persentase Suara</h2>
            @foreach($candidateNames as $index => $name)
                <div class="flex items-center justify-between py-2">
                    <span>{{ $name }}</span>
                    <span class="font-medium">{{ $percentages[$index] }}%</span>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- Opsional: tambahkan Chart.js jika ingin grafik interaktif --}}
@endpush