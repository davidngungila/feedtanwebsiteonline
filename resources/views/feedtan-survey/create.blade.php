<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodoso - DUKA LA KISASA LA FEEDTAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        
        .shape {
            position: absolute;
            opacity: 0.05;
        }
        
        .shape-1 {
            width: 300px;
            height: 300px;
            background: #10b981;
            border-radius: 50%;
            top: -150px;
            right: -150px;
            animation: float 6s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 200px;
            height: 200px;
            background: #34d399;
            border-radius: 50%;
            bottom: -100px;
            left: -100px;
            animation: float 8s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
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
        
        .form-section {
            transition: all 0.3s ease;
        }
        
        .form-section:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .checkbox-custom {
            transition: all 0.3s ease;
        }
        
        .checkbox-custom:checked {
            background-color: #10b981;
            border-color: #10b981;
        }
        
        .survey-table-row {
            transition: all 0.3s ease;
        }
        
        .survey-table-row:hover {
            background-color: rgba(16, 185, 129, 0.05);
        }
    </style>
</head>
<body>
    <div class="min-h-screen relative">
        <!-- Floating Background Shapes -->
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
        
        <div class="relative z-10 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <!-- Header Section -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-full mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h1 class="font-manrope text-3xl sm:text-4xl font-bold gradient-text mb-4">
                        DUKA LA KISASA LA FEEDTAN
                    </h1>
                    <h2 class="font-manrope text-2xl font-semibold text-gray-700 mb-4">
                       Dodoso
                    </h2>
                    <p class="font-lato text-lg text-gray-600">
                        Tafadhali jaza uchunguzi huu fupi ili kutusaidia kuelewa ni bidhaa zipi zina uhitaji mkubwa na jinsi ya kuboresha huduma hii. 🙏
                    </p>
                </div>

                @if(session('success'))
                    <div class="glass-effect rounded-xl p-4 mb-6 border-l-4 border-green-500">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-green-800 font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Survey Form -->
                <form action="{{ route('dodoso.survey.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    
                    <!-- Section 1: Frequently Purchased Products -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">1. Ni bidhaa zipi unazonunua mara nyingi kwa matumizi ya kila siku?</h2>
                        </div>
                        
                        <div class="space-y-3">
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                <input type="checkbox" name="frequently_purchased_products[]" value="vyakula" class="mr-3 checkbox-custom">
                                <div>
                                    <p class="font-medium text-gray-900">Vyakula (mchele, unga, mafuta, sukari, mayai, mkate)</p>
                                </div>
                            </label>
                            
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                <input type="checkbox" name="frequently_purchased_products[]" value="vinywaji" class="mr-3 checkbox-custom">
                                <div>
                                    <p class="font-medium text-gray-900">Vinywaji (soda, juice, maji)</p>
                                </div>
                            </label>
                            
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                <input type="checkbox" name="frequently_purchased_products[]" value="bidhaa_za_usafi" class="mr-3 checkbox-custom">
                                <div>
                                    <p class="font-medium text-gray-900">Bidhaa za usafi (sabuni, dawa ya meno, detergent, tissue)</p>
                                </div>
                            </label>
                            
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                <input type="checkbox" name="frequently_purchased_products[]" value="bidhaa_za_watoto" class="mr-3 checkbox-custom">
                                <div>
                                    <p class="font-medium text-gray-900">Bidhaa za Watoto (diapers, maziwa ya Watoto, babywipes, babysoap & oil)</p>
                                </div>
                            </label>
                            
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                <input type="checkbox" name="frequently_purchased_products[]" value="snacks" class="mr-3 checkbox-custom">
                                <div>
                                    <p class="font-medium text-gray-900">Snacks (biscuit, chocolates, pipi, crips, karanga, korosho)</p>
                                </div>
                            </label>
                            
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                <input type="checkbox" name="frequently_purchased_products[]" value="skincare_products" class="mr-3 checkbox-custom">
                                <div>
                                    <p class="font-medium text-gray-900">Skincare products (lotion, cleanser, showergel, facewash, shampoo)</p>
                                </div>
                            </label>
                            
                            <div class="flex items-center p-4 border-2 border-gray-200 rounded-lg">
                                <input type="text" name="frequently_purchased_products_other" 
                                       class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors"
                                       placeholder="Nyingine: andika bidhaa zako hapa">
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Delivery Service -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">2. Je, ungependa huduma ya delivery?</h2>
                        </div>
                        
                        <div class="space-y-3">
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                <input type="radio" name="wants_delivery_service" value="1" class="mr-3">
                                <span class="font-medium text-gray-900">Ndiyo</span>
                            </label>
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                <input type="radio" name="wants_delivery_service" value="0" class="mr-3">
                                <span class="font-medium text-gray-900">Hapana</span>
                            </label>
                        </div>
                    </div>

                    <!-- Section 3: Survey Table -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">3. Jedwali la Bidhaa unazotumia Mara kwa Mara</h2>
                        </div>
                        
                        <!-- Desktop/Tablet View - Table Layout -->
                        <div class="hidden lg:block overflow-x-auto">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-medium text-gray-900">Na.</th>
                                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-medium text-gray-900">Bidhaa</th>
                                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-medium text-gray-900">Unanunua mara ngapi kwa wiki</th>
                                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-medium text-gray-900">Kila ukinunua, unanua kiasi gani?</th>
                                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-medium text-gray-900">Je unamapendekezo mengine kuhusu bidhaa hii?</th>
                                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-medium text-gray-900">Ondoa</th>
                                    </tr>
                                </thead>
                                <tbody id="surveyTableBody">
                                    <tr class="survey-table-row" data-row-index="1">
                                        <td class="border border-gray-300 px-4 py-3 text-center">1</td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[0][product]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="Andika bidhaa">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[0][frequency_per_week]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="mf: 2-3">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[0][quantity_per_purchase]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="mf: 1 kg, 2 viti">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[0][suggestions]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="Mapendekezo yako">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3 text-center">
                                            <button type="button" onclick="removeProductRow(0)" 
                                                    class="text-red-500 hover:text-red-700 text-sm font-medium">
                                                        Ondoa
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="survey-table-row" data-row-index="1">
                                        <td class="border border-gray-300 px-4 py-3 text-center">2</td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[1][product]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="Andika bidhaa">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[1][frequency_per_week]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="mf: 2-3">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[1][quantity_per_purchase]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="mf: 1 kg, 2 viti">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[1][suggestions]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="Mapendekezo yako">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3 text-center">
                                            <button type="button" onclick="removeProductRow(1)" 
                                                    class="text-red-500 hover:text-red-700 text-sm font-medium">
                                                        Ondoa
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="survey-table-row" data-row-index="2">
                                        <td class="border border-gray-300 px-4 py-3 text-center">3</td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[2][product]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="Andika bidhaa">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[2][frequency_per_week]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="mf: 2-3">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[2][quantity_per_purchase]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="mf: 1 kg, 2 viti">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[2][suggestions]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="Mapendekezo yako">
                                        </td>
                                    </tr>
                                    <tr class="survey-table-row">
                                        <td class="border border-gray-300 px-4 py-3 text-center">4</td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[3][product]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="Andika bidhaa">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[3][frequency_per_week]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="mf: 2-3">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[3][quantity_per_purchase]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="mf: 1 kg, 2 viti">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[3][suggestions]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="Mapendekezo yako">
                                        </td>
                                    </tr>
                                    <tr class="survey-table-row">
                                        <td class="border border-gray-300 px-4 py-3 text-center">5</td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[4][product]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="Andika bidhaa">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[4][frequency_per_week]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="mf: 2-3">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[4][quantity_per_purchase]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="mf: 1 kg, 2 viti">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3">
                                            <input type="text" name="survey_table_data[4][suggestions]" 
                                                   class="w-full px-3 py-2 border border-gray-200 rounded focus:border-green-500 focus:outline-none"
                                                   placeholder="Mapendekezo yako">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Mobile View - Card Layout -->
                        <div class="lg:hidden space-y-6" id="mobileProductCards">
                            <!-- Product 1 -->
                            <div class="bg-white rounded-lg border border-gray-200 p-4 shadow-sm" data-row-index="0">
                                <div class="mb-4">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">Bidhaa #1</span>
                                        <button type="button" onclick="removeProductRow(0)" 
                                                class="text-red-500 hover:text-red-700 text-sm font-medium">
                                                    Ondoa
                                        </button>
                                    </div>
                                    <div class="space-y-3">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Jina la Bidhaa</label>
                                            <input type="text" name="survey_table_data[0][product]" 
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                                                   placeholder="Andika bidhaa">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Unanunua mara ngapi kwa wiki</label>
                                            <input type="text" name="survey_table_data[0][frequency_per_week]" 
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                                                   placeholder="mf: 2-3">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Kila ukinunua, unanua kiasi gani?</label>
                                            <input type="text" name="survey_table_data[0][quantity_per_purchase]" 
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                                                   placeholder="mf: 1 kg, 2 viti">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Mapendekezo yako</label>
                                            <input type="text" name="survey_table_data[0][suggestions]" 
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                                                   placeholder="Mapendekezo yako">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add More Products Button -->
                            <div class="text-center mt-6">
                                <button type="button" onclick="addProductRow()" 
                                        class="btn-primary px-6 py-3 rounded-lg font-medium flex items-center justify-center space-x-2 mx-auto">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8l8 8-4-4-6 6"></path>
                                    </svg>
                                    <span>Ongeza Bidhaa</span>
                                </button>
                            </div>
                            
                            <!-- Section 4: Hard to Find Products -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">4. Ni bidhaa gani moja unadhani inahitajika sana lakini haipatikani kirahisi?</h2>
                        </div>
                        
                        <div>
                            <textarea id="hard_to_find_product" name="hard_to_find_product" rows="3"
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors"
                                      placeholder="Andika bidhaa inayohitajika lakini ngumu kupata..."></textarea>
                        </div>
                    </div>

                    <!-- Section 5: Products to Sell -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">5. Je, una bidhaa yeyote ambayo ungependa iuzwe kwenye duka la feedtan? (itaje)</h2>
                        </div>
                        
                        <div>
                            <textarea id="products_to_sell" name="products_to_sell" rows="3"
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors"
                                      placeholder="Andika bidhaa unazotaka kuuza kupitia duka letu..."></textarea>
                        </div>
                    </div>

                    <!-- Section 6: Additional Suggestions -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">6. Je una mapendekezo yoyote kuhusu wazo hili la duka?</h2>
                        </div>
                        
                        <div>
                            <textarea id="additional_suggestions" name="additional_suggestions" rows="4"
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors"
                                      placeholder="Andika maoni au mapendekezo yako yoyote kuhusu duka la Feedtan Mini Supermarket..."></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit" 
                                class="btn-primary text-white px-12 py-4 rounded-xl font-semibold text-lg flex items-center space-x-3 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Wasilisha Dodoso</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            // Check if at least one frequently purchased product is selected
            const checkboxes = document.querySelectorAll('input[name="frequently_purchased_products[]"]:checked');
            const otherInput = document.querySelector('input[name="frequently_purchased_products_other"]').value.trim();
            
            if (checkboxes.length === 0 && !otherInput) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Bidhaa Zinazohitajika',
                    text: 'Tafadhali chagua angalau bidhaa moja unayonunua mara nyingi.',
                    confirmButtonColor: '#10b981'
                });
                return;
            }
            
            // Check if delivery service is selected
            const deliveryOptions = document.querySelectorAll('input[name="wants_delivery_service"]:checked');
            if (deliveryOptions.length === 0) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Huduma ya Delivery',
                    text: 'Tafadhali jibu swali la huduma ya delivery.',
                    confirmButtonColor: '#10b981'
                });
                return;
            }
        });

        // Auto-save functionality (optional)
        let autoSaveTimer;
        const form = document.querySelector('form');
        
        form.addEventListener('input', function() {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(function() {
                // Save form data to localStorage
                const formData = new FormData(form);
                const data = {};
                for (let [key, value] of formData.entries()) {
                    if (!data[key]) {
                        data[key] = value;
                    } else if (Array.isArray(data[key])) {
                        data[key].push(value);
                    } else {
                        data[key] = [data[key], value];
                    }
                }
                localStorage.setItem('feedtanSurveyDraft', JSON.stringify(data));
                console.log('Form auto-saved');
            }, 30000); // Auto-save after 30 seconds of inactivity
        });

        // Restore draft data on page load
        window.addEventListener('load', function() {
            const draftData = localStorage.getItem('feedtanSurveyDraft');
            if (draftData) {
                const data = JSON.parse(draftData);
                // Restore form fields
                Object.keys(data).forEach(function(key) {
                    const input = document.querySelector(`[name="${key}"]`);
                    if (input) {
                        input.value = data[key];
                    }
                });
            }
        });
        
        // Auto-save functionality
        let autoSaveTimer;
        const inputs = document.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                clearTimeout(autoSaveTimer);
                autoSaveTimer = setTimeout(() => {
                    saveFormData();
                }, 2000); // Save 2 seconds after user stops typing
            });
        });
        
        function saveFormData() {
            const formData = new FormData(document.querySelector('form'));
            const data = {};
            
            for (let [key, value] of formData.entries()) {
                if (key.startsWith('survey_table_data')) {
                    if (!data[key]) {
                        data[key] = [];
                    }
                    if (Array.isArray(data[key])) {
                        data[key].push(value);
                    } else {
                        data[key] = [data[key], value];
                    }
                } else {
                    data[key] = value;
                }
                });
            }
        });
    </script>
</body>
</html>
