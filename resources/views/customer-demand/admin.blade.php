<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Demand Admin Dashboard - Dodoso</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Lato', sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 50%, #bbf7d0 100%);
            min-height: 100vh;
        }
        
        .font-manrope {
            font-family: 'Manrope', sans-serif;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #10b981, #059669);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #10b981, #059669);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #059669, #10b981);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }
        
        .stat-card {
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body>
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <h1 class="text-gray-900 text-xl font-manrope font-bold">Customer Demand Dashboard</h1>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('customer-demand.export') }}" 
                           class="btn-primary text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Export CSV</span>
                        </a>
                        <a href="{{ route('customer-demand.index') }}" 
                           class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition">
                            Home
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Statistics Overview -->
            <div class="mb-8">
                <h2 class="font-manrope text-2xl font-bold gradient-text mb-6">Statistics Overview</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Total Responses -->
                    <div class="glass-effect rounded-xl p-6 stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-600 text-sm font-medium">Total Responses</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($stats['total_responses']) }}</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Gender Distribution -->
                    <div class="glass-effect rounded-xl p-6 stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-600 text-sm font-medium">Male vs Female</p>
                                <p class="text-2xl font-bold text-gray-900 mt-2">
                                    {{ $stats['gender_distribution']['male'] ?? 0 }} : {{ $stats['gender_distribution']['female'] ?? 0 }}
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Top Product -->
                    <div class="glass-effect rounded-xl p-6 stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-600 text-sm font-medium">Top Product</p>
                                <p class="text-lg font-bold text-gray-900 mt-2">
                                    @php
                                        $topProduct = collect($stats['product_demand'])->sortDesc()->take(1)->keys()->first();
                                        $topProductLabel = [
                                            'food_products' => 'Chakula',
                                            'beverages' => 'Vinywaji',
                                            'cosmetics' => 'Vipodozi',
                                            'household_items' => 'Vifaa vya nyumbani'
                                        ][$topProduct] ?? 'N/A';
                                    @endphp
                                    {{ $topProductLabel }}
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Top Challenge -->
                    <div class="glass-effect rounded-xl p-6 stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-red-600 text-sm font-medium">Top Challenge</p>
                                <p class="text-lg font-bold text-gray-900 mt-2">
                                    @php
                                        $topChallenge = collect($stats['top_challenges'])->take(1)->keys()->first();
                                    @endphp
                                    {{ $topChallenge ?? 'N/A' }}
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Gender Distribution Chart -->
                <div class="glass-effect rounded-xl p-6">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4">Gender Distribution</h3>
                    <canvas id="genderChart" width="400" height="300"></canvas>
                </div>

                <!-- Age Distribution Chart -->
                <div class="glass-effect rounded-xl p-6">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4">Age Distribution</h3>
                    <canvas id="ageChart" width="400" height="300"></canvas>
                </div>

                <!-- Product Demand Chart -->
                <div class="glass-effect rounded-xl p-6">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4">Product Demand</h3>
                    <canvas id="productChart" width="400" height="300"></canvas>
                </div>

                <!-- Price Preferences Chart -->
                <div class="glass-effect rounded-xl p-6">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4">Price Preferences</h3>
                    <canvas id="priceChart" width="400" height="300"></canvas>
                </div>
            </div>

            <!-- Recent Responses Table -->
            <div class="glass-effect rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900">Recent Responses</h3>
                    <p class="text-sm text-gray-500 mt-1">Showing latest {{ $demands->count() }} responses</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Frequency</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price Range</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($demands as $demand)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ str_pad($demand->id, 6, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $demand->gender_label }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $demand->age_group_label }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $demand->location }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $demand->purchase_frequency_label }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $demand->price_range_label }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $demand->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="mt-2 text-lg font-medium">No responses found</p>
                                        <p class="mt-1">Start collecting customer demand data.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if($demands->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Showing <span class="font-medium">{{ $demands->firstItem() ?? 0 }}</span> to 
                                <span class="font-medium">{{ $demands->lastItem() ?? 0 }}</span> of 
                                <span class="font-medium">{{ $demands->total() }}</span> results
                            </div>
                            <div>
                                {{ $demands->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Gender Chart
        const genderCtx = document.getElementById('genderChart').getContext('2d');
        new Chart(genderCtx, {
            type: 'pie',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [{{ $stats['gender_distribution']['male'] ?? 0 }}, {{ $stats['gender_distribution']['female'] ?? 0 }}],
                    backgroundColor: ['#3B82F6', '#EC4899'],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Age Chart
        const ageCtx = document.getElementById('ageChart').getContext('2d');
        new Chart(ageCtx, {
            type: 'bar',
            data: {
                labels: ['<18', '18-25', '26-35', '36+'],
                datasets: [{
                    label: 'Age Distribution',
                    data: [
                        {{ $stats['age_distribution']['<18'] ?? 0 }},
                        {{ $stats['age_distribution']['18-25'] ?? 0 }},
                        {{ $stats['age_distribution']['26-35'] ?? 0 }},
                        {{ $stats['age_distribution']['36+'] ?? 0 }}
                    ],
                    backgroundColor: '#10B981',
                    borderColor: '#059669',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Product Chart
        const productCtx = document.getElementById('productChart').getContext('2d');
        new Chart(productCtx, {
            type: 'bar',
            data: {
                labels: ['Chakula', 'Vinywaji', 'Vipodozi', 'Vifaa vya nyumbani'],
                datasets: [{
                    label: 'Product Demand',
                    data: [
                        {{ $stats['product_demand']['food_products'] ?? 0 }},
                        {{ $stats['product_demand']['beverages'] ?? 0 }},
                        {{ $stats['product_demand']['cosmetics'] ?? 0 }},
                        {{ $stats['product_demand']['household_items'] ?? 0 }}
                    ],
                    backgroundColor: ['#8B5CF6', '#3B82F6', '#EC4899', '#F59E0B'],
                    borderColor: ['#6D28D9', '#2563EB', '#DB2777', '#D97706'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Price Chart
        const priceCtx = document.getElementById('priceChart').getContext('2d');
        new Chart(priceCtx, {
            type: 'doughnut',
            data: {
                labels: ['Chini sana', 'Wastani', 'Juu kidogo'],
                datasets: [{
                    data: [
                        {{ $stats['price_preferences']['very_low'] ?? 0 }},
                        {{ $stats['price_preferences']['average'] ?? 0 }},
                        {{ $stats['price_preferences']['slightly_high'] ?? 0 }}
                    ],
                    backgroundColor: ['#EF4444', '#F59E0B', '#10B981'],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>
