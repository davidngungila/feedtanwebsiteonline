<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Verification - {{ $member['name'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="min-h-screen py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        FIA Payment Verification Form
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Please verify and submit your payment details
                    </p>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Member ID</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-semibold">{{ $memberId }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Member Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-semibold">{{ $member['name'] }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Member Type</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $member['type'] }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $member['email'] }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 rounded-md p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Payment Form -->
            <form action="{{ route('fia.submit') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="member_id" value="{{ $memberId }}">
                <input type="hidden" name="member_name" value="{{ $member['name'] }}">
                <input type="hidden" name="member_type" value="{{ $member['type'] }}">

                <!-- Member Email Input -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Member Information</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Please confirm your email address</p>
                    </div>
                    <div class="border-t border-gray-200">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <label for="member_name" class="block text-sm font-medium text-gray-700">
                                        Member Name
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="member_name" name="member_name" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ $member['name'] }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="member_email" class="block text-sm font-medium text-gray-700">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="email" id="member_email" name="member_email" required
                                               class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                               placeholder="Enter your email address" value="{{ old('member_email') }}">
                                        <p class="mt-1 text-xs text-gray-500">Please enter your own email address</p>
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="member_type" class="block text-sm font-medium text-gray-700">
                                        Member Type
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="member_type" name="member_type" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ $member['type'] }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="member_id_display" class="block text-sm font-medium text-gray-700">
                                        Member ID
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="member_id_display" name="member_id_display" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ $memberId }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Payment Details</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Select your payment method for balance payment</p>
                    </div>
                    <div class="border-t border-gray-200">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-1">

                                <div class="sm:col-span-2">
                                    <h4 class="text-lg font-medium text-gray-900 mb-4">Payment Method for Balance (Kiasi Baki: {{ number_format($paymentRecord->kiasi_baki ?? 0, 2) }} TZS)</h4>
                                    <p class="text-sm text-gray-600 mb-4">Select how you would like to handle your remaining balance:</p>
                                    
                                    <div class="space-y-3">
                                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 @if(old('payment_method') == 'akiba') bg-blue-50 border-blue-500 @endif">
                                            <input type="radio" name="payment_method" value="akiba" class="mr-3" @if(old('payment_method') == 'akiba') checked @endif required>
                                            <div>
                                                <span class="font-medium">Naweka Akiba</span>
                                                <p class="text-sm text-gray-500">Keep as savings</p>
                                            </div>
                                        </label>
                                        
                                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 @if(old('payment_method') == 'impe') bg-purple-50 border-purple-500 @endif">
                                            <input type="radio" name="payment_method" value="impe" class="mr-3" @if(old('payment_method') == 'impe') checked @endif required>
                                            <div>
                                                <span class="font-medium">Nawekeza tena IMPE</span>
                                                <p class="text-sm text-gray-500">Reinvest in IMPE</p>
                                            </div>
                                        </label>
                                        
                                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 @if(old('payment_method') == 'cash_mobile') bg-green-50 border-green-500 @endif">
                                            <input type="radio" name="payment_method" value="cash_mobile" class="mr-3" @if(old('payment_method') == 'cash_mobile') checked @endif required>
                                            <div>
                                                <span class="font-medium">CASH - Kwa Simu (Halopes/Mix By Yas)</span>
                                                <p class="text-sm text-gray-500">Receive via mobile money</p>
                                            </div>
                                        </label>
                                        
                                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 @if(old('payment_method') == 'cash_bank') bg-yellow-50 border-yellow-500 @endif">
                                            <input type="radio" name="payment_method" value="cash_bank" class="mr-3" @if(old('payment_method') == 'cash_bank') checked @endif required>
                                            <div>
                                                <span class="font-medium">CASH - Bank</span>
                                                <p class="text-sm text-gray-500">Receive via bank transfer</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="sm:col-span-1" id="impe_years_div" style="display: none;">
                                    <label for="impe_years" class="block text-sm font-medium text-gray-700">
                                        IMPE Miaka
                                    </label>
                                    <div class="mt-1">
                                        <select id="impe_years" name="impe_years"
                                                class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            <option value="">Select years</option>
                                            <option value="4">Miaka 4</option>
                                            <option value="6">Miaka 6</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-1" id="mobile_details_div" style="display: none;">
                                    <label for="mobile_number" class="block text-sm font-medium text-gray-700">
                                        Namba ya Simu
                                    </label>
                                    <div class="mt-1">
                                        <input type="tel" id="mobile_number" name="mobile_number"
                                               class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                               placeholder="Enter mobile number" value="{{ old('mobile_number') }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1" id="mobile_name_div" style="display: none;">
                                    <label for="mobile_account_name" class="block text-sm font-medium text-gray-700">
                                        Jina la Namba ya Simu
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="mobile_account_name" name="mobile_account_name"
                                               class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                               placeholder="Enter account name" value="{{ old('mobile_account_name') }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="notes" class="block text-sm font-medium text-gray-700">
                                        Additional Notes
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="notes" name="notes" rows="3"
                                                  class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                  placeholder="Any additional information or notes">{{ old('notes', $confirmation->notes ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('fia.member.verify') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Cancel
                    </a>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Submit Payment Verification
                    </button>
                </div>
            </form>
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
        // Handle payment method selection
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const method = this.value;
                
                // Hide all conditional fields
                document.getElementById('impe_years_div').style.display = 'none';
                document.getElementById('mobile_details_div').style.display = 'none';
                document.getElementById('mobile_name_div').style.display = 'none';
                
                // Show relevant fields based on selection
                switch(method) {
                    case 'impe':
                        document.getElementById('impe_years_div').style.display = 'block';
                        break;
                    case 'cash_mobile':
                        document.getElementById('mobile_details_div').style.display = 'block';
                        document.getElementById('mobile_name_div').style.display = 'block';
                        break;
                    case 'cash_bank':
                        // Bank payment - no additional fields needed since bank data is already available
                        break;
                    // 'akiba' doesn't need additional fields
                }
            });
        });

        // Handle form submission with loading splash
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
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
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                // Hide loading splash
                document.getElementById('loadingSplash').classList.add('hidden');
                
                if (data.success) {
                    // Show success modal
                    document.getElementById('successModal').classList.remove('hidden');
                    // Store confirmation ID for view button
                    window.confirmationId = data.confirmation_id;
                } else {
                    // Show error
                    alert('Error: ' + (data.message || 'Something went wrong'));
                    document.getElementById('loadingSplash').classList.add('hidden');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
                document.getElementById('loadingSplash').classList.add('hidden');
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
    </script>
</body>
</html>
