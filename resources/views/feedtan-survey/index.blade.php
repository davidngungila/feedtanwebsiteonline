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
        
        .feature-card {
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
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
            <div class="max-w-6xl mx-auto">
                <!-- Header Section -->
                <div class="text-center mb-12">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h1 class="font-manrope text-4xl sm:text-5xl font-bold gradient-text mb-4">
                        DUKA LA KISASA LA FEEDTAN
                    </h1>
                    <h2 class="font-manrope text-2xl font-semibold text-gray-700 mb-6">
                        Dodoso
                    </h2>
                    <div class="max-w-3xl mx-auto">
                        <p class="font-lato text-lg text-gray-600">
                            Feedtan inapanga kuanzisha duka la kisima (Feedtan Mini Supermarket) litakalowawezesha wanachama kupata bidhaa bora kwa bei nafuu, kuagiza wakiwa mahali popote (huduma ya usafirishaji), na pia kutoa fursa kwa wanachama kuuza bidhaa zao kupitia duka hili.
                        </p>
                        <p class="font-lato text-lg text-gray-600">
                            Lengo letu ni kuboresha upatikanaji wa bidhaa muhimu, kupunguza gharama, na kuongeza fursa za kipato kwa wanachama wote.
                        </p>
                    </div>
                </div>

                <!-- Survey Benefits -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="glass-effect rounded-xl p-6 feature-card">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2 text-center">Bidhaa Bora bei Nafuu</h3>
                        <p class="text-sm text-gray-600 text-center">Pata bidhaa za hali ya juu kwa bei zinazofaa</p>
                    </div>
                    
                    <div class="glass-effect rounded-xl p-6 feature-card">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2 text-center">Huduma ya Usafirishaji</h3>
                        <p class="text-sm text-gray-600 text-center">Pokea bidhaa zako mahali popote ulipo</p>
                    </div>
                    
                    <div class="glass-effect rounded-xl p-6 feature-card">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2 text-center">Fursa ya Kuuza</h3>
                        <p class="text-sm text-gray-600 text-center">Uweza kuuza bidhaa zao kupitia duka letu</p>
                    </div>
                </div>

                <!-- Main Call to Action -->
                <div class="glass-effect rounded-2xl p-8 sm:p-12 text-center mb-12">
                    <div class="max-w-2xl mx-auto">
                        <h2 class="font-manrope text-3xl font-bold gradient-text mb-6">
                            Tafadhali jaza uchunguzi huu fupi
                        </h2>
                        <p class="font-lato text-lg text-gray-600 mb-8">
                            Ili kutusaidia kuelewa ni bidhaa zipi zina uhitaji mkubwa na jinsi ya kuboresha huduma hii. 🙏
                        </p>
                        
                        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                            <a href="{{ route('dodoso.survey.create') }}" 
                               class="btn-primary text-white px-8 py-4 rounded-xl font-semibold text-lg flex items-center justify-center space-x-3 shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>Anza Kujaza Dodoso</span>
                            </a>
                            
                           
                        </div>
                    </div>
                </div>

                <!-- Survey Preview -->
                <div class="glass-effect rounded-xl p-8">
                    <h3 class="font-manrope text-2xl font-bold gradient-text mb-6 text-center">
                        Uchunguzi Utakuwa Na Sehemu Hizi:
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-green-600 font-bold text-sm">1</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Bidhaa Unazonunua Mara Nyingi</h4>
                                    <p class="text-sm text-gray-600">Vyakula, vinywaji, bidhaa za usafi, bidhaa za watoto, snacks, skincare products</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-green-600 font-bold text-sm">2</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Huduma ya Usafirishaji</h4>
                                    <p class="text-sm text-gray-600">Je, ungependa kupokea bidhaa zako mahali popote?</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-green-600 font-bold text-sm">3</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Jedwali la Uchunguzi</h4>
                                    <p class="text-sm text-gray-600">Maelezo ya kila bidhaa unayonunua mara nyingi</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-green-600 font-bold text-sm">4</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Bidhaa Zisizopatikana Kirahisi</h4>
                                    <p class="text-sm text-gray-600">Ni bidhaa gani zinahitajika lakini vigumu kupata</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-green-600 font-bold text-sm">5</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Bidhaa za Kuuza</h4>
                                    <p class="text-sm text-gray-600">Ni bidhaa gani ungependa kuuza kupitia duka letu</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-green-600 font-bold text-sm">6</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Mapendekezo Mengine</h4>
                                    <p class="text-sm text-gray-600">Maoni yoyote kuhusu wazo hili la duka</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="mt-16 text-center">
                    <div class="glass-effect rounded-xl p-6">
                        <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-4">
                            Kwa mawasiliano zaidi
                        </h3>
                        <p class="font-lato text-gray-600 mb-4">
                            Ikiwa una maswali yoyote kuhusu Duka la Kisima la Feedtan, tafadhali wasiliana nasi
                        </p>
                        <div class="flex flex-col sm:flex-row justify-center items-center space-y-2 sm:space-y-0 sm:space-x-6">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-sm font-medium">feedtan15@gmail.com</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span class="text-sm font-medium">+255717358865</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
