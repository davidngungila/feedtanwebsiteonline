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
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-manrope text-lg font-semibold text-gray-900">Payment Submissions</h3>
                            <p class="text-sm text-gray-500 mt-1">Showing {{ $confirmations->firstItem() ?? 0 }} to {{ $confirmations->lastItem() ?? 0 }} of {{ $confirmations->total() }} results</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">Sort by:</span>
                            <select class="text-sm border border-gray-300 rounded-lg px-3 py-1 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option>Latest First</option>
                                <option>Oldest First</option>
                                <option>Member ID</option>
                                <option>Status</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Balance</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($confirmations as $confirmation)
                                @php
                                    // Skip duplicate entries based on member_id and created_at
                                    $uniqueKey = $confirmation->member_id . '_' . $confirmation->created_at->format('Y-m-d_H-i-s');
                                    if(isset($shownRecords) && in_array($uniqueKey, $shownRecords)) continue;
                                    $shownRecords[] = $uniqueKey;
                                @endphp
                                <tr class="table-hover hover:bg-green-50 transition-colors">
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-900 font-charon">#{{ str_pad($confirmation->id, 6, '0', STR_PAD_LEFT) }}</span>
                                            <span class="text-xs text-gray-500">{{ $confirmation->created_at->format('H:i') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex flex-col">
                                            <div class="flex items-center">
                                                <div class="w-6 h-6 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center mr-2">
                                                    <span class="text-white text-xs font-bold">{{ substr($confirmation->member_id, 0, 1) }}</span>
                                                </div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">{{ $confirmation->member_name }}</p>
                                                    <p class="text-xs text-gray-500 font-charon">{{ $confirmation->member_id }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-full bg-indigo-100 text-indigo-800 font-medium">
                                            {{ $confirmation->member_type }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="text-sm">
                                            <p class="font-medium text-gray-900 font-charon">{{ number_format($confirmation->amount_to_pay, 2) }}</p>
                                            <p class="text-xs text-gray-500">TZS</p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="text-sm">
                                            @if($confirmation->paymentRecord)
                                                <p class="font-medium text-green-600 font-charon">{{ number_format($confirmation->paymentRecord->kiasi_baki, 2) }}</p>
                                                <p class="text-xs text-gray-500">TZS</p>
                                            @else
                                                <p class="font-medium text-gray-400 font-charon">0.00</p>
                                                <p class="text-xs text-gray-400">TZS</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        @if($confirmation->payment_method)
                                            @switch($confirmation->payment_method)
                                                @case('akiba')
                                                    <div class="flex items-center">
                                                        <div class="w-4 h-4 bg-blue-500 rounded-full mr-1"></div>
                                                        <span class="text-xs">Akiba</span>
                                                    </div>
                                                    @break
                                                @case('impe')
                                                    <div class="flex items-center">
                                                        <div class="w-4 h-4 bg-purple-500 rounded-full mr-1"></div>
                                                        <span class="text-xs">IMPE {{ $confirmation->impe_years ?? '' }}y</span>
                                                    </div>
                                                    @break
                                                @case('cash_mobile')
                                                    <div class="flex items-center">
                                                        <div class="w-4 h-4 bg-green-500 rounded-full mr-1"></div>
                                                        <span class="text-xs">Mobile</span>
                                                    </div>
                                                    @break
                                                @case('cash_bank')
                                                    <div class="flex items-center">
                                                        <div class="w-4 h-4 bg-yellow-500 rounded-full mr-1"></div>
                                                        <span class="text-xs">Bank</span>
                                                    </div>
                                                    @break
                                                @default
                                                    <span class="text-xs text-gray-400">Unknown</span>
                                            @endswitch
                                        @else
                                            <span class="text-xs text-gray-400">Not set</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        @if($confirmation->status == 'pending')
                                            <span class="badge-pending px-2 py-1 text-xs rounded-full text-white font-medium">Pending</span>
                                        @elseif($confirmation->status == 'verified')
                                            <span class="badge-success px-2 py-1 text-xs rounded-full text-white font-medium">Verified</span>
                                        @elseif($confirmation->status == 'rejected')
                                            <span class="badge-rejected px-2 py-1 text-xs rounded-full text-white font-medium">Rejected</span>
                                        @else
                                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800 font-medium">Unknown</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">
                                            <p>{{ $confirmation->created_at->format('M d, Y') }}</p>
                                            <p class="text-xs">{{ $confirmation->created_at->format('H:i A') }}</p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-1">
                                            <a href="{{ route('fia.admin.edit', $confirmation->id) }}" 
                                               class="text-green-600 hover:text-green-900 p-1 hover:bg-green-50 rounded transition-colors" 
                                               title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            @if($confirmation->status == 'pending')
                                                <form action="{{ route('fia.admin.status', $confirmation->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" name="status" value="verified" 
                                                            class="text-blue-600 hover:text-blue-900 p-1 hover:bg-blue-50 rounded transition-colors" 
                                                            title="Verify">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @elseif($confirmation->status == 'verified')
                                                <form action="{{ route('fia.admin.status', $confirmation->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" name="status" value="rejected" 
                                                            class="text-red-600 hover:text-red-900 p-1 hover:bg-red-50 rounded transition-colors" 
                                                            title="Reject">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('fia.confirmation', $confirmation->id) }}" 
                                               class="text-gray-600 hover:text-gray-900 p-1 hover:bg-gray-50 rounded transition-colors" 
                                               title="View">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-12 text-center text-gray-500">
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
                
                <!-- Enhanced Pagination -->
                @if($confirmations->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Showing <span class="font-medium">{{ $confirmations->firstItem() ?? 0 }}</span> to 
                                <span class="font-medium">{{ $confirmations->lastItem() ?? 0 }}</span> of 
                                <span class="font-medium">{{ $confirmations->total() }}</span> results
                            </div>
                            <div>
                                {{ $confirmations->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
                
