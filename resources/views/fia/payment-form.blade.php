<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Verification - {{ $member['name'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iosevka+Charon:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Manrope:wght@200..800&family=MonteCarlo&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --primary-green: #10b981;
            --dark-green: #059669;
            --light-green: #d1fae5;
            --accent-green: #34d399;
        }
        
        body {
            font-family: 'Lato', sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 50%, #bbf7d0 100%);
            min-height: 100vh;
        }
        
        .font-charon {
            font-family: 'Iosevka Charon', monospace;
        }
        
        .font-manrope {
            font-family: 'Manrope', sans-serif;
        }
        
        .font-monte {
            font-family: 'MonteCarlo', cursive;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--dark-green), var(--primary-green));
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }
        
        .input-focus {
            transition: all 0.3s ease;
        }
        
        .input-focus:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }
        
        .payment-option {
            transition: all 0.3s ease;
        }
        
        .payment-option:hover {
            transform: translateX(4px);
        }
        
        .payment-option.selected {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1));
            border-color: var(--primary-green);
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
            background: var(--primary-green);
            border-radius: 50%;
            top: -150px;
            right: -150px;
            animation: float 6s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 200px;
            height: 200px;
            background: var(--accent-green);
            border-radius: 50%;
            bottom: -100px;
            left: -100px;
            animation: float 8s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .amount-display {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-left: 4px solid var(--primary-green);
        }
        
        @media (max-width: 768px) {
            .mobile-stack {
                flex-direction: column;
                gap: 0.5rem;
            }
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.586-4L12 3l4 4m0 0l-4 4m4-4H7"></path>
                        </svg>
                    </div>
                    <h1 class="font-manrope text-3xl sm:text-4xl font-bold gradient-text mb-4">
                        Dodoso Payment Verification Form
                    </h1>
                    <p class="font-lato text-lg text-gray-600">
                        Please verify and submit your payment details
                    </p>
                </div>

                @if(session('success'))
                    <div class="glass-effect rounded-xl p-4 mb-6 border-l-4 border-green-500 card-shadow">
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

                <!-- Member Information Card -->
                <div class="glass-effect rounded-xl p-6 sm:p-8 mb-8 card-shadow">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h2 class="font-manrope text-xl font-semibold text-gray-900">Member Information</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Member ID</p>
                                <p class="font-charon font-semibold text-gray-900">{{ $memberId }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Member Name</p>
                                <p class="font-semibold text-gray-900">{{ $member['name'] }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Member Type</p>
                                <p class="font-semibold text-gray-900">{{ $member['type'] }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <p class="font-semibold text-gray-900">{{ $member['email'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Form -->
                <form action="{{ route('dodoso.submit') }}" method="POST" class="space-y-8">
                    @csrf
                    <input type="hidden" name="member_id" value="{{ $memberId }}">
                    <input type="hidden" name="member_name" value="{{ $member['name'] }}">
                    <input type="hidden" name="member_type" value="{{ $member['type'] }}">

                    <!-- Payment Details Card -->
                    <div class="glass-effect rounded-xl overflow-hidden card-shadow">
                        <div class="px-6 sm:px-8 py-6 border-b border-gray-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="font-manrope text-xl font-semibold text-gray-900">Payment Details</h2>
                                    <p class="font-lato text-sm text-gray-600">Your payment information is displayed below</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6 sm:p-8 space-y-6">
                            <!-- Email Input -->
                            <div>
                                <label for="member_email" class="block text-sm font-manrope font-semibold text-gray-700 mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <input type="email" id="member_email" name="member_email" required
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl input-focus outline-none"
                                           placeholder="Enter your email address" value="{{ old('member_email') }}">
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Please enter your own email address</p>
                            </div>

                            <!-- Payment Amounts Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="amount-display rounded-xl p-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-gray-600">Gawio la FIA</p>
                                            <p class="text-2xl font-bold text-gray-900 font-charon">
                                                {{ number_format($paymentRecord ? $paymentRecord->gawio_la_fia : 0, 2) }}
                                            </p>
                                            <p class="text-xs text-gray-500">TZS</p>
                                        </div>
                                        <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                                            <span class="text-indigo-600 font-bold">G</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="amount-display rounded-xl p-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-gray-600">FIA iliyokomaa</p>
                                            <p class="text-2xl font-bold text-gray-900 font-charon">
                                                {{ number_format($paymentRecord ? $paymentRecord->fia_iliyokomaa : 0, 2) }}
                                            </p>
                                            <p class="text-xs text-gray-500">TZS</p>
                                        </div>
                                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <span class="text-purple-600 font-bold">F</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="amount-display rounded-xl p-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-gray-600">Jumla</p>
                                            <p class="text-2xl font-bold text-gray-900 font-charon">
                                                {{ number_format($paymentRecord ? $paymentRecord->jumla : 0, 2) }}
                                            </p>
                                            <p class="text-xs text-gray-500">TZS</p>
                                        </div>
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <span class="text-blue-600 font-bold">J</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="amount-display rounded-xl p-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-gray-600">Malipo ya vipande</p>
                                            <p class="text-2xl font-bold text-gray-900 font-charon">
                                                {{ number_format($paymentRecord ? $paymentRecord->malipo_vya_vipande : 0, 2) }}
                                            </p>
                                            <p class="text-xs text-gray-500">TZS</p>
                                        </div>
                                        <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                            <span class="text-yellow-600 font-bold">M</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="amount-display rounded-xl p-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-gray-600">LOAN</p>
                                            <p class="text-2xl font-bold text-gray-900 font-charon">
                                                {{ $paymentRecord ? $paymentRecord->loan : 0 }}
                                            </p>
                                            <p class="text-xs text-gray-500">Amount</p>
                                        </div>
                                        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                            <span class="text-red-600 font-bold">L</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="amount-display rounded-xl p-4 border-l-4 border-green-500 bg-gradient-to-r from-green-50 to-emerald-50">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-semibold text-green-700">Kiasi baki</p>
                                            <p class="text-2xl font-bold text-green-800 font-charon">
                                                {{ number_format($paymentRecord ? $paymentRecord->kiasi_baki : 0, 2) }}
                                            </p>
                                            <p class="text-xs text-green-600">TZS</p>
                                        </div>
                                        <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                            <span class="text-white font-bold">K</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Method Selection -->
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-manrope text-lg font-semibold text-gray-900">
                                            Payment Methods & Amounts
                                        </h3>
                                        <p class="font-lato text-sm text-gray-600">
                                            Select multiple payment methods and specify amounts for each
                                        </p>
                                    </div>
                                </div>

                                <!-- Amount Summary -->
                                <div class="glass-effect rounded-xl p-4 border-l-4 border-green-500">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-semibold text-green-700">Total Amount to Pay</p>
                                            <p class="text-2xl font-bold text-green-800 font-charon" id="total_amount_display">
                                                {{ number_format($paymentRecord ? $paymentRecord->kiasi_baki : 0, 2) }}
                                            </p>
                                            <p class="text-xs text-green-600">TZS</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-semibold text-gray-700">Allocated Amount</p>
                                            <p class="text-2xl font-bold text-gray-900 font-charon" id="allocated_amount_display">0.00</p>
                                            <p class="text-xs text-gray-500">TZS</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-semibold text-gray-700">Remaining</p>
                                            <p class="text-2xl font-bold font-charon" id="remaining_amount_display">
                                                {{ number_format($paymentRecord ? $paymentRecord->kiasi_baki : 0, 2) }}
                                            </p>
                                            <p class="text-xs text-gray-500" id="remaining_status">TZS</p>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div id="progress_bar" class="bg-gradient-to-r from-green-400 to-green-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1" id="progress_text">0% allocated</p>
                                    </div>
                                </div>
                                
                                <!-- Payment Methods with Amounts -->
                                <div class="space-y-3" id="payment_methods_container">
                                    <!-- NAWEKA AKIBA -->
                                    <div class="payment-method-card border-2 border-gray-200 rounded-xl p-4 hover:border-green-300 transition-colors">
                                        <div class="flex items-start">
                                            <input type="checkbox" name="payment_methods[]" value="akiba_regular" 
                                                   class="payment-checkbox mt-1 w-5 h-5 text-green-600 rounded" 
                                                   data-method="akiba_regular"
                                                   onchange="togglePaymentMethod('akiba_regular')">
                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-900">NAWEKA AKIBA</p>
                                                        <p class="text-sm text-gray-500">Unaweza kutoa pesa wakati wowote</p>
                                                    </div>
                                                </div>
                                                <div class="mt-3 payment-amount-field" id="akiba_regular_amount_field" style="display: none;">
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Kiasi (TZS)</label>
                                                    <div class="relative">
                                                        <input type="number" name="payment_amounts[akiba_regular]" 
                                                               class="payment-amount w-full px-4 py-2 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                                               placeholder="0.00" step="0.01" min="0"
                                                               data-method="akiba_regular"
                                                               oninput="updateAllocation()">
                                                        <span class="absolute right-3 top-2.5 text-gray-500 font-charon">TZS</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- NAWEKEZA FIA Miaka 4 -->
                                    <div class="payment-method-card border-2 border-gray-200 rounded-xl p-4 hover:border-green-300 transition-colors">
                                        <div class="flex items-start">
                                            <input type="checkbox" name="payment_methods[]" value="akiba_4_years" 
                                                   class="payment-checkbox mt-1 w-5 h-5 text-green-600 rounded" 
                                                   data-method="akiba_4_years"
                                                   onchange="togglePaymentMethod('akiba_4_years')">
                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-900">NAWEKEZA FIA Miaka 4</p>
                                                        <p class="text-sm text-gray-500">Riba ya juu, kwa miaka 4</p>
                                                    </div>
                                                </div>
                                                <div class="mt-3 payment-amount-field" id="akiba_4_years_amount_field" style="display: none;">
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Kiasi (TZS)</label>
                                                    <div class="relative">
                                                        <input type="number" name="payment_amounts[akiba_4_years]" 
                                                               class="payment-amount w-full px-4 py-2 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                                               placeholder="0.00" step="0.01" min="0"
                                                               data-method="akiba_4_years"
                                                               oninput="updateAllocation()">
                                                        <span class="absolute right-3 top-2.5 text-gray-500 font-charon">TZS</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- NAWEKEZA FIA Miaka 6 -->
                                    <div class="payment-method-card border-2 border-gray-200 rounded-xl p-4 hover:border-green-300 transition-colors">
                                        <div class="flex items-start">
                                            <input type="checkbox" name="payment_methods[]" value="akiba_6_years" 
                                                   class="payment-checkbox mt-1 w-5 h-5 text-green-600 rounded" 
                                                   data-method="akiba_6_years"
                                                   onchange="togglePaymentMethod('akiba_6_years')">
                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-900">NAWEKEZA FIA Miaka 6</p>
                                                        <p class="text-sm text-gray-500">Riba ya juu zaidi, kwa miaka 6</p>
                                                    </div>
                                                </div>
                                                <div class="mt-3 payment-amount-field" id="akiba_6_years_amount_field" style="display: none;">
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Kiasi (TZS)</label>
                                                    <div class="relative">
                                                        <input type="number" name="payment_amounts[akiba_6_years]" 
                                                               class="payment-amount w-full px-4 py-2 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                                               placeholder="0.00" step="0.01" min="0"
                                                               data-method="akiba_6_years"
                                                               oninput="updateAllocation()">
                                                        <span class="absolute right-3 top-2.5 text-gray-500 font-charon">TZS</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                                                        
                                    <!-- Mobile Money -->
                                    <div class="payment-method-card border-2 border-gray-200 rounded-xl p-4 hover:border-green-300 transition-colors">
                                        <div class="flex items-start">
                                            <input type="checkbox" name="payment_methods[]" value="cash_mobile" 
                                                   class="payment-checkbox mt-1 w-5 h-5 text-green-600 rounded" 
                                                   data-method="cash_mobile"
                                                   onchange="togglePaymentMethod('cash_mobile')">
                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-900">CASH - Kwa Simu</p>
                                                        <p class="text-sm text-gray-500">Receive via mobile money (Halopes/Mix By Yas)</p>
                                                    </div>
                                                </div>
                                                <div class="mt-3 payment-amount-field" id="cash_mobile_amount_field" style="display: none;">
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Amount (TZS)</label>
                                                    <div class="relative">
                                                        <input type="number" name="payment_amounts[cash_mobile]" 
                                                               class="payment-amount w-full px-4 py-2 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                                               placeholder="0.00" step="0.01" min="0"
                                                               data-method="cash_mobile"
                                                               oninput="updateAllocation()">
                                                        <span class="absolute right-3 top-2.5 text-gray-500 font-charon">TZS</span>
                                                    </div>
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3">
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Namba ya Simu</label>
                                                            <input type="tel" name="mobile_number" 
                                                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                                                   placeholder="Enter mobile number">
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Jina la Namba</label>
                                                            <input type="text" name="mobile_account_name" 
                                                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                                                   placeholder="Enter account name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Bank Transfer -->
                                    <div class="payment-method-card border-2 border-gray-200 rounded-xl p-4 hover:border-green-300 transition-colors">
                                        <div class="flex items-start">
                                            <input type="checkbox" name="payment_methods[]" value="cash_bank" 
                                                   class="payment-checkbox mt-1 w-5 h-5 text-green-600 rounded" 
                                                   data-method="cash_bank"
                                                   onchange="togglePaymentMethod('cash_bank')">
                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-900">CASH - Bank</p>
                                                        <p class="text-sm text-gray-500">Receive via bank transfer</p>
                                                    </div>
                                                </div>
                                                <div class="mt-3 payment-amount-field" id="cash_bank_amount_field" style="display: none;">
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Amount (TZS)</label>
                                                    <div class="relative">
                                                        <input type="number" name="payment_amounts[cash_bank]" 
                                                               class="payment-amount w-full px-4 py-2 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                                               placeholder="0.00" step="0.01" min="0"
                                                               data-method="cash_bank"
                                                               oninput="updateAllocation()">
                                                        <span class="absolute right-3 top-2.5 text-gray-500 font-charon">TZS</span>
                                                    </div>
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Validation Message -->
                                <div id="validation_message" class="hidden p-4 rounded-lg">
                                    <p class="text-sm font-medium"></p>
                                </div>
                            </div>

                            <!-- Additional Notes -->
                            <div class="space-y-4">
                                <div>
                                    <label for="notes" class="block text-sm font-manrope font-semibold text-gray-700 mb-2">
                                        Maelezo Mengine
                                    </label>
                                    <textarea id="notes" name="notes" rows="3"
                                              class="w-full px-4 py-3 border border-gray-300 rounded-xl input-focus outline-none"
                                              placeholder="Andika maelezo yako hapa..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('dodoso.member.verify') }}" 
                           class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition duration-200 text-center">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="btn-primary text-white px-8 py-3 rounded-xl font-semibold flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"></path>
                            </svg>
                            <span>Submit Payment Verification</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Loading Splash Screen -->
<div id="loadingSplash" class="fixed inset-0 bg-gray-900 bg-opacity-75 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
            <div class="text-center">
                <div class="mb-4">
                    <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-green-600"></div>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Submitting Payment Verification</h3>
                <p class="text-sm text-gray-600 mb-4">Please wait while we process your submission...</p>
                
                <!-- Progress Bar -->
                <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                    <div id="progressBar" class="bg-green-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                </div>
                <div id="progressText" class="text-sm font-medium text-gray-700">0%</div>
                
                <!-- Status Messages -->
                <div id="statusMessage" class="mt-4 text-sm text-gray-600">
                    <div id="validating" class="hidden">✓ Validating information...</div>
                    <div id="processing" class="hidden">✓ Processing payment details...</div>
                    <div id="saving" class="hidden">✓ Saving to database...</div>
                    <div id="finalizing" class="hidden">✓ Finalizing submission...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div id="successModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4 text-center">
            <div class="mb-4">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-xl font-medium text-gray-900 mb-2">Payment Submitted Successfully!</h3>
            <p class="text-sm text-gray-600 mb-6">Your payment verification has been submitted successfully. You will receive a confirmation email shortly.</p>
            
            <div class="space-y-3">
                <button onclick="viewConfirmation()" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                    View Confirmation
                </button>
                <button onclick="newSubmission()" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md transition duration-200">
                    Submit Another Payment
                </button>
            </div>
        </div>
    </div>
</div>

<script>
        // Multi-Payment Method System
        const totalAmount = parseFloat('{{ $paymentRecord ? $paymentRecord->kiasi_baki : 0 }}');
        
        function togglePaymentMethod(method) {
            const checkbox = document.querySelector(`input[value="${method}"]`);
            const amountField = document.getElementById(`${method}_amount_field`);
            
            if (checkbox && amountField) {
                const card = checkbox.closest('.payment-method-card');
                
                if (checkbox.checked) {
                    amountField.style.display = 'block';
                    if (card) {
                        card.classList.add('border-green-500', 'bg-green-50');
                        card.classList.remove('border-gray-200');
                    }
                    
                    // Auto-focus amount field
                    const amountInput = document.querySelector(`[data-method="${method}"].payment-amount`);
                    if (amountInput) {
                        amountInput.focus();
                    }
                } else {
                    amountField.style.display = 'none';
                    if (card) {
                        card.classList.remove('border-green-500', 'bg-green-50');
                        card.classList.add('border-gray-200');
                    }
                    
                    // Clear amount input
                    const amountInput = document.querySelector(`[data-method="${method}"].payment-amount`);
                    if (amountInput) {
                        amountInput.value = '';
                    }
                }
            }
            
            updateAllocation();
        }
        
        function updateAllocation() {
            let allocatedAmount = 0;
            const paymentMethods = ['akiba_regular', 'akiba_4_years', 'akiba_6_years', 'cash_mobile', 'cash_bank'];
            
            paymentMethods.forEach(method => {
                const checkbox = document.querySelector(`input[value="${method}"]`);
                const amountInput = document.querySelector(`[data-method="${method}"].payment-amount`);
                
                if (checkbox && checkbox.checked && amountInput && amountInput.value) {
                    allocatedAmount += parseFloat(amountInput.value) || 0;
                }
            });
            
            // Update display
            const allocatedElement = document.getElementById('allocated_amount_display');
            const remainingElement = document.getElementById('remaining_amount_display');
            const progressElement = document.getElementById('progress_bar');
            const progressTextElement = document.getElementById('progress_text');
            
            if (allocatedElement) {
                allocatedElement.textContent = formatCurrency(allocatedAmount);
            }
            
            const remaining = totalAmount - allocatedAmount;
            if (remainingElement) {
                remainingElement.textContent = formatCurrency(remaining);
            }
            
            // Update progress bar
            const percentage = Math.min((allocatedAmount / totalAmount) * 100, 100);
            if (progressElement) {
                progressElement.style.width = percentage + '%';
            }
            if (progressTextElement) {
                progressTextElement.textContent = Math.round(percentage) + '% allocated';
            }
            
            // Update colors based on status
            if (remainingElement) {
                if (remaining < 0) {
                    remainingElement.classList.add('text-red-600');
                    remainingElement.classList.remove('text-gray-900', 'text-green-600');
                } else if (remaining === 0) {
                    remainingElement.classList.add('text-green-600');
                    remainingElement.classList.remove('text-gray-900', 'text-red-600');
                } else {
                    remainingElement.classList.add('text-gray-900');
                    remainingElement.classList.remove('text-red-600', 'text-green-600');
                }
                // Perfect allocation
                validationMessage.classList.remove('hidden', 'bg-red-100', 'bg-yellow-100', 'text-red-700', 'text-yellow-700');
                validationMessage.classList.add('bg-green-100', 'text-green-700');
                validationMessage.querySelector('p').textContent = '✅ Perfect! Amount fully allocated.';
                remainingStatus.classList.add('text-green-600');
                remainingStatus.classList.remove('text-gray-500', 'text-red-600');
                remainingDisplay.classList.add('text-green-800');
                remainingDisplay.classList.remove('text-gray-900', 'text-red-600');
            } else if (allocatedAmount > 0) {
                // Partial allocation
                validationMessage.classList.remove('hidden', 'bg-red-100', 'bg-green-100', 'text-red-700', 'text-green-700');
                validationMessage.classList.add('bg-yellow-100', 'text-yellow-700');
                validationMessage.querySelector('p').textContent = '⚠️ ' + formatCurrency(remainingAmount) + ' remaining to be allocated.';
                remainingStatus.classList.add('text-gray-500');
                remainingStatus.classList.remove('text-green-600', 'text-red-600');
                remainingDisplay.classList.add('text-gray-900');
                remainingDisplay.classList.remove('text-green-800', 'text-red-600');
            } else {
                // No allocation
                validationMessage.classList.add('hidden');
                remainingStatus.classList.add('text-gray-500');
                remainingStatus.classList.remove('text-green-600', 'text-red-600');
                remainingDisplay.classList.add('text-gray-900');
                remainingDisplay.classList.remove('text-green-800', 'text-red-600');
            }
        }
        
        function formatCurrency(amount) {
            return new Intl.NumberFormat('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(amount);
        }
        
        // Handle form submission with validation
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate payment methods and amounts
            const paymentMethods = document.querySelectorAll('input[name="payment_methods[]"]:checked');
            let allocatedAmount = 0;
            let hasValidAmounts = true;
            let invalidMethods = [];
            
            if (paymentMethods.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Hitilafu',
                    text: 'Tafadhali chagua angalau njia moja ya malipo.',
                    confirmButtonColor: '#10b981'
                });
                return;
            }
            
            paymentMethods.forEach(checkbox => {
                const method = checkbox.value;
                const amountInput = document.querySelector(`[data-method="${method}"].payment-amount`);
                const amount = parseFloat(amountInput?.value) || 0;
                
                // Only validate if checkbox is checked
                if (checkbox.checked) {
                    if (!amountInput || !amountInput.value || amount <= 0) {
                        hasValidAmounts = false;
                        const methodName = getPaymentMethodName(method);
                        invalidMethods.push(methodName);
                        console.log(`Invalid amount for ${method}: ${amount}, input value: ${amountInput?.value}`);
                    } else {
                        allocatedAmount += amount;
                    }
                }
            });
            
            if (!hasValidAmounts) {
                const errorMessage = invalidMethods.length > 1 
                    ? `Tafadhali weka kiasi sahihi zaidi ya 0 kwa njia zifuatazo: ${invalidMethods.join(', ')}`
                    : `Tafadhali weka kiasi sahihi zaidi ya 0 kwa njia ya malipo: ${invalidMethods[0]}`;
                    
                Swal.fire({
                    icon: 'error',
                    title: 'Hitilafu ya Kiasi',
                    text: errorMessage,
                    confirmButtonColor: '#10b981'
                });
                return;
            }
            
            // Helper function to get payment method names
            function getPaymentMethodName(method) {
                const names = {
                    'akiba_regular': 'NAWEKA AKIBA',
                    'akiba_4_years': 'NAWEKEZA FIA Miaka 4',
                    'akiba_6_years': 'NAWEKEZA FIA Miaka 6',
                    'cash_mobile': 'CASH - Kwa Simu',
                    'cash_bank': 'CASH - Benki'
                };
                return names[method] || method;
            }
            
            // Check if balance is over-allocated
            if (allocatedAmount > totalAmount) {
                Swal.fire({
                    icon: 'error',
                    title: 'Balance Imezidi',
                    text: `Umeweka pesa zaidi ya inahitajika! Umeweka ${formatCurrency(allocatedAmount)} badala ya ${formatCurrency(totalAmount)}.`,
                    confirmButtonColor: '#10b981'
                });
                return;
            }
            
            // Check if balance is remaining
            if (allocatedAmount < totalAmount) {
                const remainingAmount = totalAmount - allocatedAmount;
                Swal.fire({
                    icon: 'warning',
                    title: 'Balance Bado Ip',
                    text: `Bado kiasi cha ${formatCurrency(remainingAmount)} hakijatengwa. Tafadhali jumlisha pesa kufikia ${formatCurrency(totalAmount)}.`,
                    confirmButtonColor: '#10b981'
                });
                return;
            }
            
            // Show loading splash
            document.getElementById('loadingSplash').classList.remove('hidden');
            
            // Start progress animation
            let progress = 0;
            const progressBar = document.getElementById('progressBar');
            const progressText = document.getElementById('progressText');
            
            // Status messages
            const statusSteps = ['validating', 'processing', 'saving', 'finalizing'];
            let currentStep = 0;
            
            const progressInterval = setInterval(() => {
                progress += Math.random() * 15 + 5; // Random increment between 5-20
                
                if (progress >= 100) {
                    progress = 100;
                    clearInterval(progressInterval);
                    
                    // Complete the submission
                    setTimeout(() => {
                        submitForm();
                    }, 500);
                }
                
                progressBar.style.width = progress + '%';
                progressText.textContent = Math.round(progress) + '%';
                
                // Show status messages based on progress
                if (progress >= 25 && currentStep === 0) {
                    document.getElementById('validating').classList.remove('hidden');
                    currentStep++;
                } else if (progress >= 50 && currentStep === 1) {
                    document.getElementById('processing').classList.remove('hidden');
                    currentStep++;
                } else if (progress >= 75 && currentStep === 2) {
                    document.getElementById('saving').classList.remove('hidden');
                    currentStep++;
                } else if (progress >= 95 && currentStep === 3) {
                    document.getElementById('finalizing').classList.remove('hidden');
                    currentStep++;
                }
            }, 200);
        });
        
        function submitForm() {
            const form = document.querySelector('form');
            const formData = new FormData(form);
            
            // Remove payment_amounts for unchecked payment methods
            const checkedPaymentMethods = Array.from(document.querySelectorAll('input[name="payment_methods[]"]:checked')).map(cb => cb.value);
            
            // Filter out payment_amounts for unchecked methods
            const filteredFormData = new FormData();
            for (let [key, value] of formData.entries()) {
                if (key.startsWith('payment_amounts[')) {
                    // Extract the method name from "payment_amounts[method]"
                    const method = key.match(/payment_amounts\[(.+)\]/)?.[1];
                    if (method && checkedPaymentMethods.includes(method)) {
                        // Ensure the value is a number or empty string (not null/undefined)
                        filteredFormData.append(key, value || '0');
                    }
                } else {
                    filteredFormData.append(key, value);
                }
            }
            
            // Log form data for debugging
            console.log('Form data being submitted:');
            console.log('Checked payment methods:', checkedPaymentMethods);
            for (let [key, value] of filteredFormData.entries()) {
                console.log(key + ':', value);
            }
            
            fetch(form.action, {
                method: 'POST',
                body: filteredFormData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                console.log('Response status:', response.status);
                if (response.status === 422) {
                    // Handle validation errors
                    return response.json().then(data => {
                        console.log('Validation errors:', data);
                        let errorMessage = 'Validation errors:\n';
                        if (data.errors) {
                            for (let field in data.errors) {
                                errorMessage += `${field}: ${data.errors[field].join(', ')}\n`;
                            }
                        }
                        throw new Error(errorMessage);
                    });
                }
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
                // Hide loading splash
                document.getElementById('loadingSplash').classList.add('hidden');
                
                if (data.success) {
                    // Create summary HTML
                    let summaryHTML = '<div class="text-left">';
                    summaryHTML += '<h4 class="font-bold text-lg mb-3">Muhtasari wa Malipo:</h4>';
                    summaryHTML += '<div class="space-y-2">';
                    summaryHTML += '<p><strong>Jina la Mwanachama:</strong> ' + (data.member_name || '{{ $member["name"] ?? "N/A" }}') + '</p>';
                    summaryHTML += '<p><strong>Namba ya Mwanachama:</strong> ' + (data.member_id || '{{ $memberId ?? "N/A" }}') + '</p>';
                    summaryHTML += '<p><strong>Kiasi Jumla:</strong> ' + (data.total_amount || '{{ $paymentRecord ? number_format($paymentRecord->kiasi_baki, 2) : "0.00" }}') + ' TZS</p>';
                    
                    if (data.payment_summary && data.payment_summary.length > 0) {
                        summaryHTML += '<p><strong>Njia za Malipo:</strong></p>';
                        summaryHTML += '<ul class="list-disc list-inside ml-4">';
                        data.payment_summary.forEach(payment => {
                            summaryHTML += '<li>' + payment + '</li>';
                        });
                        summaryHTML += '</ul>';
                    }
                    
                    summaryHTML += '<p><strong>Idadi ya Uthibitisho:</strong> #' + (data.confirmation_id || 'N/A') + '</p>';
                    summaryHTML += '<p><strong>Tarehe ya Malipo:</strong> ' + new Date().toLocaleDateString('sw-TZ') + '</p>';
                    summaryHTML += '</div></div>';
                    
                    // Show success modal with summary and download options
                    Swal.fire({
                        icon: 'success',
                        title: 'Mafanikio!',
                        html: summaryHTML,
                        showConfirmButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Download PDF',
                        cancelButtonText: 'Funga',
                        confirmButtonColor: '#10b981',
                        cancelButtonColor: '#6b7280',
                        width: '600px'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Download PDF
                            if (data.confirmation_id) {
                                window.open('/fia/confirmation/' + data.confirmation_id + '/pdf', '_blank');
                            }
                        }
                        
                        // Redirect to confirmation page
                        if (data.confirmation_id) {
                            window.location.href = '/fia/confirmation/' + data.confirmation_id;
                        } else {
                            window.location.href = '/fia/verify';
                        }
                    });
                } else {
                    // Show error with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Hitilafu',
                        text: data.message || 'Kuna kitu kimekwenda vibaya',
                        confirmButtonColor: '#10b981'
                    });
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                console.error('Error details:', error.message);
                
                // Handle validation errors specifically
                if (error.message.includes('Validation errors:')) {
                    const validationText = error.message.replace('Validation errors:', '').trim();
                    Swal.fire({
                        icon: 'error',
                        title: 'Hitilafu ya Uthibitishaji',
                        text: validationText,
                        confirmButtonColor: '#10b981'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hitilafu',
                        text: error.message + '. Tafadhali jaribu tena.',
                        confirmButtonColor: '#10b981'
                    });
                }
            });
        }
        
        function viewConfirmation() {
            if (window.confirmationId) {
                window.location.href = '/fia/confirmation/' + window.confirmationId;
            }
        }
        
        function newSubmission() {
            window.location.href = '/fia/verify';
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateAllocation();
        });
    </script>
</body>
</html>
