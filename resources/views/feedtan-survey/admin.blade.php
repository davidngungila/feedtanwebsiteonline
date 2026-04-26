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
                            <h1 class="text-gray-900 text-xl font-manrope font-bold">Dodoso La Duka La feedtan la Kisasa</h1>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('dodoso.survey.export') }}" 
                           class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-6 py-3 rounded-xl text-sm font-medium flex items-center space-x-3 hover:from-purple-700 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <span>Advanced Export</span>
                            <span class="bg-white/20 px-2 py-1 rounded-full text-xs">Analytics</span>
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

            <!-- Enhanced Analysis Section -->
            <div class="glass-effect rounded-xl p-6 mb-8">
                <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-6">Uchambuzaji wa Data</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Response Rate Analysis -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-4">
                        <h4 class="font-semibold text-blue-900 mb-3">Viwango vya Majibu</h4>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Wastani:</span>
                                <span class="font-bold text-blue-600">{{ now()->format('Y-m-d') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Jumla ya Majibu:</span>
                                <span class="font-bold text-blue-600">{{ number_format($stats['total_responses']) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Wastani wa Kwanza:</span>
                                <span class="font-bold text-blue-600">{{ now()->subDays(7)->format('Y-m-d') }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Delivery Service Insights -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-4">
                        <h4 class="font-semibold text-green-900 mb-3">Uchambuzi wa Usafirishaji</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Wanataka:</span>
                                <span class="font-bold text-green-600">{{ $stats['delivery_service_demand']['yes'] }}</span>
                                <span class="text-sm text-gray-600">({{ $stats['total_responses'] > 0 ? round(($stats['delivery_service_demand']['yes'] / $stats['total_responses']) * 100, 1) : 0 }}%)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Hawataki:</span>
                                <span class="font-bold text-red-600">{{ $stats['delivery_service_demand']['no'] }}</span>
                                <span class="text-sm text-gray-600">({{ $stats['total_responses'] > 0 ? round(($stats['delivery_service_demand']['no'] / $stats['total_responses']) * 100, 1) : 0 }}%)</span>
                            </div>
                            <div class="mt-3 p-3 bg-white rounded-lg">
                                <p class="text-xs text-gray-500">
                                    <strong>Uchambuzi:</strong> @if($stats['delivery_service_demand']['yes'] > $stats['delivery_service_demand']['no']) 
                                        <span class="text-green-600">Wengi wanataka huduma ya usafirishaji</span>
                                    @else 
                                        <span class="text-red-600">Wengi hawataki huduma ya usafirishaji</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Category Analysis -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-4">
                        <h4 class="font-semibold text-purple-900 mb-3">Uchambuzi wa Bidhaa</h4>
                        <div class="space-y-3">
                            @php
                                $totalProductDemand = array_sum($stats['product_demand']);
                                $sortedProducts = $stats['product_demand'];
                                arsort($sortedProducts);
                            @endphp
                            <div class="text-sm text-gray-600 mb-2">
                                <strong>Jumla ya Mahitaji:</strong> {{ number_format($totalProductDemand) }} mahitaji
                            </div>
                            <div class="space-y-2">
                                @foreach($sortedProducts as $category => $count)
                                    @if($count > 0)
                                        <div class="flex items-center justify-between p-2 bg-white rounded">
                                            <span class="text-xs">{{ [
                                                'vyakula' => 'Vyakula',
                                                'vinywaji' => 'Vinywaji', 
                                                'bidhaa_za_usafi' => 'Bidhaa za Usafi',
                                                'bidhaa_za_watoto' => 'Bidhaa za Watoto',
                                                'snacks' => 'Snacks',
                                                'skincare_products' => 'Skincare'
                                            ][$category] ?? $category }}</span>
                                            <div class="flex items-center space-x-2">
                                                <div class="text-xs text-gray-500">{{ $count }} mahitaji</div>
                                                <div class="w-20 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-purple-600 h-2 rounded-full" style="width: {{ $totalProductDemand > 0 ? ($count / $totalProductDemand) * 100 : 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- Market Insights -->
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-lg p-4">
                        <h4 class="font-semibold text-orange-900 mb-3">Fursa za Soko</h4>
                        <div class="space-y-3">
                            <div class="p-3 bg-white rounded-lg">
                                <p class="text-sm font-medium text-gray-900 mb-2">Bidhaa Zinazohitajika Sana</p>
                                <div class="space-y-1">
                                    @php
                                        $hardToFindCounts = array_count_values($stats['hard_to_find_products']);
                                        arsort($hardToFindCounts);
                                        $topHardToFind = array_slice($hardToFindCounts, 0, 3, true);
                                    @endphp
                                    @foreach($topHardToFind as $product => $count)
                                        <div class="flex items-center justify-between text-xs">
                                            <span class="text-gray-600">{{ $product }}</span>
                                            <span class="font-bold text-orange-600">{{ $count }} mara</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="p-3 bg-white rounded-lg">
                                <p class="text-sm font-medium text-gray-900 mb-2">Bidhaa Wateja Wanauza</p>
                                <div class="space-y-1">
                                    @php
                                        $productsToSellCounts = array_count_values($stats['products_to_sell']);
                                        arsort($productsToSellCounts);
                                        $topProductsToSell = array_slice($productsToSellCounts, 0, 3, true);
                                    @endphp
                                    @foreach($topProductsToSell as $product => $count)
                                        <div class="flex items-center justify-between text-xs">
                                            <span class="text-gray-600">{{ $product }}</span>
                                            <span class="font-bold text-orange-600">{{ $count }} mara</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <h3 class="font-manrope text-lg font-semibold text-gray-900">Majibu ya Uchunguzi wa Hivi Karibuni</h3>
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
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vitendo</th>
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
                                        {{ $survey->phone_number ?? 'Hajatoa nambari ya simu' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $survey->location ?? 'Hajatoa eneo lake' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ count($survey->frequently_purchased_products ?? []) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 max-w-xs">
                                        @php
                                            $tableData = $survey->survey_table_data_formatted ?? [];
                                            $tableDataText = [];
                                            foreach($tableData as $item) {
                                                if (!empty($item['product'])) {
                                                    $tableDataText[] = $item['product'] . ' (' . $item['frequency_per_week'] . ', ' . $item['quantity_per_purchase'] . ')';
                                                }
                                            }
                                            echo implode('<br>', $tableDataText);
                                        @endphp
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $survey->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <a href="{{ route('dodoso.survey.show', $survey->id) }}" 
                                           class="text-blue-600 hover:text-blue-800 text-xs font-medium">
                                            View More
                                        </a>
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
                            <div class="flex items-center space-x-4">
                                <div class="text-sm text-gray-600">
                                    Kila ukurasa: {{ request()->get('per_page', 50) }} majibu
                                </div>
                                <div>
                                    {{ $surveys->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    </body>
</html>
