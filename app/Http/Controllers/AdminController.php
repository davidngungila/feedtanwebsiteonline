<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Loan;
use App\Models\LoanPayment;
use App\Models\SavingsAccount;
use App\Models\SavingsTransaction;
use App\Models\Event;
use App\Models\EventAttendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        // If already logged in, redirect to dashboard
        if (session()->has('admin_logged_in')) {
            return redirect('/admin');
        }
        
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Simple authentication - you can replace this with proper user model
        $validCredentials = [
            'email' => 'admin@feedtan.co.tz',
            'password' => 'admin123' // Change this to a secure password
        ];

        if ($credentials['email'] === $validCredentials['email'] && 
            $credentials['password'] === $validCredentials['password']) {
            
            session(['admin_logged_in' => true, 'admin_email' => $credentials['email']]);
            
            return redirect()->intended('/admin')
                ->with('success', 'Welcome back! You have successfully logged in.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_email']);
        
        return redirect('/admin/login')
            ->with('success', 'You have been logged out successfully.');
    }
    public function dashboard()
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }

        // Dashboard Statistics - with sample data if database is empty
        $stats = [
            'totalMembers' => Member::count() ?: 10247,
            'activeMembers' => Member::where('status', 'active')->count() ?: 8456,
            'newMembersThisMonth' => Member::whereMonth('registration_date', now()->month)
                                         ->whereYear('registration_date', now()->year)->count() ?: 234,
            'totalLoans' => Loan::count() ?: 3456,
            'activeLoans' => Loan::active()->count() ?: 2345,
            'pendingLoans' => Loan::pending()->count() ?: 45,
            'overdueLoans' => Loan::overdue()->count() ?: 12,
            'totalSavings' => SavingsAccount::sum('balance') ?: 45000000,
            'activeSavers' => SavingsAccount::active()->count() ?: 6789,
            'monthlyDeposits' => DB::table('savings_transactions')
                ->where('transaction_type', 'deposit')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('amount') ?: 2500000,
            'monthlyDisbursement' => Loan::whereMonth('disbursement_date', now()->month)
                                       ->whereYear('disbursement_date', now()->year)
                                       ->sum('amount') ?: 8500000,
            'upcomingEvents' => Event::where('start_date', '>', now())->count() ?: 12,
        ];

        // Recent Activities - with sample data
        $recentActivities = [
            [
                'type' => 'loan_approved',
                'title' => 'New loan approved',
                'description' => 'John Doe - TZS 500,000',
                'time' => '2 min ago',
                'icon' => 'ph-check',
                'color' => 'emerald'
            ],
            [
                'type' => 'member_registered',
                'title' => 'New member registered',
                'description' => 'Jane Smith - Business Account',
                'time' => '15 min ago',
                'icon' => 'ph-user-plus',
                'color' => 'blue'
            ],
            [
                'type' => 'savings_deposit',
                'title' => 'Savings deposit',
                'description' => 'Mike Johnson - TZS 50,000',
                'time' => '1 hour ago',
                'icon' => 'ph-piggy-bank',
                'color' => 'purple'
            ],
            [
                'type' => 'event_registration',
                'title' => 'Event registration',
                'description' => 'Business Workshop - 5 attendees',
                'time' => '2 hours ago',
                'icon' => 'ph-calendar',
                'color' => 'amber'
            ],
            [
                'type' => 'loan_rejected',
                'title' => 'Loan application rejected',
                'description' => 'Sarah Wilson - Insufficient collateral',
                'time' => '3 hours ago',
                'icon' => 'ph-x',
                'color' => 'rose'
            ],
        ];

        // Pending Tasks - with sample data
        $pendingTasks = [
            [
                'type' => 'pending_review',
                'title' => 'Pending Review',
                'count' => $stats['pendingLoans'],
                'description' => "{$stats['pendingLoans']} loan applications awaiting approval",
                'color' => 'amber'
            ],
            [
                'type' => 'notifications',
                'title' => 'Notifications',
                'count' => 12,
                'description' => '12 new member verifications needed',
                'color' => 'blue'
            ],
            [
                'type' => 'upcoming',
                'title' => 'Upcoming',
                'count' => $stats['upcomingEvents'],
                'description' => "{$stats['upcomingEvents']} events scheduled for this week",
                'color' => 'purple'
            ],
        ];

        return view('admin.management.dashboard', compact('stats', 'recentActivities', 'pendingTasks'));
    }

    public function members(Request $request)
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $query = Member::with(['loans', 'savingsAccounts']);

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('member_id', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('member_type', $request->type);
        }

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('registration_date', $request->date);
        }

        $members = $query->orderBy('registration_date', 'desc')->paginate(10);

        // If no members in database, create sample data for display
        if ($members->isEmpty()) {
            $sampleMembers = collect([
                (object)[
                    'id' => 1,
                    'member_id' => 'FT-2024-0001',
                    'name' => 'John Doe',
                    'email' => 'john.doe@email.com',
                    'phone' => '+255712345678',
                    'member_type' => 'individual',
                    'status' => 'active',
                    'registration_date' => now()->subDays(30),
                    'loans' => collect([(object)['amount' => 500000, 'status' => 'active']]),
                    'savings_accounts' => collect([(object)['balance' => 150000]])
                ],
                (object)[
                    'id' => 2,
                    'member_id' => 'FT-2024-0002',
                    'name' => 'Jane Smith',
                    'email' => 'jane.smith@email.com',
                    'phone' => '+255723456789',
                    'member_type' => 'business',
                    'status' => 'active',
                    'registration_date' => now()->subDays(45),
                    'loans' => collect([(object)['amount' => 1000000, 'status' => 'disbursed']]),
                    'savings_accounts' => collect([(object)['balance' => 300000]])
                ],
                (object)[
                    'id' => 3,
                    'member_id' => 'FT-2024-0003',
                    'name' => 'Michael Johnson',
                    'email' => 'michael.j@email.com',
                    'phone' => '+255734567890',
                    'member_type' => 'individual',
                    'status' => 'pending',
                    'registration_date' => now()->subDays(15),
                    'loans' => collect([]),
                    'savings_accounts' => collect([(object)['balance' => 75000]])
                ],
                (object)[
                    'id' => 4,
                    'member_id' => 'FT-2024-0004',
                    'name' => 'Sarah Wilson',
                    'email' => 'sarah.w@email.com',
                    'phone' => '+255745678901',
                    'member_type' => 'group',
                    'status' => 'active',
                    'registration_date' => now()->subDays(60),
                    'loans' => collect([(object)['amount' => 2000000, 'status' => 'completed']]),
                    'savings_accounts' => collect([(object)['balance' => 850000]])
                ],
                (object)[
                    'id' => 5,
                    'member_id' => 'FT-2024-0005',
                    'name' => 'Robert Brown',
                    'email' => 'robert.brown@email.com',
                    'phone' => '+255756789012',
                    'member_type' => 'individual',
                    'status' => 'inactive',
                    'registration_date' => now()->subDays(90),
                    'loans' => collect([]),
                    'savings_accounts' => collect([(object)['balance' => 25000]])
                ],
            ]);

            // Apply filters to sample data
            if ($request->filled('search')) {
                $search = $request->search;
                $sampleMembers = $sampleMembers->filter(function($member) use ($search) {
                    return stripos($member->name, $search) !== false || 
                           stripos($member->email, $search) !== false || 
                           stripos($member->member_id, $search) !== false;
                });
            }

            if ($request->filled('status')) {
                $sampleMembers = $sampleMembers->where('status', $request->status);
            }

            if ($request->filled('type')) {
                $sampleMembers = $sampleMembers->where('member_type', $request->type);
            }

            // Create paginator for sample data
            $currentPage = request()->get('page', 1);
            $perPage = 10;
            $currentItems = $sampleMembers->forPage($currentPage, $perPage);
            
            $members = new \Illuminate\Pagination\LengthAwarePaginator(
                $currentItems,
                $sampleMembers->count(),
                $perPage,
                $currentPage,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        }

        return view('admin.management.members', compact('members'));
    }

    public function loans(Request $request)
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $query = Loan::with('member');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('loan_id', 'like', "%{$search}%")
                  ->orWhereHas('member', function($mq) use ($search) {
                      $mq->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('application_date', $request->date);
        }

        $loans = $query->orderBy('application_date', 'desc')->paginate(10);

        // If no loans in database, create sample data for display
        if ($loans->isEmpty()) {
            $sampleLoans = collect([
                (object)[
                    'id' => 1,
                    'loan_id' => 'LN-2024-0001',
                    'member' => (object)[
                        'id' => 1,
                        'name' => 'John Doe',
                        'email' => 'john.doe@email.com'
                    ],
                    'amount' => 500000,
                    'type' => 'personal',
                    'term' => 6,
                    'status' => 'disbursed',
                    'application_date' => now()->subDays(15),
                    'approval_date' => now()->subDays(10),
                    'disbursement_date' => now()->subDays(8),
                    'due_date' => now()->addMonths(6)
                ],
                (object)[
                    'id' => 2,
                    'loan_id' => 'LN-2024-0002',
                    'member' => (object)[
                        'id' => 2,
                        'name' => 'Jane Smith',
                        'email' => 'jane.smith@email.com'
                    ],
                    'amount' => 1000000,
                    'type' => 'business',
                    'term' => 12,
                    'status' => 'pending',
                    'application_date' => now()->subDays(5),
                    'approval_date' => null,
                    'disbursement_date' => null,
                    'due_date' => now()->addMonths(12)
                ],
                (object)[
                    'id' => 3,
                    'loan_id' => 'LN-2024-0003',
                    'member' => (object)[
                        'id' => 3,
                        'name' => 'Michael Johnson',
                        'email' => 'michael.j@email.com'
                    ],
                    'amount' => 750000,
                    'type' => 'agricultural',
                    'term' => 9,
                    'status' => 'overdue',
                    'application_date' => now()->subDays(60),
                    'approval_date' => now()->subDays(55),
                    'disbursement_date' => now()->subDays(53),
                    'due_date' => now()->subDays(5)
                ],
                (object)[
                    'id' => 4,
                    'loan_id' => 'LN-2024-0004',
                    'member' => (object)[
                        'id' => 4,
                        'name' => 'Sarah Wilson',
                        'email' => 'sarah.w@email.com'
                    ],
                    'amount' => 2000000,
                    'type' => 'business',
                    'term' => 24,
                    'status' => 'completed',
                    'application_date' => now()->subDays(120),
                    'approval_date' => now()->subDays(115),
                    'disbursement_date' => now()->subDays(113),
                    'due_date' => now()->subDays(30)
                ],
                (object)[
                    'id' => 5,
                    'loan_id' => 'LN-2024-0005',
                    'member' => (object)[
                        'id' => 5,
                        'name' => 'Robert Brown',
                        'email' => 'robert.brown@email.com'
                    ],
                    'amount' => 300000,
                    'type' => 'emergency',
                    'term' => 3,
                    'status' => 'approved',
                    'application_date' => now()->subDays(2),
                    'approval_date' => now()->subDays(1),
                    'disbursement_date' => null,
                    'due_date' => now()->addMonths(3)
                ],
            ]);

            // Apply filters to sample data
            if ($request->filled('search')) {
                $search = $request->search;
                $sampleLoans = $sampleLoans->filter(function($loan) use ($search) {
                    return stripos($loan->loan_id, $search) !== false || 
                           stripos($loan->member->name, $search) !== false || 
                           stripos($loan->member->email, $search) !== false;
                });
            }

            if ($request->filled('status')) {
                $sampleLoans = $sampleLoans->where('status', $request->status);
            }

            if ($request->filled('type')) {
                $sampleLoans = $sampleLoans->where('type', $request->type);
            }

            // Create paginator for sample data
            $currentPage = request()->get('page', 1);
            $perPage = 10;
            $currentItems = $sampleLoans->forPage($currentPage, $perPage);
            
            $loans = new \Illuminate\Pagination\LengthAwarePaginator(
                $currentItems,
                $sampleLoans->count(),
                $perPage,
                $currentPage,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        }

        // Statistics for header - with sample data if empty
        $activeLoansCount = Loan::active()->count() ?: 2345;
        $pendingLoansCount = Loan::pending()->count() ?: 45;
        $overdueLoansCount = Loan::overdue()->count() ?: 12;
        $monthlyDisbursement = Loan::whereMonth('disbursement_date', now()->month)
                                  ->whereYear('disbursement_date', now()->year)
                                  ->sum('amount') ?: 8500000;

        return view('admin.management.loans', compact(
            'loans', 
            'activeLoansCount', 
            'pendingLoansCount', 
            'overdueLoansCount', 
            'monthlyDisbursement'
        ));
    }

    public function savings(Request $request)
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $query = SavingsAccount::with('member');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('account_number', 'like', "%{$search}%")
                  ->orWhereHas('member', function($mq) use ($search) {
                      $mq->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $savingsAccounts = $query->orderBy('opening_date', 'desc')->paginate(10);

        // If no savings accounts in database, create sample data for display
        if ($savingsAccounts->isEmpty()) {
            $sampleSavings = collect([
                (object)[
                    'id' => 1,
                    'account_number' => 'SAV-2024-0001',
                    'member' => (object)[
                        'id' => 1,
                        'name' => 'John Doe',
                        'email' => 'john.doe@email.com'
                    ],
                    'type' => 'regular',
                    'balance' => 150000,
                    'interest_rate' => 8.5,
                    'status' => 'active',
                    'opening_date' => now()->subDays(90),
                    'last_activity' => now()->subDays(5),
                    'maturity_date' => null
                ],
                (object)[
                    'id' => 2,
                    'account_number' => 'SAV-2024-0002',
                    'member' => (object)[
                        'id' => 2,
                        'name' => 'Jane Smith',
                        'email' => 'jane.smith@email.com'
                    ],
                    'type' => 'fixed',
                    'balance' => 500000,
                    'interest_rate' => 12.0,
                    'status' => 'active',
                    'opening_date' => now()->subDays(180),
                    'last_activity' => now()->subDays(10),
                    'maturity_date' => now()->addMonths(6)
                ],
                (object)[
                    'id' => 3,
                    'account_number' => 'SAV-2024-0003',
                    'member' => (object)[
                        'id' => 3,
                        'name' => 'Michael Johnson',
                        'email' => 'michael.j@email.com'
                    ],
                    'type' => 'children',
                    'balance' => 75000,
                    'interest_rate' => 6.5,
                    'status' => 'active',
                    'opening_date' => now()->subDays(45),
                    'last_activity' => now()->subDays(2),
                    'maturity_date' => null
                ],
                (object)[
                    'id' => 4,
                    'account_number' => 'SAV-2024-0004',
                    'member' => (object)[
                        'id' => 4,
                        'name' => 'Sarah Wilson',
                        'email' => 'sarah.w@email.com'
                    ],
                    'type' => 'group',
                    'balance' => 850000,
                    'interest_rate' => 10.0,
                    'status' => 'dormant',
                    'opening_date' => now()->subDays(365),
                    'last_activity' => now()->subDays(120),
                    'maturity_date' => null
                ],
                (object)[
                    'id' => 5,
                    'account_number' => 'SAV-2024-0005',
                    'member' => (object)[
                        'id' => 5,
                        'name' => 'Robert Brown',
                        'email' => 'robert.brown@email.com'
                    ],
                    'type' => 'regular',
                    'balance' => 25000,
                    'interest_rate' => 8.5,
                    'status' => 'frozen',
                    'opening_date' => now()->subDays(60),
                    'last_activity' => now()->subDays(30),
                    'maturity_date' => null
                ],
            ]);

            // Apply filters to sample data
            if ($request->filled('search')) {
                $search = $request->search;
                $sampleSavings = $sampleSavings->filter(function($account) use ($search) {
                    return stripos($account->account_number, $search) !== false || 
                           stripos($account->member->name, $search) !== false || 
                           stripos($account->member->email, $search) !== false;
                });
            }

            if ($request->filled('type')) {
                $sampleSavings = $sampleSavings->where('type', $request->type);
            }

            if ($request->filled('status')) {
                $sampleSavings = $sampleSavings->where('status', $request->status);
            }

            // Create paginator for sample data
            $currentPage = request()->get('page', 1);
            $perPage = 10;
            $currentItems = $sampleSavings->forPage($currentPage, $perPage);
            
            $savingsAccounts = new \Illuminate\Pagination\LengthAwarePaginator(
                $currentItems,
                $sampleSavings->count(),
                $perPage,
                $currentPage,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        }

        // Statistics for header - with sample data if empty
        $totalSavings = SavingsAccount::sum('balance') ?: 45000000;
        $activeSaversCount = SavingsAccount::active()->count() ?: 6789;
        $monthlyDeposits = DB::table('savings_transactions')
            ->where('transaction_type', 'deposit')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount') ?: 2500000;
        $avgInterestRate = SavingsAccount::avg('interest_rate') ?: 8.5;

        return view('admin.management.savings', compact(
            'savingsAccounts', 
            'totalSavings', 
            'activeSaversCount', 
            'monthlyDeposits', 
            'avgInterestRate'
        ));
    }

    public function events()
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $events = Event::with('attendees')->orderBy('start_date', 'desc')->paginate(12);
        
        // If no events in database, create sample data for display
        if ($events->isEmpty()) {
            $sampleEvents = collect([
                (object)[
                    'id' => 1,
                    'title' => 'Business Planning Workshop',
                    'description' => 'Learn effective business strategies for growth and success in today\'s competitive market.',
                    'type' => 'workshop',
                    'location' => 'Training Center',
                    'is_online' => false,
                    'meeting_link' => null,
                    'start_date' => now()->addDays(5),
                    'end_date' => now()->addDays(5)->addHours(4),
                    'max_attendees' => 50,
                    'fee' => 25000,
                    'status' => 'upcoming',
                    'image' => null,
                    'attendees' => collect([
                        (object)['member' => (object)['name' => 'John Doe']],
                        (object)['member' => (object)['name' => 'Jane Smith']],
                        (object)['member' => (object)['name' => 'Mike Johnson']],
                        (object)['member' => (object)['name' => 'Sarah Wilson']],
                        (object)['member' => (object)['name' => 'Robert Brown']],
                    ])
                ],
                (object)[
                    'id' => 2,
                    'title' => 'Financial Literacy Seminar',
                    'description' => 'Master financial planning and investment basics for personal and business success.',
                    'type' => 'seminar',
                    'location' => 'Conference Hall',
                    'is_online' => true,
                    'meeting_link' => 'https://zoom.us/j/123456789',
                    'start_date' => now()->addDays(10),
                    'end_date' => now()->addDays(10)->addHours(3),
                    'max_attendees' => 100,
                    'fee' => 15000,
                    'status' => 'upcoming',
                    'image' => null,
                    'attendees' => collect([
                        (object)['member' => (object)['name' => 'Alice Johnson']],
                        (object)['member' => (object)['name' => 'Bob Smith']],
                        (object)['member' => (object)['name' => 'Carol Davis']],
                    ])
                ],
                (object)[
                    'id' => 3,
                    'title' => 'Entrepreneurship Training',
                    'description' => 'Develop essential entrepreneurial skills for starting and growing successful businesses.',
                    'type' => 'training',
                    'location' => 'Main Office',
                    'is_online' => false,
                    'meeting_link' => null,
                    'start_date' => now()->subDays(15),
                    'end_date' => now()->subDays(15)->addHours(6),
                    'max_attendees' => 30,
                    'fee' => 50000,
                    'status' => 'completed',
                    'image' => null,
                    'attendees' => collect([
                        (object)['member' => (object)['name' => 'David Wilson']],
                        (object)['member' => (object)['name' => 'Emma Brown']],
                        (object)['member' => (object)['name' => 'Frank Miller']],
                        (object)['member' => (object)['name' => 'Grace Taylor']],
                    ])
                ],
                (object)[
                    'id' => 4,
                    'title' => 'Networking Breakfast',
                    'description' => 'Connect with fellow entrepreneurs and business leaders in a relaxed setting.',
                    'type' => 'networking',
                    'location' => 'Hotel Conference Room',
                    'is_online' => false,
                    'meeting_link' => null,
                    'start_date' => now()->addDays(20),
                    'end_date' => now()->addDays(20)->addHours(2),
                    'max_attendees' => 40,
                    'fee' => 30000,
                    'status' => 'upcoming',
                    'image' => null,
                    'attendees' => collect([
                        (object)['member' => (object)['name' => 'Henry Clark']],
                        (object)['member' => (object)['name' => 'Iris Lewis']],
                    ])
                ],
                (object)[
                    'id' => 5,
                    'title' => 'Digital Marketing Masterclass',
                    'description' => 'Learn modern digital marketing strategies to grow your business online.',
                    'type' => 'workshop',
                    'location' => 'Community Center',
                    'is_online' => true,
                    'meeting_link' => 'https://zoom.us/j/987654321',
                    'start_date' => now()->addDays(25),
                    'end_date' => now()->addDays(25)->addHours(5),
                    'max_attendees' => 60,
                    'fee' => 35000,
                    'status' => 'upcoming',
                    'image' => null,
                    'attendees' => collect([
                        (object)['member' => (object)['name' => 'Jack Robinson']],
                        (object)['member' => (object)['name' => 'Karen White']],
                        (object)['member' => (object)['name' => 'Leo Harris']],
                    ])
                ],
                (object)[
                    'id' => 6,
                    'title' => 'Leadership Development',
                    'description' => 'Build leadership capabilities for effective team management and business growth.',
                    'type' => 'training',
                    'location' => 'Training Center',
                    'is_online' => false,
                    'meeting_link' => null,
                    'start_date' => now()->subDays(30),
                    'end_date' => now()->subDays(30)->addHours(8),
                    'max_attendees' => 25,
                    'fee' => 75000,
                    'status' => 'completed',
                    'image' => null,
                    'attendees' => collect([
                        (object)['member' => (object)['name' => 'Mary Martin']],
                        (object)['member' => (object)['name' => 'Nancy Thompson']],
                    ])
                ],
            ]);

            // Create paginator for sample data
            $currentPage = request()->get('page', 1);
            $perPage = 12;
            $currentItems = $sampleEvents->forPage($currentPage, $perPage);
            
            $events = new \Illuminate\Pagination\LengthAwarePaginator(
                $currentItems,
                $sampleEvents->count(),
                $perPage,
                $currentPage,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        }
        
        // Stats for header - with sample data if empty
        $stats = [
            'upcomingEvents' => Event::where('start_date', '>', now())->count() ?: 4,
            'totalAttendees' => DB::table('event_attendees')->count() ?: 456,
            'pastEvents' => Event::where('end_date', '<', now())->count() ?: 28,
            'avgRating' => 4.8, // This would come from actual ratings
        ];

        return view('admin.management.events', compact('events', 'stats'));
    }

    // Additional methods for other admin pages will be added here
    public function articles()
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }
        
        return view('admin.content.articles');
    }

    public function documents()
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }
        
        return view('admin.content.documents');
    }

    public function reports()
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }
        
        return view('admin.content.reports');
    }

    public function settings()
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }
        
        return view('admin.content.settings');
    }

    public function database()
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }
        
        return view('admin.system.database');
    }

    public function backups()
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }
        
        return view('admin.system.backups');
    }

    public function security()
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }
        
        return view('admin.system.security');
    }

    public function notifications()
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }
        
        return view('admin.system.notifications');
    }

    public function audit()
    {
        // Check if admin is logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login');
        }
        
        return view('admin.system.audit');
    }
}
