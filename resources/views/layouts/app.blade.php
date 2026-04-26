<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title', config('app.name', 'FeedTan Community Microfinance Group'))</title>

        <meta name="description" content="@yield('description', 'FeedTan Community Microfinance Group - Transparent microfinance solutions for entrepreneurs and communities in Moshi, Kilimanjaro.')">

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-31S328VKTY"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-31S328VKTY');
        </script>

        <link rel="icon" href="{{ url('/favicon.ico') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/@phosphor-icons/web"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Manrope', sans-serif; }
            .font-serif { font-family: 'Playfair Display', serif; }
            .glass { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(15px); }
            [x-cloak] { display: none !important; }
            .nav-link { font-size: 1.05rem; position: relative; }
            .nav-link::after {
                content: '';
                position: absolute;
                bottom: 1.5rem;
                left: 0;
                width: 0;
                height: 2px;
                background: linear-gradient(90deg, #064e3b 0%, #10b981 100%);
                transition: width 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            }
            .nav-link:hover::after {
                width: 100%;
                animation: borderSlide 1s infinite linear;
                background: linear-gradient(90deg, #064e3b 25%, #10b981 25%, #10b981 50%, #064e3b 50%, #064e3b 75%, #10b981 75%);
                background-size: 200% 100%;
            }
            @keyframes borderSlide {
                0% { background-position: 100% 0; }
                100% { background-position: -100% 0; }
            }
            .group:hover .mega-menu { opacity: 1; visibility: visible; transform: translateY(0); }
            .mega-menu {
                opacity: 0;
                visibility: hidden;
                transform: translateY(10px);
                transition: all 0.3s ease;
            }
            .nav-border-animate {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 2px;
                background: linear-gradient(90deg, #064e3b 25%, #10b981 25%, #10b981 50%, #064e3b 50%, #064e3b 75%, #10b981 75%);
                background-size: 200% 100%;
                animation: borderSlide 3s infinite linear;
            }
        </style>
    </head>
    <body class="min-h-screen bg-white text-slate-900 antialiased font-medium" x-data="{ mobileMenuOpen: false }">
        <nav class="fixed top-0 w-full z-50 glass border-b border-slate-100">
            <div class="max-w-7xl mx-auto px-6 h-24 flex items-center justify-between">
                <a href="{{ url('/') }}" class="flex items-center group/logo">
                    <img src="{{ asset('logo.png') }}" alt="FeedTan Logo" class="h-20 w-20 rounded-3xl object-contain bg-white p-3 transition-transform group-hover/logo:scale-110 shadow-xl shadow-emerald-600/20">
                </a>

                <div class="hidden lg:flex items-center gap-10">
                    <a href="{{ url('/') }}" class="nav-link font-bold hover:text-emerald-600 transition-colors py-8">Home</a>

                    <div class="relative group py-8">
                        <a href="{{ url('/products') }}" class="nav-link font-bold hover:text-emerald-600 transition-colors flex items-center gap-1">
                            Services <i class="ph ph-caret-down text-xs transition-transform group-hover:rotate-180"></i>
                        </a>
                        <div class="mega-menu absolute top-full left-0 w-[700px] bg-white rounded-[2rem] shadow-2xl border border-slate-100 p-8 z-50">
                            <div class="grid grid-cols-3 gap-6">
                                <div>
                                    <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Financial Services</h4>
                                    <div class="space-y-3">
                                        <a href="{{ url('/products') }}#loans" class="flex items-center gap-3 group/item p-3 rounded-2xl hover:bg-emerald-50 transition-all">
                                            <div class="w-10 h-10 rounded-xl overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover" alt="Micro-loans">
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900 group-hover/item:text-emerald-600 text-sm">Micro-loans</div>
                                                <div class="text-xs text-slate-500">Quick funding</div>
                                            </div>
                                        </a>
                                        <a href="{{ url('/savings') }}" class="flex items-center gap-3 group/item p-3 rounded-2xl hover:bg-emerald-50 transition-all">
                                            <div class="w-10 h-10 rounded-xl overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover" alt="Savings">
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900 group-hover/item:text-emerald-600 text-sm">Savings</div>
                                                <div class="text-xs text-slate-500">Secure accounts</div>
                                            </div>
                                        </a>
                                        <a href="{{ url('/investment') }}" class="flex items-center gap-3 group/item p-3 rounded-2xl hover:bg-emerald-50 transition-all">
                                            <div class="w-10 h-10 rounded-xl overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover" alt="Investment">
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900 group-hover/item:text-emerald-600 text-sm">Investments</div>
                                                <div class="text-xs text-slate-500">Grow wealth</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Community Services</h4>
                                    <div class="space-y-3">
                                        <a href="{{ url('/social-welfare') }}" class="flex items-center gap-3 group/item p-3 rounded-2xl hover:bg-emerald-50 transition-all">
                                            <div class="w-10 h-10 rounded-xl overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover" alt="Social Welfare">
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900 group-hover/item:text-emerald-600 text-sm">Welfare Fund</div>
                                                <div class="text-xs text-slate-500">Community support</div>
                                            </div>
                                        </a>
                                        <a href="{{ url('/training') }}" class="flex items-center gap-3 group/item p-3 rounded-2xl hover:bg-emerald-50 transition-all">
                                            <div class="w-10 h-10 rounded-xl overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover" alt="Training">
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900 group-hover/item:text-emerald-600 text-sm">Training</div>
                                                <div class="text-xs text-slate-500">Skills development</div>
                                            </div>
                                        </a>
                                        <a href="{{ url('/events') }}" class="flex items-center gap-3 group/item p-3 rounded-2xl hover:bg-emerald-50 transition-all">
                                            <div class="w-10 h-10 rounded-xl overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover" alt="Events">
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900 group-hover/item:text-emerald-600 text-sm">Events</div>
                                                <div class="text-xs text-slate-500">Workshops & seminars</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-xs font-black uppercase tracking-widest text-emerald-600 mb-6">Resources</h4>
                                    <div class="space-y-3">
                                        <a href="{{ url('/articles') }}" class="flex items-center gap-3 group/item p-3 rounded-2xl hover:bg-emerald-50 transition-all">
                                            <div class="w-10 h-10 rounded-xl overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover" alt="Articles">
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900 group-hover/item:text-emerald-600 text-sm">Articles</div>
                                                <div class="text-xs text-slate-500">Insights & tips</div>
                                            </div>
                                        </a>
                                        <a href="{{ url('/documents') }}" class="flex items-center gap-3 group/item p-3 rounded-2xl hover:bg-emerald-50 transition-all">
                                            <div class="w-10 h-10 rounded-xl overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover" alt="Documents">
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900 group-hover/item:text-emerald-600 text-sm">Documents</div>
                                                <div class="text-xs text-slate-500">Forms & guides</div>
                                            </div>
                                        </a>
                                        <a href="{{ url('/products') }}#groups" class="flex items-center gap-3 group/item p-3 rounded-2xl hover:bg-emerald-50 transition-all">
                                            <div class="w-10 h-10 rounded-xl overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover" alt="Groups">
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900 group-hover/item:text-emerald-600 text-sm">Group Lending</div>
                                                <div class="text-xs text-slate-500">Community finance</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 pt-6 border-t border-slate-50">
                                <a href="{{ url('/products') }}" class="text-sm font-black text-emerald-600 flex items-center gap-2 hover:gap-3 transition-all">
                                    Explore All Services <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('/pricing') }}" class="nav-link font-bold hover:text-emerald-600 transition-colors py-8">Pricing</a>
                    <a href="{{ url('/about') }}" class="nav-link font-bold hover:text-emerald-600 transition-colors py-8">About Us</a>
                    <a href="{{ route('dodoso.survey.index') }}" class="nav-link font-bold hover:text-emerald-600 transition-colors py-8">Dodoso</a>
                    <a href="{{ url('/contact') }}" class="nav-link font-bold hover:text-emerald-600 transition-colors py-8">Contact</a>
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ url('/contact') }}" class="hidden md:inline-flex items-center gap-2 text-sm font-semibold text-white bg-emerald-600 px-6 py-2.5 rounded-full hover:bg-emerald-700 shadow-lg shadow-emerald-600/20 transition-all">Apply Now</a>

                    <button @click="mobileMenuOpen = true" class="lg:hidden w-12 h-12 bg-slate-50 text-slate-900 rounded-2xl flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-all" type="button">
                        <i class="ph ph-list text-2xl"></i>
                    </button>
                </div>
            </div>
            <div class="nav-border-animate"></div>
        </nav>

        <div x-cloak x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-x-full"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 translate-x-full"
             class="fixed inset-0 z-[100] lg:hidden">

            <div class="absolute inset-0 bg-slate-950/60 backdrop-blur-md" @click="mobileMenuOpen = false"></div>

            <div class="absolute right-0 top-0 bottom-0 w-[85%] max-w-sm bg-white shadow-2xl overflow-y-auto">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-12">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-600 text-white font-black">FT</span>
                            <span class="font-black text-slate-900">FEEDTAN</span>
                        </div>
                        <button @click="mobileMenuOpen = false" class="w-10 h-10 bg-slate-100 text-slate-400 rounded-xl flex items-center justify-center hover:bg-rose-50 hover:text-rose-500 transition-all" type="button">
                            <i class="ph ph-x text-2xl"></i>
                        </button>
                    </div>

                    <div class="space-y-6">
                        <a href="{{ url('/') }}" class="block text-2xl font-serif font-black text-slate-900 hover:text-emerald-600">Home</a>

                        <div x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center justify-between w-full text-2xl font-serif font-black text-slate-900" type="button">
                                Services <i class="ph ph-caret-down text-lg transition-transform" :class="open ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="open" x-transition class="pl-4 mt-4 space-y-4">
                                <a href="{{ url('/products') }}#loans" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Micro-loans</a>
                                <a href="{{ url('/savings') }}" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Savings & Deposits</a>
                                <a href="{{ url('/investment') }}" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Investment Fund</a>
                                <a href="{{ url('/social-welfare') }}" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Social Welfare Fund</a>
                                <a href="{{ url('/training') }}" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Training & Mentorship</a>
                                <a href="{{ url('/events') }}" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Upcoming Events</a>
                                <a href="{{ url('/articles') }}" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Articles & Resources</a>
                                <a href="{{ url('/documents') }}" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Documents & Forms</a>
                                <a href="{{ url('/products') }}#groups" class="block text-sm font-bold text-slate-500 hover:text-emerald-600">Group Lending</a>
                            </div>
                        </div>

                        <a href="{{ url('/pricing') }}" class="block text-2xl font-serif font-black text-slate-900 hover:text-emerald-600">Pricing</a>
                        <a href="{{ url('/about') }}" class="block text-2xl font-serif font-black text-slate-900 hover:text-emerald-600">About Us</a>
                        <a href="{{ route('dodoso.survey.index') }}" class="block text-2xl font-serif font-black text-slate-900 hover:text-emerald-600">Dodoso</a>
                        <a href="{{ url('/contact') }}" class="block text-2xl font-serif font-black text-slate-900 hover:text-emerald-600">Contact</a>
                    </div>

                    <div class="mt-20 pt-10 border-t border-slate-100">
                        <div class="bg-emerald-950 p-8 rounded-[2.5rem] text-white">
                            <h4 class="text-lg font-serif font-black mb-2">Ready to start?</h4>
                            <p class="text-sm text-emerald-100/60 mb-8 leading-relaxed">Apply online or request a callback from our team.</p>
                            <a href="{{ url('/contact') }}" class="w-full inline-block py-4 bg-emerald-500 text-white font-black text-xs uppercase tracking-widest text-center rounded-2xl shadow-xl shadow-emerald-500/20">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="pt-24 lg:pt-28">
            @yield('content')
        </main>

        <footer class="relative bg-slate-900 text-white pt-20 pb-10">
            <!-- Dark green border lines -->
            <div class="absolute top-4 left-0 w-full h-px bg-emerald-900"></div>
            <div class="absolute top-6 left-0 w-full h-px bg-emerald-900"></div>
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-20">
                <div class="col-span-1 md:col-span-1 lg:col-span-1">
                    <a href="{{ url('/') }}" class="flex items-center justify-center mb-6">
                        <img src="{{ asset('logo.png') }}" alt="FeedTan Logo" class="h-24 w-24 rounded-3xl object-contain bg-white p-4 shadow-2xl shadow-emerald-600/20">
                    </a>
                    <p class="text-slate-400 leading-relaxed text-sm mb-6">
                        Microfinance built for entrepreneurs and communities. Transparent pricing, flexible repayment, and support beyond the loan.
                    </p>
                    <div class="flex items-center gap-4">
                        <span class="text-xs font-bold text-emerald-400">Member Since 2020</span>
                        <span class="text-xs text-slate-500">|</span>
                        <span class="text-xs font-bold text-emerald-400">Services</span>
                        <span class="text-xs text-slate-500">|</span>
                        <span class="text-xs font-bold text-emerald-400">10,000+ Clients</span>
                    </div>
                    <div class="flex gap-3 mt-6">
                        <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center hover:bg-emerald-600 transition-colors" aria-label="Facebook"><i class="ph ph-facebook-logo text-white"></i></a>
                        <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center hover:bg-emerald-600 transition-colors" aria-label="Twitter"><i class="ph ph-twitter-logo text-white"></i></a>
                        <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center hover:bg-emerald-600 transition-colors" aria-label="LinkedIn"><i class="ph ph-linkedin-logo text-white"></i></a>
                        <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center hover:bg-emerald-600 transition-colors" aria-label="WhatsApp"><i class="ph ph-whatsapp-logo text-white"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold mb-6 text-emerald-500">Quick Links</h4>
                    <ul class="space-y-4 text-sm text-slate-400">
                        <li><a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ url('/products') }}" class="hover:text-white transition-colors">Products</a></li>
                        <li><a href="{{ url('/pricing') }}" class="hover:text-white transition-colors">Pricing</a></li>
                        <li><a href="{{ route('dodoso.survey.index') }}" class="hover:text-white transition-colors">Dodoso</a></li>
                        <li><a href="{{ url('/about') }}" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="{{ url('/contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-6 text-emerald-500">Products</h4>
                    <ul class="space-y-4 text-sm text-slate-400">
                        <li><a href="{{ url('/products') }}#loans" class="hover:text-white transition-colors">Micro-loans</a></li>
                        <li><a href="{{ url('/products') }}#savings" class="hover:text-white transition-colors">Savings</a></li>
                        <li><a href="{{ url('/products') }}#business" class="hover:text-white transition-colors">Business tools</a></li>
                        <li><a href="{{ url('/contact') }}" class="hover:text-white transition-colors">Request a callback</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-6 text-emerald-500">Contact Info</h4>
                    <ul class="space-y-4 text-sm text-slate-400">
                        <li class="flex items-start gap-3">
                            <i class="ph ph-map-pin text-emerald-500 mt-0.5"></i>
                            <span>
                                FeedTan Community Microfinance Group<br>
                                P.O.Box 7744, Ushirika Sokoine Road, Moshi,<br>
                                Kilimanjaro, Tanzania
                            </span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="ph ph-phone text-emerald-500"></i> +000 000 000
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="ph ph-envelope text-emerald-500"></i> support@feedtan.example
                        </li>
                    </ul>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-6 pt-10 border-t border-slate-800">
                <div class="flex flex-col items-center text-center gap-8">
                    <div class="flex flex-col items-center gap-4">
                        <div class="flex flex-wrap items-center justify-center gap-y-2 gap-x-6 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                            <a href="{{ url('/contact') }}" class="hover:text-emerald-500 transition-colors">Terms & Conditions</a>
                            <a href="{{ url('/contact') }}" class="hover:text-emerald-500 transition-colors">Privacy Policy</a>
                            <a href="{{ url('/contact') }}" class="hover:text-emerald-500 transition-colors">Cookies Policy</a>
                        </div>
                        <p class="text-sm text-slate-500">© {{ date('Y') }} FeedTan Community Microfinance Group. All rights reserved.</p>
                    </div>

                    <div class="flex items-center gap-6">
                        <a href="#" class="text-slate-500 hover:text-white transition-colors" aria-label="Facebook"><i class="ph ph-facebook-logo text-xl"></i></a>
                        <a href="#" class="text-slate-500 hover:text-white transition-colors" aria-label="Instagram"><i class="ph ph-instagram-logo text-xl"></i></a>
                        <a href="#" class="text-slate-500 hover:text-white transition-colors" aria-label="Twitter"><i class="ph ph-twitter-logo text-xl"></i></a>
                    </div>
                </div>
            </div>
        </footer>


    </body>
</html>
