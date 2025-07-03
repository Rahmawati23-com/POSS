<x-filament::page>
    @php
        // Pastikan $orderCounts adalah array yang valid
        $orderCounts = $orderCounts ?? [];
        
        // Array nama bulan
        $monthNames = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];
        
        // Buat labels untuk bulan
        $labels = collect(array_keys($orderCounts))
            ->map(function($monthNumber) use ($monthNames) {
                return $monthNames[$monthNumber] ?? "Month $monthNumber";
            })
            ->toArray();

        // Ambil data values
        $data = array_values($orderCounts);
        
        // Pastikan ada data default jika kosong
        if (empty($labels) || empty($data)) {
            $labels = array_values($monthNames);
            $data = array_fill(0, 12, 0);
        }
    @endphp

    {{-- Statistik Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Total Order Card --}}
        <div class="fi-wi-stats-overview-stat relative overflow-hidden rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
            <div class="flex items-center gap-3">
                <div class="flex-1">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Order</div>
                    <div class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ number_format($totalOrders ?? 0) }}
                    </div>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-primary-50 dark:bg-primary-400/10">
                    <svg class="h-6 w-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Testimoni Card --}}
        <div class="fi-wi-stats-overview-stat relative overflow-hidden rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
            <div class="flex items-center gap-3">
                <div class="flex-1">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Testimoni</div>
                    <div class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ number_format($totalTestimoni ?? 0) }}
                    </div>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-warning-50 dark:bg-warning-400/10">
                    <svg class="h-6 w-6 text-warning-600 dark:text-warning-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Order Bulan Ini Card --}}
        <div class="fi-wi-stats-overview-stat relative overflow-hidden rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
            <div class="flex items-center gap-3">
                <div class="flex-1">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Order Bulan Ini</div>
                    <div class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ number_format(array_sum($data)) }}
                    </div>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-success-50 dark:bg-success-400/10">
                    <svg class="h-6 w-6 text-success-600 dark:text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Rata-rata per Bulan Card --}}
        <div class="fi-wi-stats-overview-stat relative overflow-hidden rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
            <div class="flex items-center gap-3">
                <div class="flex-1">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Rata-rata/Bulan</div>
                    <div class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ number_format(count($data) > 0 ? array_sum($data) / count($data) : 0, 1) }}
                    </div>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-info-50 dark:bg-info-400/10">
                    <svg class="h-6 w-6 text-info-600 dark:text-info-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart Widget --}}
    <div class="fi-wi-chart rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Grafik Order per Bulan</h3>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-md bg-primary-50 px-2 py-1 text-xs font-medium text-primary-700 ring-1 ring-inset ring-primary-700/10 dark:bg-primary-400/10 dark:text-primary-400 dark:ring-primary-400/20">
                    Total: {{ array_sum($data) }}
                </span>
            </div>
        </div>
        
        <div class="relative h-80">
            <canvas id="orderChart"></canvas>
        </div>
    </div>

    {{-- Data untuk Chart --}}
    <script type="application/json" id="chart-data">
        {
            "labels": {!! json_encode($labels) !!},
            "data": {!! json_encode($data) !!}
        }
    </script>

    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('orderChart');
            
            if (!ctx) {
                console.error('Canvas element not found');
                return;
            }

            // Destroy existing chart if exists
            if (window.orderChart instanceof Chart) {
                window.orderChart.destroy();
            }

            // Ambil data dari JSON script tag
            let chartData;
            try {
                const chartDataElement = document.getElementById('chart-data');
                chartData = JSON.parse(chartDataElement.textContent);
            } catch (error) {
                console.error('Error parsing chart data:', error);
                chartData = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                };
            }

            const labels = chartData.labels;
            const data = chartData.data;

            // Deteksi dark mode
            const isDarkMode = document.documentElement.classList.contains('dark') || 
                              document.body.classList.contains('dark') ||
                              window.matchMedia('(prefers-color-scheme: dark)').matches;

            const textColor = isDarkMode ? '#f3f4f6' : '#374151';
            const gridColor = isDarkMode ? '#374151' : '#e5e7eb';

            // Konfigurasi chart
            const config = {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Order',
                        data: data,
                        backgroundColor: 'rgba(59, 130, 246, 0.8)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1,
                        borderRadius: 8,
                        borderSkipped: false,
                        hoverBackgroundColor: 'rgba(59, 130, 246, 0.9)',
                        hoverBorderColor: 'rgba(59, 130, 246, 1)',
                        hoverBorderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: false
                        },
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                color: textColor,
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: isDarkMode ? 'rgba(17, 24, 39, 0.9)' : 'rgba(255, 255, 255, 0.9)',
                            titleColor: textColor,
                            bodyColor: textColor,
                            borderColor: 'rgba(59, 130, 246, 1)',
                            borderWidth: 1,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    return `${context.dataset.label}: ${context.parsed.y} order`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: textColor,
                                font: {
                                    size: 11
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: gridColor,
                                borderDash: [2, 2]
                            },
                            ticks: {
                                color: textColor,
                                stepSize: 1,
                                font: {
                                    size: 11
                                },
                                callback: function(value) {
                                    return Number.isInteger(value) ? value : '';
                                }
                            }
                        }
                    },
                    animation: {
                        duration: 800,
                        easing: 'easeInOutQuart'
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    }
                }
            };

            try {
                window.orderChart = new Chart(ctx, config);
            } catch (error) {
                console.error('Error creating chart:', error);
            }
        });

        // Cleanup saat halaman di-unmount
        window.addEventListener('beforeunload', function() {
            if (window.orderChart instanceof Chart) {
                window.orderChart.destroy();
            }
        });
    </script>
</x-filament::page>