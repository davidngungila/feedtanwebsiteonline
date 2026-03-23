<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIA Payment Form - {{ $member['name'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <input type="hidden" name="member_email" value="{{ $member['email'] }}">

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Payment Details</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Enter your payment information below</p>
                    </div>
                    <div class="border-t border-gray-200">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <label for="amount_to_pay" class="block text-sm font-medium text-gray-700">
                                        Total Amount to Pay (TZS)
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="amount_to_pay" name="amount_to_pay" step="0.01" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ number_format($paymentRecord->jumla ?? $confirmation->amount_to_pay ?? 0, 2) }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="gawio_la_fia" class="block text-sm font-medium text-gray-700">
                                        Gawio la FIA (TZS)
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="gawio_la_fia" name="gawio_la_fia" step="0.01" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ number_format($paymentRecord->gawio_la_fia ?? 0, 2) }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="fia_iliyokomaa" class="block text-sm font-medium text-gray-700">
                                        FIA Ilivyo Koma (TZS)
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="fia_iliyokomaa" name="fia_iliyokomaa" step="0.01" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ number_format($paymentRecord->fia_iliyokomaa ?? 0, 2) }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="jumla" class="block text-sm font-medium text-gray-700">
                                        Jumla (TZS)
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="jumla" name="jumla" step="0.01" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ number_format($paymentRecord->jumla ?? $confirmation->amount_to_pay ?? 0, 2) }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="malipo_vya_vipande" class="block text-sm font-medium text-gray-700">
                                        Malipo ya VIP (TZS)
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="malipo_vya_vipande" name="malipo_vya_vipande" step="0.01" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ number_format($paymentRecord->malipo_vya_vipande ?? 0, 2) }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="loan" class="block text-sm font-medium text-gray-700">
                                        Loan Reference
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="loan" name="loan" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ $paymentRecord->loan ?? 'N/A' }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="kiasi_baki" class="block text-sm font-medium text-gray-700">
                                        Kiasi Baki (TZS)
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="kiasi_baki" name="kiasi_baki" step="0.01" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ number_format($paymentRecord->kiasi_baki ?? 0, 2) }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Payment Method for Kiasi Baki
                                    </label>
                                    <div class="mt-1">
                                        <select id="payment_method" name="payment_method" required
                                                class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            <option value="">Select payment method</option>
                                            <option value="akiba">Naweka Akiba</option>
                                            <option value="impe">Nawekeza tena IMPE</option>
                                            <option value="cash_mobile">CASH - Kwa Simu (Halopes/Mix By Yas)</option>
                                            <option value="cash_bank">CASH - Bank</option>
                                        </select>
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
                                               placeholder="Enter mobile number">
                                    </div>
                                </div>

                                <div class="sm:col-span-1" id="mobile_name_div" style="display: none;">
                                    <label for="mobile_account_name" class="block text-sm font-medium text-gray-700">
                                        Jina la Namba ya Simu
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="mobile_account_name" name="mobile_account_name"
                                               class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                               placeholder="Enter account name">
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

    <script>
        // Handle payment method selection
        document.getElementById('payment_method').addEventListener('change', function() {
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

        // Remove auto-calculation since fields are now readonly
        // The calculation is already done in the database
    </script>
</body>
</html>
