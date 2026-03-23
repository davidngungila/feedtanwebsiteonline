<?php

namespace App\Http\Controllers;

use App\Models\FiaPaymentConfirmation;
use App\Models\FiaPaymentRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FiaPaymentController extends Controller
{
    // Member verification page
    public function memberVerify()
    {
        return view('fia.member-verify');
    }

    // Process member verification
    public function memberVerifyProcess(Request $request)
    {
        $request->validate([
            'member_id' => 'required|string'
        ]);

        $memberId = $request->member_id;
        
        // Get member from database
        $confirmation = FiaPaymentConfirmation::where('member_id', $memberId)->first();
        
        if (!$confirmation) {
            return back()->with('error', 'Member ID not found. Please check your ID and try again.');
        }

        $member = [
            'name' => $confirmation->member_name,
            'type' => $confirmation->member_type,
            'email' => $confirmation->member_email
        ];

        // Get existing payment record if any
        $paymentRecord = FiaPaymentRecord::where('member_id', $memberId)->first();
        
        // If no payment record exists, try to find it or create with seeder data
        if (!$paymentRecord) {
            // Check if there's a confirmation with the correct amount
            if ($confirmation && $confirmation->amount_to_pay > 0) {
                // Create payment record based on confirmation data and save it
                $paymentRecord = FiaPaymentRecord::create([
                    'member_id' => $memberId,
                    'gawio_la_fia' => $confirmation->amount_to_pay, // Use confirmation amount as gawio
                    'fia_iliyokomaa' => 0,
                    'jumla' => $confirmation->amount_to_pay,
                    'malipo_vya_vipande' => 0,
                    'loan' => 0,
                    'kiasi_baki' => $confirmation->amount_to_pay,
                    'status' => 'pending',
                    'notes' => 'Auto-created from confirmation data'
                ]);
            } else {
                // Create empty record if no data available
                $paymentRecord = FiaPaymentRecord::create([
                    'member_id' => $memberId,
                    'gawio_la_fia' => 0,
                    'fia_iliyokomaa' => 0,
                    'jumla' => 0,
                    'malipo_vya_vipande' => 0,
                    'loan' => 0,
                    'kiasi_baki' => 0,
                    'status' => 'pending',
                    'notes' => 'Empty record created'
                ]);
            }
        }

        return view('fia.payment-form', compact('memberId', 'member', 'paymentRecord', 'confirmation'));
    }

    // Submit payment verification
    public function submitPayment(Request $request)
    {
        // Log the incoming request for debugging
        \Log::info('Payment submission request:', [
            'headers' => $request->headers->all(),
            'expects_json' => $request->expectsJson(),
            'is_ajax' => $request->ajax(),
            'input' => $request->all()
        ]);

        $request->validate([
            'member_id' => 'required|string',
            'member_name' => 'required|string',
            'member_type' => 'required|string',
            'member_email' => 'required|email',
            'payment_method' => 'required|in:akiba,impe,cash_mobile,cash_bank',
            'impe_years' => 'nullable|integer|in:4,6',
            'mobile_number' => 'nullable|string',
            'mobile_account_name' => 'nullable|string',
            'notes' => 'nullable|string'
        ]);

        try {
            // Create or update payment confirmation
            $confirmation = FiaPaymentConfirmation::updateOrCreate(
                ['member_id' => $request->member_id],
                [
                    'member_name' => $request->member_name,
                    'member_type' => $request->member_type,
                    'member_email' => $request->member_email,
                    'payment_method' => $request->payment_method,
                    'impe_years' => $request->impe_years,
                    'mobile_number' => $request->mobile_number,
                    'mobile_account_name' => $request->mobile_account_name,
                    'status' => 'verified', // Changed from 'pending' to 'verified'
                    'notes' => $request->notes
                ]
            );

            // Get existing payment record or create new one
            $existingPaymentRecord = FiaPaymentRecord::where('member_id', $request->member_id)->first();
            
            // Create or update payment record with existing data
            $paymentRecord = FiaPaymentRecord::updateOrCreate(
                ['member_id' => $request->member_id],
                [
                    'gawio_la_fia' => $existingPaymentRecord ? $existingPaymentRecord->gawio_la_fia : 0,
                    'fia_iliyokomaa' => $existingPaymentRecord ? $existingPaymentRecord->fia_iliyokomaa : 0,
                    'jumla' => $existingPaymentRecord ? $existingPaymentRecord->jumla : 0,
                    'malipo_vya_vipande' => $existingPaymentRecord ? $existingPaymentRecord->malipo_vya_vipande : 0,
                    'loan' => $existingPaymentRecord ? $existingPaymentRecord->loan : 0,
                    'kiasi_baki' => $existingPaymentRecord ? $existingPaymentRecord->kiasi_baki : 0,
                    'status' => 'verified', // Changed from 'pending' to 'verified'
                    'notes' => $request->notes
                ]
            );

            \Log::info('Payment submission successful:', [
                'confirmation_id' => $confirmation->id,
                'member_id' => $request->member_id
            ]);

            // Check if request expects JSON (AJAX) - use multiple methods
            $isAjax = $request->ajax() || $request->expectsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest';
            
            if ($isAjax) {
                return response()->json([
                    'success' => true,
                    'message' => 'Payment verification submitted successfully!',
                    'confirmation_id' => $confirmation->id
                ]);
            }

            return redirect()->route('fia.confirmation', $confirmation->id)
                ->with('success', 'Your payment verification has been submitted successfully!');
                
        } catch (\Exception $e) {
            \Log::error('Payment submission error:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->all()
            ]);

            // Check if request expects JSON (AJAX)
            $isAjax = $request->ajax() || $request->expectsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest';
            
            if ($isAjax) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred while submitting your payment verification: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'An error occurred while submitting your payment verification. Please try again.');
        }
    }

    // Edit payment record (admin only)
    public function editPayment($id)
    {
        $confirmation = FiaPaymentConfirmation::findOrFail($id);
        $paymentRecord = $confirmation->paymentRecord;
        
        return view('fia.edit-payment', compact('confirmation', 'paymentRecord'));
    }

    // Update payment record (admin only)
    public function updatePayment(Request $request, $id)
    {
        $request->validate([
            'gawio_la_fia' => 'required|numeric|min:0',
            'fia_iliyokomaa' => 'required|numeric|min:0',
            'malipo_vya_vipande' => 'nullable|numeric|min:0',
            'loan' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        $confirmation = FiaPaymentConfirmation::findOrFail($id);
        
        // Calculate jumla and kiasi_baki
        $gawio = $request->gawio_la_fia;
        $fiaKoma = $request->fia_iliyokomaa;
        $jumla = $gawio + $fiaKoma;
        $malipoVip = $request->malipo_vya_vipande ?: 0;
        $loan = $request->loan ?: 0;
        $kiasiBaki = $jumla - $malipoVip - $loan;

        // Update payment record
        $paymentRecord = FiaPaymentRecord::updateOrCreate(
            ['member_id' => $confirmation->member_id],
            [
                'gawio_la_fia' => $gawio,
                'fia_iliyokomaa' => $fiaKoma,
                'jumla' => $jumla,
                'malipo_vya_vipande' => $malipoVip,
                'loan' => $loan,
                'kiasi_baki' => $kiasiBaki,
                'status' => 'pending',
                'notes' => $request->notes
            ]
        );

        // Update confirmation amount_to_pay
        $confirmation->update([
            'amount_to_pay' => $jumla,
            'notes' => $request->notes
        ]);

        return redirect()->route('fia.admin.dashboard')
            ->with('success', 'Payment record updated successfully!');
    }
    // Admin logout
    public function adminLogout(Request $request)
    {
        session()->forget('fia_admin_authenticated');
        return redirect()->route('fia.admin.passcode')
            ->with('success', 'You have been logged out successfully.');
    }

    // Show confirmation page
    public function confirmation($id)
    {
        $confirmation = FiaPaymentConfirmation::findOrFail($id);
        $paymentRecord = $confirmation->paymentRecord;
        $generated_at = now();

        return view('fia.confirmation', compact('confirmation', 'paymentRecord', 'generated_at'));
    }

    // Admin passcode verification
    public function adminPasscode()
    {
        if (session('fia_admin_authenticated')) {
            return redirect()->route('fia.admin.dashboard');
        }

        return view('fia.admin-passcode');
    }

    // Process admin passcode
    public function adminPasscodeProcess(Request $request)
    {
        $request->validate([
            'passcode' => 'required|string'
        ]);

        if ($request->passcode === 'FIA') {
            session(['fia_admin_authenticated' => true]);
            return redirect()->route('fia.admin.dashboard')
                ->with('success', 'Welcome to FIA Admin Panel');
        }

        return back()->with('error', 'Invalid passcode. Please try again.');
    }

    // Admin dashboard
    public function adminDashboard(Request $request)
    {
        if (!session('fia_admin_authenticated')) {
            return redirect()->route('fia.admin.passcode');
        }

        $query = FiaPaymentConfirmation::with('paymentRecord');

        // Search
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->byStatus($request->status);
        }

        $confirmations = $query->orderBy('created_at', 'desc')->paginate(20);

        // Statistics
        $stats = [
            'total_submissions' => FiaPaymentConfirmation::count(),
            'pending_submissions' => FiaPaymentConfirmation::where('status', 'pending')->count(),
            'verified_submissions' => FiaPaymentConfirmation::where('status', 'verified')->count(),
            'rejected_submissions' => FiaPaymentConfirmation::where('status', 'rejected')->count(),
            'total_amount' => FiaPaymentConfirmation::sum('amount_to_pay'),
            'total_gawio' => FiaPaymentRecord::sum('gawio_la_fia'),
            'total_fia_koma' => FiaPaymentRecord::sum('fia_iliyokomaa'),
            'total_jumla' => FiaPaymentRecord::sum('jumla')
        ];

        return view('fia.admin-dashboard', compact('confirmations', 'stats'));
    }

    // Update submission status
    public function updateStatus(Request $request, $id)
    {
        if (!session('fia_admin_authenticated')) {
            return redirect()->route('fia.admin.passcode');
        }

        $request->validate([
            'status' => 'required|in:pending,verified,rejected'
        ]);

        $confirmation = FiaPaymentConfirmation::findOrFail($id);
        $confirmation->status = $request->status;
        $confirmation->save();

        if ($confirmation->paymentRecord) {
            $confirmation->paymentRecord->status = $request->status;
            $confirmation->paymentRecord->save();
        }

        return back()->with('success', 'Status updated successfully!');
    }

    // Export to CSV
    public function exportCsv(Request $request)
    {
        if (!session('fia_admin_authenticated')) {
            return redirect()->route('fia.admin.passcode');
        }

        $query = FiaPaymentConfirmation::with('paymentRecord');

        // Apply filters
        if ($request->filled('status')) {
            $query->byStatus($request->status);
        }

        $confirmations = $query->orderBy('created_at', 'desc')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="fia_payments_' . date('Y-m-d_H-i-s') . '.csv"',
        ];

        $callback = function() use ($confirmations) {
            $file = fopen('php://output', 'w');
            
            // CSV Header
            fputcsv($file, [
                'ID',
                'Member ID',
                'Member Name',
                'Member Type',
                'Email',
                'Amount to Pay',
                'Gawio la FIA',
                'FIA Ilivyo Koma',
                'Jumla',
                'Malipo ya VIP',
                'Loan',
                'Kiasi Baki',
                'Payment Method',
                'IMPE Years',
                'Mobile Number',
                'Mobile Account Name',
                'Bank Name',
                'Status',
                'Submission Date',
                'Notes'
            ]);

            // CSV Data
            foreach ($confirmations as $confirmation) {
                $paymentMethodText = '';
                switch($confirmation->payment_method) {
                    case 'akiba':
                        $paymentMethodText = 'Naweka Akiba';
                        break;
                    case 'impe':
                        $paymentMethodText = 'Nawekeza tena IMPE';
                        break;
                    case 'cash_mobile':
                        $paymentMethodText = 'CASH - Kwa Simu (Halopes/Mix By Yas)';
                        break;
                    case 'cash_bank':
                        $paymentMethodText = 'CASH - Bank';
                        break;
                }

                fputcsv($file, [
                    $confirmation->id,
                    $confirmation->member_id,
                    $confirmation->member_name,
                    $confirmation->member_type,
                    $confirmation->member_email,
                    number_format($confirmation->amount_to_pay, 2),
                    $confirmation->paymentRecord ? number_format($confirmation->paymentRecord->gawio_la_fia, 2) : '0.00',
                    $confirmation->paymentRecord ? number_format($confirmation->paymentRecord->fia_iliyokomaa, 2) : '0.00',
                    $confirmation->paymentRecord ? number_format($confirmation->paymentRecord->jumla, 2) : '0.00',
                    $confirmation->paymentRecord ? number_format($confirmation->paymentRecord->malipo_vya_vipande ?: 0, 2) : '0.00',
                    $confirmation->paymentRecord ? $confirmation->paymentRecord->loan : '',
                    $confirmation->paymentRecord ? number_format($confirmation->paymentRecord->kiasi_baki, 2) : '0.00',
                    $paymentMethodText,
                    $confirmation->impe_years ?: '',
                    $confirmation->mobile_number ?: '',
                    $confirmation->mobile_account_name ?: '',
                    $confirmation->bank_name ?: '',
                    $confirmation->status,
                    $confirmation->created_at->format('Y-m-d H:i:s'),
                    $confirmation->notes
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}
