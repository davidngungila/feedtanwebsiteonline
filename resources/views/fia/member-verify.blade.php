<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodoso Verification</title>
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
        
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .input-focus {
            transition: all 0.3s ease;
        }
        
        .input-focus:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
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
            opacity: 0.1;
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
        
        .shape-3 {
            width: 150px;
            height: 150px;
            background: var(--light-green);
            border-radius: 50%;
            top: 50%;
            left: -75px;
            animation: float 7s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .card-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        @media (max-width: 640px) {
            .mobile-padding {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center py-8 px-4 sm:px-6 lg:px-8 relative">
        <!-- Floating Background Shapes -->
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
        
        <!-- Main Container -->
        <div class="relative z-10 w-full max-w-4xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="font-manrope text-4xl sm:text-5xl font-bold gradient-text mb-4">
                    Dodoso Verification
                </h1>
                <p class="font-lato text-lg text-gray-600 max-w-2xl mx-auto">
                    Enter your Member ID to verify your payment details and manage your account securely
                </p>
            </div>

            <!-- Error Message -->
            @if(session('error'))
                <div class="mb-6 glass-effect rounded-xl p-4 border-l-4 border-red-500 card-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-red-800 font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Main Card -->
            <div class="glass-effect rounded-2xl p-8 sm:p-12 card-shadow hover-scale">
                <form class="space-y-8" action="{{ route('dodoso.member.verify.process') }}" method="POST">
                    @csrf
                    
                    <!-- Input Section -->
                    <div class="space-y-4">
                        <label for="member_id" class="block text-sm font-manrope font-semibold text-gray-700 uppercase tracking-wide">
                            Member ID
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                </svg>
                            </div>
                            <input 
                                id="member_id" 
                                name="member_id" 
                                type="text" 
                                required 
                                class="font-charon w-full pl-12 pr-4 py-4 text-lg border-2 border-gray-200 rounded-xl input-focus outline-none bg-white/50"
                                placeholder="Enter your Member ID (e.g., PRMH3, FNDH2, ORDH4)" 
                                value="{{ old('member_id') }}"
                            >
                        </div>
                        <p class="text-sm text-gray-500 font-lato">
                            Make sure your Member ID is correct before proceeding
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button 
                            type="submit" 
                            class="w-full btn-primary text-white font-manrope font-semibold py-4 px-6 rounded-xl text-lg flex items-center justify-center space-x-3 shadow-lg"
                        >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"></path>
                            </svg>
                            <span>Verify Member ID</span>
                        </button>
                    </div>
                </form>

                <!-- Footer Info -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm text-gray-600 font-lato">Secure Verification System</span>
                        </div>
                        <div class="text-sm text-gray-500 font-lato">
                            Powered by Dodoso Platform
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
