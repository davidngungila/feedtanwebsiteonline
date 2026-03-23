<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIA Payment Confirmation - {{ $confirmation->member_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iosevka+Charon:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Manrope:wght@200..800&family=MonteCarlo&display=swap" rel="stylesheet">
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
        
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }
        
        .status-pending {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
        }
        
        .status-verified {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }
        
        .status-rejected {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
        }
        
        @media print {
            .action-buttons {
                display: none;
            }
            
            .floating-shapes {
                display: none;
            }
            
            body {
                background: white;
            }
            
            .glass-effect {
                background: white;
                backdrop-filter: none;
                border: 1px solid #e5e7eb;
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
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full mb-4 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.586-4L12 3l4 4m0 0l-4 4m4-4H7"></path>
                        </svg>
                    </div>
                    <h1 class="font-manrope text-4xl sm:text-5xl font-bold gradient-text mb-2">
                        FIA Payment Confirmation
                    </h1>
                    <p class="font-lato text-xl text-gray-600">
                        Official Payment Receipt
                    </p>
                </div>

                @if(session('success'))
                    <div class="glass-effect rounded-xl p-6 mb-8 border-l-4 border-green-500 card-shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-green-800 font-semibold text-lg">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Confirmation ID Card -->
                <div class="glass-effect rounded-xl p-6 mb-8 card-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Confirmation ID</p>
                            <p class="text-2xl font-bold text-gray-900 font-charon">#{{ str_pad($confirmation->id, 6, '0', STR_PAD_LEFT) }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500 font-medium">Status</p>
                            <span class="status-badge status-{{ $confirmation->status }}">
                                {{ ucfirst($confirmation->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Member Information Card -->
                <div class="glass-effect rounded-xl p-6 sm:p-8 mb-8 card-shadow">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h2 class="font-manrope text-2xl font-semibold text-gray-900">Member Information</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Member ID</p>
                                <p class="text-lg font-semibold text-gray-900 font-charon">{{ $confirmation->member_id }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Member Name</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $confirmation->member_name }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Member Type</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $confirmation->member_type }}</p>
                            </div>
                        </div>
                        
                        @if(!empty($confirmation->member_email))
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $confirmation->member_email }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Payment Details Card -->
                <div class="glass-effect rounded-xl p-6 sm:p-8 mb-8 card-shadow">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                        </div>
                        <h2 class="font-manrope text-2xl font-semibold text-gray-900">Payment Details</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="amount-display rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Total Amount to Pay</p>
                                    <p class="text-2xl font-bold text-gray-900 font-charon">
                                        {{ number_format($confirmation->amount_to_pay, 2) }}
                                    </p>
                                    <p class="text-xs text-gray-500">TZS</p>
                                </div>
                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-bold">T</span>
                                </div>
                            </div>
                        </div>

                        @if($paymentRecord)
                        <div class="amount-display rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Gawio la FIA</p>
                                    <p class="text-2xl font-bold text-gray-900 font-charon">
                                        {{ number_format($paymentRecord->gawio_la_fia, 2) }}
                                    </p>
                                    <p class="text-xs text-gray-500">TZS</p>
                                </div>
                                <div class="w-10 h-10 bg-indigo-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-bold">G</span>
                                </div>
                            </div>
                        </div>

                        <div class="amount-display rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">FIA Ilivyo Koma</p>
                                    <p class="text-2xl font-bold text-gray-900 font-charon">
                                        {{ number_format($paymentRecord->fia_iliyokomaa, 2) }}
                                    </p>
                                    <p class="text-xs text-gray-500">TZS</p>
                                </div>
                                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-bold">F</span>
                                </div>
                            </div>
                        </div>

                        <div class="amount-display rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Jumla</p>
                                    <p class="text-2xl font-bold text-gray-900 font-charon">
                                        {{ number_format($paymentRecord->jumla, 2) }}
                                    </p>
                                    <p class="text-xs text-gray-500">TZS</p>
                                </div>
                                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-bold">J</span>
                                </div>
                            </div>
                        </div>

                        @if($paymentRecord->malipo_vya_vipande)
                        <div class="amount-display rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Malipo ya VIP</p>
                                    <p class="text-2xl font-bold text-gray-900 font-charon">
                                        {{ number_format($paymentRecord->malipo_vya_vipande, 2) }}
                                    </p>
                                    <p class="text-xs text-gray-500">TZS</p>
                                </div>
                                <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-bold">V</span>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="amount-display rounded-xl p-4 border-l-4 border-green-500 bg-gradient-to-r from-green-50 to-emerald-50">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-semibold text-green-700">Kiasi Baki</p>
                                    <p class="text-2xl font-bold text-green-800 font-charon">
                                        {{ number_format($paymentRecord->kiasi_baki, 2) }}
                                    </p>
                                    <p class="text-xs text-green-600">TZS</p>
                                </div>
                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-bold">K</span>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Payment Method Information -->
                    @if($confirmation->payment_method)
                    <div class="mt-6 p-4 bg-gray-50 rounded-xl">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                            </div>
                            <h3 class="font-manrope text-lg font-semibold text-gray-900">Payment Method</h3>
                        </div>
                        <p class="text-gray-700">
                            @switch($confirmation->payment_method)
                                @case('akiba')
                                    <span class="font-medium">Naweka Akiba</span> - Keep as savings
                                    @break
                                @case('impe')
                                    <span class="font-medium">Nawekeza tena IMPE</span> - Reinvest in IMPE
                                    @break
                                @case('cash_mobile')
                                    <span class="font-medium">CASH - Kwa Simu</span> - Receive via mobile money (Halopes/Mix By Yas)
                                    @break
                                @case('cash_bank')
                                    <span class="font-medium">CASH - Bank</span> - Receive via bank transfer
                                    @break
                            @endswitch
                        </p>
                        
                        @if($confirmation->impe_years)
                        <p class="text-sm text-gray-600 mt-2">
                            <span class="font-medium">IMPE Miaka:</span> {{ $confirmation->impe_years }} Miaka
                        </p>
                        @endif
                        
                        @if($confirmation->mobile_number)
                        <p class="text-sm text-gray-600 mt-2">
                            <span class="font-medium">Namba ya Simu:</span> {{ $confirmation->mobile_number }}
                        </p>
                        @endif
                        
                        @if($confirmation->mobile_account_name)
                        <p class="text-sm text-gray-600 mt-2">
                            <span class="font-medium">Jina la Namba ya Simu:</span> {{ $confirmation->mobile_account_name }}
                        </p>
                        @endif
                    </div>
                    @endif
                </div>

                <!-- Confirmation Message -->
                <div class="glass-effect rounded-xl p-6 mb-8 card-shadow border-l-4 border-green-500">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="font-manrope text-lg font-semibold text-gray-900 mb-2">Payment Confirmation</h3>
                            <p class="text-gray-700 mb-3">
                                This is to confirm that the above member has submitted their FIA payment details. The payment confirmation has been recorded in our system.
                            </p>
                            @if(!empty($confirmation->notes))
                            <div class="bg-gray-50 rounded-lg p-3">
                                <p class="text-sm font-medium text-gray-700">Notes:</p>
                                <p class="text-sm text-gray-600">{{ $confirmation->notes }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Submission Information -->
                <div class="glass-effect rounded-xl p-6 sm:p-8 mb-8 card-shadow">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-gray-400 to-gray-600 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="font-manrope text-2xl font-semibold text-gray-900">Submission Information</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Submission Date</p>
                                <p class="text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($confirmation->created_at)->format('M d, Y, H:i') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Generated On</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $generated_at->format('M d, Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 action-buttons">
                    <button onclick="window.print()" class="btn-primary text-white px-8 py-3 rounded-xl font-semibold flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                        </svg>
                        <span>Print Confirmation</span>
                    </button>
                    <a href="{{ route('fia.member.verify') }}" class="px-8 py-3 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition duration-200 text-center flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>New Verification</span>
                    </a>
                </div>

                <!-- Footer -->
                <div class="mt-12 text-center text-sm text-gray-500">
                    <p class="mb-2">This is an automatically generated document. No signature required.</p>
                    <p class="mb-2">For any inquiries, please contact the FIA administration office.</p>
                    <p>Document generated on: {{ $generated_at->format('M d, Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
