<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIA Admin Dashboard</title>
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
            --navy-dark: #1e293b;
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
        
        .nav-gradient {
            background: linear-gradient(135deg, var(--navy-dark), var(--dark-green));
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-4px);
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
        
        .stat-card-gradient-1 {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }
        
        .stat-card-gradient-2 {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }
        
        .stat-card-gradient-3 {
            background: linear-gradient(135deg, #10b981, #059669);
        }
        
        .stat-card-gradient-4 {
            background: linear-gradient(135deg, #ef4444, #dc2626);
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
            width: 400px;
            height: 400px;
            background: var(--primary-green);
            border-radius: 50%;
            top: -200px;
            right: -200px;
            animation: float 8s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 300px;
            height: 300px;
            background: var(--accent-green);
            border-radius: 50%;
            bottom: -150px;
            left: -150px;
            animation: float 10s ease-in-out infinite reverse;
        }
        
        .shape-3 {
            width: 200px;
            height: 200px;
            background: var(--light-green);
            border-radius: 50%;
            top: 30%;
            left: -100px;
            animation: float 9s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .table-hover:hover {
            background-color: rgba(16, 185, 129, 0.05);
        }
        
        .badge-success {
            background: linear-gradient(135deg, #10b981, #059669);
        }
        
        .badge-pending {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }
        
        .badge-rejected {
            background: linear-gradient(135deg, #ef4444, #dc2626);
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
            <div class="shape shape-3"></div>
        </div>
        
        <!-- Navigation -->
        <nav class="nav-gradient shadow-xl relative z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.586-4L12 3l4 4m0 0l-4 4m4-4H7"></path>
                                </svg>
                            </div>
                            <h1 class="text-white text-xl font-manrope font-bold">FIA Admin Dashboard</h1>
                        </div>
                    </div>
                    <div class="flex items-center mobile-stack">
                        <form action="{{ route('fia.admin.export') }}" method="GET" class="inline">
                            @if(request('status'))
                                <input type="hidden" name="status" value="{{ request('status') }}">
                            @endif
                            <button type="submit" class="btn-primary text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Export CSV</span>
                            </button>
                        </form>
                        <form action="{{ route('fia.admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center space-x-2 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="relative z-10 max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Success/Error Messages -->
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

            <!-- Page Header -->
            <div class="mb-8">
                <h2 class="font-manrope text-3xl font-bold gradient-text mb-2">Payment Submissions Overview</h2>
                <p class="font-lato text-gray-600">Manage and monitor all FIA payment submissions</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card-gradient-1 rounded-xl p-6 text-white card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm font-medium">Total Submissions</p>
                            <p class="text-3xl font-bold mt-2">{{ number_format($stats['total_submissions']) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card-gradient-2 rounded-xl p-6 text-white card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-yellow-100 text-sm font-medium">Pending</p>
                            <p class="text-3xl font-bold mt-2">{{ number_format($stats['pending_submissions']) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card-gradient-3 rounded-xl p-6 text-white card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-sm font-medium">Verified</p>
                            <p class="text-3xl font-bold mt-2">{{ number_format($stats['verified_submissions']) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card-gradient-4 rounded-xl p-6 text-white card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-red-100 text-sm font-medium">Rejected</p>
                            <p class="text-3xl font-bold mt-2">{{ number_format($stats['rejected_submissions']) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial Summary -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="glass-effect rounded-xl p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Gawio la FIA</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">{{ number_format($stats['total_gawio'], 2) }}</p>
                            <p class="text-xs text-gray-500 mt-1">TZS</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">G</span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total FIA Koma</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">{{ number_format($stats['total_fia_koma'], 2) }}</p>
                            <p class="text-xs text-gray-500 mt-1">TZS</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">F</span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Amount</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">{{ number_format($stats['total_amount'], 2) }}</p>
                            <p class="text-xs text-gray-500 mt-1">TZS</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">T</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter -->
            <div class="glass-effect rounded-xl p-6 mb-8">
                <form method="GET" action="{{ route('fia.admin.dashboard') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Search by Member ID or Name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">All Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="btn-primary text-white px-6 py-2 rounded-lg font-medium w-full">
                                Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Results Table -->
            <div class="glass-effect rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="font-manrope text-lg font-semibold text-gray-900">Payment Submissions</h3>
                    <p class="text-sm text-gray-500 mt-1">Showing {{ $confirmations->firstItem() }} to {{ $confirmations->lastItem() }} of {{ $confirmations->total() }} results</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gawio</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">FIA Koma</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumla</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Method</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($confirmations as $confirmation)
                                <tr class="table-hover">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ str_pad($confirmation->id, 6, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->member_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->member_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->member_type }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ number_format($confirmation->amount_to_pay, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->paymentRecord ? number_format($confirmation->paymentRecord->gawio_la_fia, 2) : '0.00' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->paymentRecord ? number_format($confirmation->paymentRecord->fia_iliyokomaa, 2) : '0.00' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->paymentRecord ? number_format($confirmation->paymentRecord->jumla, 2) : '0.00' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @if($confirmation->payment_method)
                                            @switch($confirmation->payment_method)
                                                @case('akiba')
                                                    <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800 font-medium">Akiba</span>
                                                    @break
                                                @case('impe')
                                                    <span class="px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-800 font-medium">IMPE {{ $confirmation->impe_years }}y</span>
                                                    @break
                                                @case('cash_mobile')
                                                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800 font-medium">Mobile</span>
                                                    @break
                                                @case('cash_bank')
                                                    <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800 font-medium">Bank</span>
                                                    @break
                                            @endswitch
                                        @else
                                            <span class="text-gray-400">Not set</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($confirmation->status == 'pending')
                                            <span class="badge-pending px-3 py-1 text-xs rounded-full text-white font-medium">Pending</span>
                                        @elseif($confirmation->status == 'verified')
                                            <span class="badge-success px-3 py-1 text-xs rounded-full text-white font-medium">Verified</span>
                                        @elseif($confirmation->status == 'rejected')
                                            <span class="badge-rejected px-3 py-1 text-xs rounded-full text-white font-medium">Rejected</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $confirmation->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('fia.edit.payment', $confirmation->id) }}" class="text-green-600 hover:text-green-900 font-medium">Edit</a>
                                            <form action="{{ route('fia.update.status', $confirmation->id) }}" method="POST" class="inline">
                                                @csrf
                                                @if($confirmation->status == 'pending')
                                                    <button type="submit" name="status" value="verified" class="text-blue-600 hover:text-blue-900 font-medium">Verify</button>
                                                @elseif($confirmation->status == 'verified')
                                                    <button type="submit" name="status" value="rejected" class="text-red-600 hover:text-red-900 font-medium">Reject</button>
                                                @endif
                                            </form>
                                            <a href="{{ route('fia.confirmation', $confirmation->id) }}" class="text-gray-600 hover:text-gray-900 font-medium">View</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="px-6 py-12 text-center text-gray-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="mt-2 text-lg font-medium">No payment submissions found</p>
                                        <p class="mt-1">Get started by submitting some payment verifications.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if($confirmations->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $confirmations->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
                                <dd class="text-lg font-medium text-gray-900">{{ number_format($stats['total_gawio'], 2) }} TZS</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-500 rounded-md flex items-center justify-center">
                                <span class="text-white font-bold text-sm">F</span>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total FIA Ilivyo Koma</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ number_format($stats['total_fia_koma'], 2) }} TZS</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-pink-500 rounded-md flex items-center justify-center">
                                <span class="text-white font-bold text-sm">J</span>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Jumla</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ number_format($stats['total_jumla'], 2) }} TZS</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="bg-white shadow rounded-lg mb-6">
            <div class="px-4 py-5 sm:p-6">
                <form method="GET" action="{{ route('fia.admin.dashboard') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                            <input type="text" id="search" name="search" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                   placeholder="Member ID, Name, or Email"
                                   value="{{ request('search') }}">
                        </div>
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                <option value="">All Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md">
                                🔍 Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Submissions Table -->
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Payment Submissions</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Showing {{ $confirmations->firstItem() }} to {{ $confirmations->lastItem() }} of {{ $confirmations->total() }} results
                </p>
            </div>
            <div class="border-t border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gawio</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">FIA Koma</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumla</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Method</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($confirmations as $confirmation)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ str_pad($confirmation->id, 6, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->member_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->member_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->member_type }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ number_format($confirmation->amount_to_pay, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->paymentRecord ? number_format($confirmation->paymentRecord->gawio_la_fia, 2) : '0.00' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->paymentRecord ? number_format($confirmation->paymentRecord->fia_iliyokomaa, 2) : '0.00' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->paymentRecord ? number_format($confirmation->paymentRecord->jumla, 2) : '0.00' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @if($confirmation->payment_method)
                                            @switch($confirmation->payment_method)
                                                @case('akiba')
                                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">Akiba</span>
                                                    @break
                                                @case('impe')
                                                    <span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-800">IMPE {{ $confirmation->impe_years }}y</span>
                                                    @break
                                                @case('cash_mobile')
                                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Mobile</span>
                                                    @break
                                                @case('cash_bank')
                                                    <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Bank</span>
                                                    @break
                                            @endswitch
                                        @else
                                            <span class="text-gray-400">Not set</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($confirmation->status == 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($confirmation->status == 'verified') bg-green-100 text-green-800
                                            @elseif($confirmation->status == 'rejected') bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst($confirmation->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $confirmation->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('fia.admin.edit', $confirmation->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                            Edit
                                        </a>
                                        <form action="{{ route('fia.admin.status', $confirmation->id) }}" method="POST" class="inline">
                                            @csrf
                                            <select name="status" onchange="this.form.submit()" class="text-sm border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                                                <option value="pending" {{ $confirmation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="verified" {{ $confirmation->status == 'verified' ? 'selected' : '' }}>Verified</option>
                                                <option value="rejected" {{ $confirmation->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </form>
                                        <a href="{{ route('fia.confirmation', $confirmation->id) }}" target="_blank" class="ml-2 text-indigo-600 hover:text-indigo-900">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="px-6 py-4 text-center text-sm text-gray-500">
                                        No submissions found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Pagination -->
            @if($confirmations->hasPages())
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    {{ $confirmations->links() }}
                </div>
            @endif
        </div>
    </div>
</body>
</html>
