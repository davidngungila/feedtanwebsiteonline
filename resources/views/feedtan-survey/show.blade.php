<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maelezo ya Dodoso #{{ $survey->id }}</title>
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
                            <h1 class="text-gray-900 text-xl font-manrope font-bold">Maelezo ya Dodoso #{{ $survey->id }}</h1>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('dodoso.survey.admin') }}" 
                           class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7 7m-7-7l-7 7m7-7v-8m0 0l-7 7m-7-7v-8"></path>
                            </svg>
                            Rudi kwa Admin
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Survey Details -->
            <div class="glass-effect rounded-xl p-6 mb-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-manrope text-2xl font-bold gradient-text">Maelezo Kamili ya Dodoso</h2>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Nambari:</span>
                        <span class="font-mono text-lg font-bold text-gray-900">#{{ str_pad($survey->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="bg-white rounded-lg p-6 mb-6">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0h2a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2h2a2 2 0 012 2v6a2 2 0 01-2 2h2a2 2 0 012 2v6a2 2 0 01-2 2z"></path>
                        </svg>
                        Maelezo ya Mteja
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jina Kamili</label>
                            <p class="text-gray-900 font-medium">{{ $survey->customer_name ?? 'Hajajitambulisha' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Namba ya Simu</label>
                            <p class="text-gray-900 font-medium">{{ $survey->customer_phone ?? 'Haijapatikana' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Barua pepe</label>
                            <p class="text-gray-900 font-medium">{{ $survey->customer_email ?? 'Haijapatikana' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mahali</label>
                            <p class="text-gray-900 font-medium">{{ $survey->customer_location ?? 'Haijapatikana' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Survey Responses -->
                <div class="bg-white rounded-lg p-6 mb-6">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h2a2 2 0 002-2m0 0V7a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Majibu ya Uchunguzi
                    </h3>
                    
                    <!-- Frequently Purchased Products -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-900 mb-3">Bidhaa Unazonunua Mara nyingi</h4>
                        <div class="flex flex-wrap gap-2">
                            @forelse($survey->frequently_purchased_products ?? [] as $product)
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                    {{ [
                                        'vyakula' => 'Vyakula',
                                        'vinywaji' => 'Vinywaji', 
                                        'bidhaa_za_usafi' => 'Bidhaa za Usafi',
                                        'bidhaa_za_watoto' => 'Bidhaa za Watoto',
                                        'snacks' => 'Snacks',
                                        'skincare_products' => 'Skincare'
                                    ][$product] ?? $product }}
                                </span>
                            @empty
                                <span class="text-gray-500">Hakuna bidhaa zilizotajwa</span>
                            @endforelse
                        </div>
                    </div>

                    <!-- Delivery Service -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-900 mb-3">Huduma ya Usafirishaji</h4>
                        <div class="flex items-center">
                            <span class="px-3 py-1 rounded-full text-sm font-medium
                                @if($survey->wants_delivery_service) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                {{ $survey->wants_delivery_service_label }}
                            </span>
                        </div>
                    </div>

                    <!-- Product Table Data -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-900 mb-3">Jedwali la Bidhaa</h4>
                        @if($survey->survey_table_data && count($survey->survey_table_data) > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full border border-gray-200 rounded-lg">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Na.</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Bidhaa</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Mara kwa wiki</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kiasi</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Mapendekezo</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($survey->survey_table_data as $index => $item)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-2 text-sm text-gray-900">{{ $index + 1 }}</td>
                                                <td class="px-4 py-2 text-sm text-gray-900">{{ $item['product'] ?? '' }}</td>
                                                <td class="px-4 py-2 text-sm text-gray-900">{{ $item['frequency_per_week'] ?? '' }}</td>
                                                <td class="px-4 py-2 text-sm text-gray-900">{{ $item['quantity_per_purchase'] ?? '' }}</td>
                                                <td class="px-4 py-2 text-sm text-gray-900">{{ $item['suggestions'] ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-gray-500">Hakuna data ya jedwali la bidhaa</p>
                        @endif
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="bg-white rounded-lg p-6 mb-6">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Maelezo ya Ziada
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Hard to Find Products -->
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-3">Bidhaa Zisizopatikana Kirahisi</h4>
                            <p class="text-gray-700 p-3 bg-gray-50 rounded-lg">
                                {{ $survey->hard_to_find_product ?? 'Hakuna bidhaa zilizotajwa' }}
                            </p>
                        </div>
                        
                        <!-- Products to Sell -->
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-3">Bidhaa Unazotaka Kuuza</h4>
                            <p class="text-gray-700 p-3 bg-gray-50 rounded-lg">
                                {{ $survey->products_to_sell ?? 'Hakuna bidhaa za kuuzwa zilizotajwa' }}
                            </p>
                        </div>
                    </div>
                    
                    <!-- Additional Suggestions -->
                    <div class="mt-6">
                        <h4 class="font-semibold text-gray-900 mb-3">Mapendekezo Mengine</h4>
                        <p class="text-gray-700 p-3 bg-gray-50 rounded-lg">
                            {{ $survey->additional_suggestions ?? 'Hakuna mapendekezo mengine yaliyotajwa' }}
                        </p>
                    </div>
                </div>

                <!-- Submission Info -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>Imewasilishwa: {{ $survey->created_at->format('d M, Y - H:i') }}</span>
                        <span>ID: #{{ str_pad($survey->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
