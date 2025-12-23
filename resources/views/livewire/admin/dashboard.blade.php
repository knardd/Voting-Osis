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

<!-- Chart Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Bar Chart: Perolehan Suara -->
        <div wire:ignore class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold mb-4 text-gray-800">Perolehan Suara</h2>
            <div class="relative" style="height: 300px;">
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <!-- Pie Chart: Persentase Suara -->
        <div wire:ignore class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold mb-4 text-gray-800">Persentase Suara</h2>
            <div class="relative" style="height: 300px;">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('livewire:init', () => {
        let barChartInstance = null;
        let pieChartInstance = null;

        function initCharts() {
            // Data dari Livewire
            const labels = @json($candidateNames);
            const votes = @json($voteCounts);
            const percentages = @json($percentages);

            // Warna dinamis untuk setiap kandidat
            const colors = [
                'rgba(59, 130, 246, 0.8)',   // Blue
                'rgba(239, 68, 68, 0.8)',    // Red
                'rgba(34, 197, 94, 0.8)',    // Green
                'rgba(251, 146, 60, 0.8)',   // Orange
                'rgba(168, 85, 247, 0.8)',   // Purple
            ];

            const borderColors = [
                'rgba(59, 130, 246, 1)',
                'rgba(239, 68, 68, 1)',
                'rgba(34, 197, 94, 1)',
                'rgba(251, 146, 60, 1)',
                'rgba(168, 85, 247, 1)',
            ];

            // === BAR CHART ===
            const barCtx = document.getElementById('barChart');
            if (barCtx) {
                if (barChartInstance) barChartInstance.destroy();

                barChartInstance = new Chart(barCtx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Suara',
                            data: votes,
                            backgroundColor: colors,
                            borderColor: borderColors,
                            borderWidth: 2,
                            borderRadius: 8,
                            borderSkipped: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                titleFont: { size: 14, weight: 'bold' },
                                bodyFont: { size: 13 },
                                callbacks: {
                                    label: function(context) {
                                        return 'Suara: ' + context.parsed.y;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0,
                                    font: { size: 12 }
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                ticks: {
                                    font: { size: 12 }
                                },
                                grid: {
                                    display: false
                                }
                            }
                        },
                        animation: {
                            duration: 1000,
                            easing: 'easeInOutQuart'
                        }
                    }
                });
            }

            // === PIE CHART ===
            const pieCtx = document.getElementById('pieChart');
            if (pieCtx) {
                if (pieChartInstance) pieChartInstance.destroy();

                pieChartInstance = new Chart(pieCtx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: votes,
                            backgroundColor: colors,
                            borderColor: '#ffffff',
                            borderWidth: 3,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 15,
                                    font: { size: 12 },
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                titleFont: { size: 14, weight: 'bold' },
                                bodyFont: { size: 13 },
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.parsed;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        return label + ': ' + value + ' (' + percentage + '%)';
                                    }
                                }
                            }
                        },
                        animation: {
                            animateRotate: true,
                            animateScale: true,
                            duration: 1000
                        }
                    }
                });
            }
        }

        // Inisialisasi pertama kali (delay untuk memastikan DOM ready)
        setTimeout(initCharts, 100);

        // ✅ LIVEWIRE 3: Update chart saat data berubah
        document.addEventListener('refresh-charts', () => {
            setTimeout(initCharts, 50);
        });
    });
</script>
@endpush