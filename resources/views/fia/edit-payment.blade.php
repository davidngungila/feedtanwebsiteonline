<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Payment - {{ $confirmation->member_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="min-h-screen py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Edit Payment Record
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Modify payment information for {{ $confirmation->member_name }} ({{ $confirmation->member_id }})
                    </p>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Member ID</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-semibold">{{ $confirmation->member_id }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Member Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-semibold">{{ $confirmation->member_name }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Member Type</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $confirmation->member_type }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $confirmation->member_email }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Edit Form -->
            <form action="{{ route('dodoso.admin.update', $confirmation->id) }}" method="POST" class="space-y-6">
                @csrf
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Payment Details</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Edit the payment information below</p>
                    </div>
                    <div class="border-t border-gray-200">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <label for="gawio_la_fia" class="block text-sm font-medium text-gray-700">
                                        Gawio la FIA (TZS)
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="gawio_la_fia" name="gawio_la_fia" step="0.01" required
                                               class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                               value="{{ number_format($paymentRecord->gawio_la_fia ?? 0, 2) }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="fia_iliyokomaa" class="block text-sm font-medium text-gray-700">
                                        FIA Ilivyo Koma (TZS)
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="fia_iliyokomaa" name="fia_iliyokomaa" step="0.01" required
                                               class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                               value="{{ number_format($paymentRecord->fia_iliyokomaa ?? 0, 2) }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Jumla (TZS) - Auto-calculated
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="jumla" name="jumla" step="0.01" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ number_format($paymentRecord->jumla ?? 0, 2) }}">
                                        <p class="mt-1 text-xs text-gray-500">Auto-calculated: Gawio + FIA Koma</p>
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="malipo_vya_vipande" class="block text-sm font-medium text-gray-700">
                                        Malipo ya VIP (TZS)
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="malipo_vya_vipande" name="malipo_vya_vipande" step="0.01"
                                               class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                               value="{{ number_format($paymentRecord->malipo_vya_vipande ?? 0, 2) }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="loan" class="block text-sm font-medium text-gray-700">
                                        Loan (TZS)
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="loan" name="loan" step="0.01"
                                               class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                               value="{{ number_format($paymentRecord->loan ?? 0, 2) }}">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Kiasi Baki (TZS) - Auto-calculated
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="kiasi_baki" name="kiasi_baki" step="0.01" readonly
                                               class="shadow-sm bg-gray-100 block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                               value="{{ number_format($paymentRecord->kiasi_baki ?? 0, 2) }}">
                                        <p class="mt-1 text-xs text-gray-500">Auto-calculated: Jumla - Malipo VIP - Loan</p>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="notes" class="block text-sm font-medium text-gray-700">
                                        Notes
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

                <!-- Action buttons -->
                <div class="flex justify-end">
                    <a href="{{ route('dodoso.admin.dashboard') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Cancel
                    </a>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Update Payment Record
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Auto-calculate jumla and kiasi_baki when values change
        document.getElementById('gawio_la_fia').addEventListener('input', calculateTotals);
        document.getElementById('fia_iliyokomaa').addEventListener('input', calculateTotals);
        document.getElementById('malipo_vya_vipande').addEventListener('input', calculateTotals);
        document.getElementById('loan').addEventListener('input', calculateTotals);

        function calculateTotals() {
            const gawio = parseFloat(document.getElementById('gawio_la_fia').value) || 0;
            const fiaKoma = parseFloat(document.getElementById('fia_iliyokomaa').value) || 0;
            const malipoVip = parseFloat(document.getElementById('malipo_vya_vipande').value) || 0;
            const loan = parseFloat(document.getElementById('loan').value) || 0;
            
            const jumla = gawio + fiaKoma;
            const kiasiBaki = jumla - malipoVip - loan;
            
            document.getElementById('jumla').value = jumla.toFixed(2);
            document.getElementById('kiasi_baki').value = kiasiBaki.toFixed(2);
        }
    </script>
</body>
</html>
