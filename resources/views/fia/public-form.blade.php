<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodoso Public Payment Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
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
        
        .font-manrope {
            font-family: 'Manrope', sans-serif;
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h1 class="font-manrope text-3xl sm:text-4xl font-bold gradient-text mb-4">
                        Dodoso Payment Form
                    </h1>
                    <p class="font-lato text-lg text-gray-600">
                        Complete your payment details securely
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

                <!-- Payment Form -->
                <form action="{{ route('dodoso.submit') }}" method="POST" class="space-y-8">
                    @csrf
                    <input type="hidden" name="member_id" value="{{ $memberId }}">
                    <input type="hidden" name="member_name" value="{{ $member['name'] }}">
                    <input type="hidden" name="member_type" value="{{ $member['type'] }}">

                    <!-- Personal Information -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-xl font-semibold text-gray-900">Personal Information</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="full_name" name="full_name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl input-focus outline-none"
                                       placeholder="Enter your full name">
                            </div>
                            
                            <div>
                                <label for="member_email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="member_email" name="member_email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl input-focus outline-none"
                                       placeholder="Enter your email address">
                            </div>
                            
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">
                                    Phone Number
                                </label>
                                <input type="tel" id="phone_number" name="phone_number"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl input-focus outline-none"
                                       placeholder="Enter your phone number">
                            </div>
                            
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                    Location
                                </label>
                                <input type="text" id="location" name="location"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl input-focus outline-none"
                                       placeholder="Enter your location">
                            </div>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-xl font-semibold text-gray-900">Payment Method</h2>
                        </div>
                        
                        <div class="space-y-4">
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
                                                <p class="font-semibold text-gray-900">Mobile Money</p>
                                                <p class="text-sm text-gray-500">Tigo Pesa, M-Pesa, Airtel Money</p>
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
                                                <span class="absolute right-3 top-2.5 text-gray-500">TZS</span>
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
                                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">Bank Transfer</p>
                                                <p class="text-sm text-gray-500">Direct bank deposit</p>
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
                                                <span class="absolute right-3 top-2.5 text-gray-500">TZS</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="glass-effect rounded-xl p-6 sm:p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                </svg>
                            </div>
                            <h2 class="font-manrope text-xl font-semibold text-gray-900">Additional Information</h2>
                        </div>
                        
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                                Additional Notes (Optional)
                            </label>
                            <textarea id="notes" name="notes" rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-xl input-focus outline-none"
                                      placeholder="Any additional information or special instructions..."></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit" 
                                class="btn-primary text-white px-12 py-4 rounded-xl font-semibold text-lg flex items-center space-x-3 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Submit Payment</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePaymentMethod(method) {
            const checkbox = document.querySelector(`input[data-method="${method}"]`);
            const amountField = document.getElementById(`${method}_amount_field`);
            
            if (checkbox.checked) {
                amountField.style.display = 'block';
                document.querySelector(`input[data-method="${method}"]`).closest('.payment-method-card').classList.add('selected');
            } else {
                amountField.style.display = 'none';
                document.querySelector(`input[data-method="${method}"]`).closest('.payment-method-card').classList.remove('selected');
                document.querySelector(`input[data-method="${method}"]`).value = '';
            }
        }

        function updateAllocation() {
            // This function can be used to update payment allocation display
            const checkboxes = document.querySelectorAll('.payment-checkbox:checked');
            const totalAmount = Array.from(checkboxes).reduce((total, checkbox) => {
                const method = checkbox.dataset.method;
                const amountInput = document.querySelector(`input[data-method="${method}"]`);
                return total + (parseFloat(amountInput.value) || 0);
            }, 0);
            
            console.log('Total amount:', totalAmount);
        }

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const checkboxes = document.querySelectorAll('.payment-checkbox:checked');
            
            if (checkboxes.length === 0) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Payment Method Required',
                    text: 'Please select at least one payment method.',
                    confirmButtonColor: '#10b981'
                });
                return;
            }
            
            let hasAmount = false;
            checkboxes.forEach(checkbox => {
                const method = checkbox.dataset.method;
                const amountInput = document.querySelector(`input[data-method="${method}"]`);
                if (amountInput && parseFloat(amountInput.value) > 0) {
                    hasAmount = true;
                }
            });
            
            if (!hasAmount) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Amount Required',
                    text: 'Please enter an amount for at least one payment method.',
                    confirmButtonColor: '#10b981'
                });
                return;
            }
        });
    </script>
</body>
</html>
