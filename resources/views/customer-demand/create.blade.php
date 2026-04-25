<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Demand Assessment Form - Dodoso</title>
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
                        Customer Demand Assessment Form
                    </h1>
                    <p class="font-lato text-lg text-gray-600">
        Tafadhali jibu maswali haya kusaidia kutambua mahitaji ya wateja
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

                <!-- Assessment Form -->
                <form action="{{ route('customer-demand.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Section A: Taarifa za Mteja -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">A. Taarifa za Mteja</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Gender -->
                            <div>
                                <label class="block text-sm font-manrope font-semibold text-gray-700 mb-3">
                                    Jinsia <span class="text-red-500">*</span>
                                </label>
                                <div class="space-y-2">
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="gender" value="male" required class="mr-3 text-green-600">
                                        <span class="font-medium">Me</span>
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="gender" value="female" required class="mr-3 text-green-600">
                                        <span class="font-medium">Ke</span>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Age Group -->
                            <div>
                                <label class="block text-sm font-manrope font-semibold text-gray-700 mb-3">
                                    Umri <span class="text-red-500">*</span>
                                </label>
                                <div class="space-y-2">
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="age_group" value="<18" required class="mr-3 text-green-600">
                                        <span class="font-medium">&lt;18</span>
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="age_group" value="18-25" required class="mr-3 text-green-600">
                                        <span class="font-medium">18–25</span>
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="age_group" value="26-35" required class="mr-3 text-green-600">
                                        <span class="font-medium">26–35</span>
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="age_group" value="36+" required class="mr-3 text-green-600">
                                        <span class="font-medium">36+</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Location -->
                        <div class="mt-6">
                            <label for="location" class="block text-sm font-manrope font-semibold text-gray-700 mb-2">
                                Eneo unapoishi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="location" name="location" required
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors"
                                   placeholder="Andika eneo lako">
                        </div>
                    </div>

                    <!-- Section B: Tabia ya Ununuzi -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">B. Tabia ya Ununuzi</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Purchase Frequency -->
                            <div>
                                <label class="block text-sm font-manrope font-semibold text-gray-700 mb-3">
                                    Unanunua bidhaa hizi mara ngapi? <span class="text-red-500">*</span>
                                </label>
                                <div class="space-y-2">
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="purchase_frequency" value="daily" required class="mr-3 text-green-600">
                                        <span class="font-medium">Kila siku</span>
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="purchase_frequency" value="weekly" required class="mr-3 text-green-600">
                                        <span class="font-medium">Kila wiki</span>
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="purchase_frequency" value="occasionally" required class="mr-3 text-green-600">
                                        <span class="font-medium">Mara chache</span>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Current Purchase Place -->
                            <div>
                                <label class="block text-sm font-manrope font-semibold text-gray-700 mb-3">
                                    Unanunua wapi kwa sasa? <span class="text-red-500">*</span>
                                </label>
                                <div class="space-y-2">
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="current_purchase_place" value="market" required class="mr-3 text-green-600">
                                        <span class="font-medium">Sokoni</span>
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="current_purchase_place" value="nearby_store" required class="mr-3 text-green-600">
                                        <span class="font-medium">Duka jirani</span>
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                        <input type="radio" name="current_purchase_place" value="online" required class="mr-3 text-green-600">
                                        <span class="font-medium">Online</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section C: Mahitaji ya Bidhaa -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">C. Mahitaji ya Bidhaa</h2>
                        </div>
                        
                        <div class="mb-6">
                            <p class="font-medium text-gray-700 mb-4">Chagua bidhaa unazohitaji zaidi:</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                    <input type="checkbox" name="food_products" value="1" class="mr-3 checkbox-custom">
                                    <div>
                                        <p class="font-medium">Chakula (mchele, unga)</p>
                                        <p class="text-sm text-gray-500">Bidhaa za msingi za chakula</p>
                                    </div>
                                </label>
                                
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                    <input type="checkbox" name="beverages" value="1" class="mr-3 checkbox-custom">
                                    <div>
                                        <p class="font-medium">Vinywaji</p>
                                        <p class="text-sm text-gray-500">Maji, juisi, vinywaji vingine</p>
                                    </div>
                                </label>
                                
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                    <input type="checkbox" name="cosmetics" value="1" class="mr-3 checkbox-custom">
                                    <div>
                                        <p class="font-medium">Vipodozi</p>
                                        <p class="text-sm text-gray-500">Mafuta, sabuni, vipodozi vingine</p>
                                    </div>
                                </label>
                                
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                    <input type="checkbox" name="household_items" value="1" class="mr-3 checkbox-custom">
                                    <div>
                                        <p class="font-medium">Vifaa vya nyumbani</p>
                                        <p class="text-sm text-gray-500">Vifaa vya usafi na vyombo</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Additional Products -->
                        <div>
                            <label for="additional_products" class="block text-sm font-manrope font-semibold text-gray-700 mb-2">
                                Ni bidhaa gani ungependa zipatikane zaidi?
                            </label>
                            <textarea id="additional_products" name="additional_products" rows="3"
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors"
                                      placeholder="Andika bidhaa unazotaka zaidi..."></textarea>
                        </div>
                    </div>

                    <!-- Section D: Bei -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">D. Bei</h2>
                        </div>
                        
                        <!-- Price Range -->
                        <div class="mb-6">
                            <label class="block text-sm font-manrope font-semibold text-gray-700 mb-3">
                                Bei ipi ni nafuu kwako kwa bidhaa nyingi? <span class="text-red-500">*</span>
                            </label>
                            <div class="space-y-2">
                                <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                    <input type="radio" name="price_range" value="very_low" required class="mr-3 text-green-600">
                                    <span class="font-medium">Chini sana</span>
                                </label>
                                <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                    <input type="radio" name="price_range" value="average" required class="mr-3 text-green-600">
                                    <span class="font-medium">Wastani</span>
                                </label>
                                <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                    <input type="radio" name="price_range" value="slightly_high" required class="mr-3 text-green-600">
                                    <span class="font-medium">Juu kidogo (bora quality)</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Price Example -->
                        <div>
                            <label for="price_example" class="block text-sm font-manrope font-semibold text-gray-700 mb-2">
                                Mfano: Unga wa kg 1 unapaswa kuwa shilingi ngapi?
                            </label>
                            <input type="number" id="price_example" name="price_example" step="0.01" min="0"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors"
                                   placeholder="Andika bei ya mfano">
                        </div>
                    </div>

                    <!-- Section E: Changamoto -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">E. Changamoto</h2>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-manrope font-semibold text-gray-700 mb-3">
                                Ni changamoto gani unapata kwa maduka ya sasa? <span class="text-red-500">*</span>
                            </label>
                            <div class="space-y-2">
                                <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                    <input type="checkbox" name="challenges[]" value="high_price" class="mr-3 checkbox-custom">
                                    <span class="font-medium">Bei kubwa</span>
                                </label>
                                <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                    <input type="checkbox" name="challenges[]" value="poor_quality" class="mr-3 checkbox-custom">
                                    <span class="font-medium">Ubora mbaya</span>
                                </label>
                                <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                    <input type="checkbox" name="challenges[]" value="difficult_availability" class="mr-3 checkbox-custom">
                                    <span class="font-medium">Upatikanaji mgumu</span>
                                </label>
                                <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-green-300 cursor-pointer transition-colors">
                                    <input type="checkbox" name="challenges[]" value="poor_service" class="mr-3 checkbox-custom">
                                    <span class="font-medium">Huduma mbaya</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Section F: Maoni ya Ziada -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8 form-section">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-2xl font-semibold text-gray-900">F. Maoni ya Ziada</h2>
                        </div>
                        
                        <div>
                            <label for="additional_comments" class="block text-sm font-manrope font-semibold text-gray-700 mb-2">
                                Maoni yoyote ya ziada?
                            </label>
                            <textarea id="additional_comments" name="additional_comments" rows="4"
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors"
                                      placeholder="Andika maoni yako hapa..."></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit" 
                                class="btn-primary text-white px-12 py-4 rounded-xl font-semibold text-lg flex items-center space-x-3 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Wasilisha Fomu</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
