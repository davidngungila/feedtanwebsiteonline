<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodi ya Utawala ya Dodoso</title>
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
                            <h1 class="text-gray-900 text-xl font-manrope font-bold">Bodi ya Utawala ya Uchunguzi wa Feedtan</h1>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('dodoso.survey.export') }}" 
                           class="btn-primary text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Export CSV</span>
                        </a>
                        <a href="{{ route('dodoso.survey.index') }}" 
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
                <h2 class="font-manrope text-2xl font-bold gradient-text mb-6">Muhtasari wa Takwimu</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Total Responses -->
                    <div class="glass-effect rounded-xl p-6 stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-600 text-sm font-medium">Jumla ya Majibu</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($stats['total_responses']) }}</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Service Demand -->
                    <div class="glass-effect rounded-xl p-6 stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-600 text-sm font-medium">Wanaotaka Usafirishaji</p>
                                <p class="text-2xl font-bold text-gray-900 mt-2">
                                    {{ $stats['delivery_service_demand']['yes'] }} / {{ $stats['total_responses'] }}
                                </p>
                                <p class="text-xs text-gray-500">{{ $stats['total_responses'] > 0 ? round(($stats['delivery_service_demand']['yes'] / $stats['total_responses']) * 100, 1) : 0 }}%</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Top Product Category -->
                    <div class="glass-effect rounded-xl p-6 stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-600 text-sm font-medium">Kategoria ya Juu</p>
                                <p class="text-lg font-bold text-gray-900 mt-2">
                                    @php
                                        $topCategory = collect($stats['product_demand'])->sortDesc()->take(1)->keys()->first();
                                        $topCategoryLabel = [
                                            'vyakula' => 'Vyakula',
                                            'vinywaji' => 'Vinywaji',
                                            'bidhaa_za_usafi' => 'Bidhaa za Usafi',
                                            'bidhaa_za_watoto' => 'Bidhaa za Watoto',
                                            'snacks' => 'Snacks',
                                            'skincare_products' => 'Skincare'
                                        ][$topCategory] ?? 'N/A';
                                    @endphp
                                    {{ $topCategoryLabel }}
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Unique Hard to Find Products -->
                    <div class="glass-effect rounded-xl p-6 stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-red-600 text-sm font-medium">Zisizopatikana Kirahisi</p>
                                <p class="text-lg font-bold text-gray-900 mt-2">
                                    {{ count(array_unique($stats['hard_to_find_products'])) }}
                                </p>
                                <p class="text-xs text-gray-500">Bidhaa za kipekee</p>
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
                <!-- Delivery Service Chart -->
                <div class="glass-effect rounded-xl p-6">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4">Mahitaji ya Huduma ya Usafirishaji</h3>
                    <canvas id="deliveryChart" width="400" height="300"></canvas>
                </div>

                <!-- Product Demand Chart -->
                <div class="glass-effect rounded-xl p-6">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4">Mahitaji ya Bidhaa kwa Kategoria</h3>
                    <canvas id="productChart" width="400" height="300"></canvas>
                </div>
            </div>

            <!-- Hard to Find Products -->
            <div class="glass-effect rounded-xl p-6 mb-8">
                <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4">Bidhaa Zisizopatikana Kirahisi (Top 10)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @php
                        $hardToFindCounts = array_count_values($stats['hard_to_find_products']);
                        arsort($hardToFindCounts);
                        $topHardToFind = array_slice($hardToFindCounts, 0, 10, true);
                    @endphp
                    @forelse($topHardToFind as $product => $count)
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="font-medium text-gray-900">{{ $product }}</p>
                            <p class="text-sm text-gray-500">Imetajwa {{ $count }} mara</p>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-500 py-8">
                            <p>Hakuna bidhaa zisizopatikana kirahisi zilizoripotiwa bado</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Products to Sell -->
            <div class="glass-effect rounded-xl p-6 mb-8">
                <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4">Bidhaa Wateja Wanazotaka Kuuza (Top 10)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @php
                        $productsToSellCounts = array_count_values($stats['products_to_sell']);
                        arsort($productsToSellCounts);
                        $topProductsToSell = array_slice($productsToSellCounts, 0, 10, true);
                    @endphp
                    @forelse($topProductsToSell as $product => $count)
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="font-medium text-gray-900">{{ $product }}</p>
                            <p class="text-sm text-gray-500">Imetajwa {{ $count }} mara</p>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-500 py-8">
                            <p>Hakuna bidhaa za kuuzwa zilizoripotiwa bado</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Responses Table -->
            <div class="glass-effect rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900">Majibu ya Uchunguzi ya Hivi Karibuni</h3>
                    <p class="text-sm text-gray-500 mt-1">Inaonyesha majibu {{ $surveys->count() }} ya hivi karibuni</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nambari</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jina</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Simu</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Eneo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usafirishaji</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bidhaa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tarehe</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($surveys as $survey)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ str_pad($survey->id, 6, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $survey->customer_name ?? 'Hujajitambulisha' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $survey->customer_phone ?? 'Haijapatikana' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $survey->customer_location ?? 'Haijapatikana' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($survey->wants_delivery_service) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                            {{ $survey->wants_delivery_service_label }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ count($survey->frequently_purchased_products ?? []) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $survey->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="mt-2 text-lg font-medium">Hakuna majibu ya uchunguzi yaliyopatikana</p>
                                        <p class="mt-1">Anza kukusanya maoni ya wateja.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if($surveys->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Inaonyesha <span class="font-medium">{{ $surveys->firstItem() ?? 0 }}</span> hadi 
                                <span class="font-medium">{{ $surveys->lastItem() ?? 0 }}</span> ya 
                                <span class="font-medium">{{ $surveys->total() }}</span> matokeo
                            </div>
                            <div>
                                {{ $surveys->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Delivery Service Chart
        const deliveryCtx = document.getElementById('deliveryChart').getContext('2d');
        const deliveryData = [{{ $stats['delivery_service_demand']['yes'] ?? 0 }}, {{ $stats['delivery_service_demand']['no'] ?? 0 }}];
        const totalDelivery = deliveryData.reduce((a, b) => a + b, 0);
        
        new Chart(deliveryCtx, {
            type: 'pie',
            data: {
                labels: ['Wanataka Usafirishaji', 'Hawataki Usafirishaji'],
                datasets: [{
                    data: totalDelivery > 0 ? deliveryData : [1, 0],
                    backgroundColor: ['#10B981', '#EF4444'],
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
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = totalDelivery > 0 ? context.raw : 0;
                                const total = totalDelivery > 0 ? totalDelivery : 1;
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        // Product Demand Chart
        const productCtx = document.getElementById('productChart').getContext('2d');
        const productData = [
            {{ $stats['product_demand']['vyakula'] ?? 0 }},
            {{ $stats['product_demand']['vinywaji'] ?? 0 }},
            {{ $stats['product_demand']['bidhaa_za_usafi'] ?? 0 }},
            {{ $stats['product_demand']['bidhaa_za_watoto'] ?? 0 }},
            {{ $stats['product_demand']['snacks'] ?? 0 }},
            {{ $stats['product_demand']['skincare_products'] ?? 0 }}
        ];
        
        // Ensure no invalid values (NaN, Infinity, etc.)
        const cleanProductData = productData.map(val => isFinite(val) && val >= 0 ? val : 0);
        const maxProductValue = Math.max(...cleanProductData, 1);
        
        new Chart(productCtx, {
            type: 'bar',
            data: {
                labels: ['Vyakula', 'Vinywaji', 'Bidhaa za Usafi', 'Bidhaa za Watoto', 'Snacks', 'Skincare'],
                datasets: [{
                    label: 'Mahitaji ya Bidhaa',
                    data: cleanProductData,
                    backgroundColor: ['#3B82F6', '#10B981', '#F59E0B', '#8B5CF6', '#EF4444', '#EC4899'],
                    borderColor: ['#2563EB', '#059669', '#D97706', '#6D28D9', '#DC2626', '#DB2777'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: Math.ceil(maxProductValue * 1.1), // Add 10% padding
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.dataset.label || '';
                                const value = context.parsed.y;
                                return `${label}: ${value}`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
