@extends('layouts.app')

@section('title', 'Products — FeedTan Community Microfinance Group')

@section('content')
    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=2400&q=80" alt="FeedTan products" class="h-full w-full object-cover opacity-70">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/55 to-slate-950/20"></div>
        </div>
        <div class="absolute -top-24 -right-24 w-[520px] h-[520px] bg-gradient-to-br from-emerald-500/25 to-teal-400/15 blur-3xl rounded-full"></div>
        <div class="absolute -bottom-24 -left-24 w-[520px] h-[520px] bg-gradient-to-tr from-teal-400/20 to-emerald-500/10 blur-3xl rounded-full"></div>

        <div class="relative max-w-7xl mx-auto px-6 py-16 lg:py-24">
            <div class="grid gap-12 lg:grid-cols-12 lg:items-center">
                <div class="lg:col-span-7">
                    <div class="inline-flex items-center gap-2 rounded-full border border-teal-400/30 bg-teal-400/10 px-4 py-2 text-xs font-bold tracking-widest uppercase text-teal-200">Products</div>
                    <h1 class="mt-6 text-4xl md:text-6xl font-serif text-white font-bold leading-[1.05]">Microfinance built for real life</h1>
                    <p class="mt-6 text-lg text-slate-200 leading-relaxed">Choose loans, savings, and business support designed for entrepreneurs, groups, and families—transparent fees, flexible schedules, and fast help when you need it.</p>

                    <div class="mt-10 flex flex-col sm:flex-row items-center gap-4">
                        <a href="{{ url('/contact') }}" class="w-full sm:w-auto px-10 py-4 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 shadow-xl shadow-emerald-600/30 transition-all text-center">Talk to an advisor</a>
                        <a href="{{ url('/pricing') }}" class="w-full sm:w-auto px-10 py-4 bg-white/10 text-white font-bold rounded-full border border-white/20 hover:bg-white/20 transition-all text-center backdrop-blur-md">View pricing</a>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="rounded-[2.5rem] border border-white/10 bg-white/5 backdrop-blur-md p-10">
                        <div class="text-xs font-black uppercase tracking-widest text-teal-200">Quick links</div>
                        <div class="mt-6 grid gap-3">
                            <a href="#loans" class="rounded-2xl bg-slate-950/30 border border-white/10 px-6 py-4 text-sm font-bold text-white hover:border-teal-400/40 hover:bg-white/10 transition-all">Micro-loans</a>
                            <a href="#savings" class="rounded-2xl bg-slate-950/30 border border-white/10 px-6 py-4 text-sm font-bold text-white hover:border-teal-400/40 hover:bg-white/10 transition-all">Savings plans</a>
                            <a href="#business" class="rounded-2xl bg-slate-950/30 border border-white/10 px-6 py-4 text-sm font-bold text-white hover:border-teal-400/40 hover:bg-white/10 transition-all">Business tools & training</a>
                        </div>
                        <div class="mt-8 text-xs text-slate-300 leading-relaxed">Need help choosing? Use the product finder below or request a callback.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-end justify-between mb-16 gap-6">
                <div class="max-w-2xl">
                    <h2 class="text-4xl font-serif text-slate-900 mb-6 font-bold">Explore our products</h2>
                    <p class="text-slate-500">Pick the product that matches your goal. Apply in minutes, get clear terms, and grow with confidence.</p>
                </div>
                <a href="{{ url('/contact') }}" class="text-emerald-600 font-bold flex items-center gap-2 hover:gap-3 transition-all">
                    Request a callback <i class="ph ph-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div id="loans" class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100">
                    <div class="relative h-72 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=1200&q=80" alt="Micro-loans" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full text-xs font-bold text-slate-900 shadow-sm uppercase tracking-wider">15–180 days</div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 text-emerald-500 text-sm font-bold mb-4">
                            <i class="ph-fill ph-star"></i>
                            <span class="text-slate-900">4.9</span>
                            <span class="text-slate-400 font-medium">(Community rated)</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-emerald-600 transition-colors">Micro-loans</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6">For inventory, equipment, school fees, or working capital—structured to match real cashflow.</p>
                        <div class="pt-6 border-t border-slate-100 grid gap-2 text-sm text-slate-600">
                            <div class="flex items-center justify-between"><span>Typical amount</span><span class="font-bold text-slate-900">$50–$3,000</span></div>
                            <div class="flex items-center justify-between"><span>Repayment</span><span class="font-bold text-slate-900">Weekly / Monthly</span></div>
                        </div>
                        <div class="mt-6 flex items-center justify-between">
                            <a href="{{ url('/pricing') }}" class="text-emerald-600 font-bold flex items-center gap-2 hover:gap-3 transition-all">See pricing <i class="ph ph-arrow-right"></i></a>
                            <a href="{{ url('/contact') }}" class="p-4 bg-slate-900 text-white rounded-2xl hover:bg-emerald-600 transition-colors" aria-label="Apply"><i class="ph ph-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div id="savings" class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100">
                    <div class="relative h-72 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=1200&q=80" alt="Savings" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full text-xs font-bold text-slate-900 shadow-sm uppercase tracking-wider">Goal-based</div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 text-emerald-500 text-sm font-bold mb-4">
                            <i class="ph-fill ph-star"></i>
                            <span class="text-slate-900">4.8</span>
                            <span class="text-slate-400 font-medium">(Members)</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-emerald-600 transition-colors">Savings plans</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6">Build stability with a simple plan for school fees, rent, or stock purchases—track progress and withdraw on schedule.</p>
                        <div class="pt-6 border-t border-slate-100 grid gap-2 text-sm text-slate-600">
                            <div class="flex items-center justify-between"><span>Contributions</span><span class="font-bold text-slate-900">Daily / Weekly</span></div>
                            <div class="flex items-center justify-between"><span>Reports</span><span class="font-bold text-slate-900">Monthly summaries</span></div>
                        </div>
                        <div class="mt-6 flex items-center justify-between">
                            <a href="{{ url('/contact') }}" class="text-emerald-600 font-bold flex items-center gap-2 hover:gap-3 transition-all">Open a plan <i class="ph ph-arrow-right"></i></a>
                            <a href="{{ url('/contact') }}" class="p-4 bg-slate-900 text-white rounded-2xl hover:bg-emerald-600 transition-colors" aria-label="Open"><i class="ph ph-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div id="business" class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100">
                    <div class="relative h-72 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1200&q=80" alt="Business tools" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-2 rounded-full text-xs font-bold text-slate-900 shadow-sm uppercase tracking-wider">Support</div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 text-emerald-500 text-sm font-bold mb-4">
                            <i class="ph-fill ph-star"></i>
                            <span class="text-slate-900">5.0</span>
                            <span class="text-slate-400 font-medium">(Teams)</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-emerald-600 transition-colors">Business tools & training</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6">Reminders, education, and simple tracking to help you manage money and strengthen revenue over time.</p>
                        <div class="pt-6 border-t border-slate-100 grid gap-2 text-sm text-slate-600">
                            <div class="flex items-center justify-between"><span>Reminders</span><span class="font-bold text-slate-900">SMS / Email</span></div>
                            <div class="flex items-center justify-between"><span>Training</span><span class="font-bold text-slate-900">Starter + Pro</span></div>
                        </div>
                        <div class="mt-6 flex items-center justify-between">
                            <a href="{{ url('/contact') }}" class="text-emerald-600 font-bold flex items-center gap-2 hover:gap-3 transition-all">Request onboarding <i class="ph ph-arrow-right"></i></a>
                            <a href="{{ url('/contact') }}" class="p-4 bg-slate-900 text-white rounded-2xl hover:bg-emerald-600 transition-colors" aria-label="Onboard"><i class="ph ph-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="rounded-[2.5rem] border border-slate-100 bg-white shadow-sm overflow-hidden" x-data="{ active: 'loans' }">
                <div class="p-10">
                    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
                        <div>
                            <div class="text-xs font-black uppercase tracking-widest text-teal-600">Product Finder</div>
                            <h3 class="mt-4 text-3xl font-serif font-bold text-slate-900">Find the best fit</h3>
                            <p class="mt-4 text-slate-600">Choose a goal and see the recommended product details.</p>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button type="button" class="px-6 py-3 rounded-full text-sm font-bold border transition-all" :class="active === 'loans' ? 'bg-teal-600 text-white border-teal-600' : 'bg-white text-slate-900 border-slate-200 hover:bg-slate-50'" @click="active = 'loans'">Working capital</button>
                            <button type="button" class="px-6 py-3 rounded-full text-sm font-bold border transition-all" :class="active === 'savings' ? 'bg-teal-600 text-white border-teal-600' : 'bg-white text-slate-900 border-slate-200 hover:bg-slate-50'" @click="active = 'savings'">Build savings</button>
                            <button type="button" class="px-6 py-3 rounded-full text-sm font-bold border transition-all" :class="active === 'business' ? 'bg-teal-600 text-white border-teal-600' : 'bg-white text-slate-900 border-slate-200 hover:bg-slate-50'" @click="active = 'business'">Grow a team</button>
                        </div>
                    </div>

                    <div class="mt-10 grid gap-8 lg:grid-cols-12 lg:items-start">
                        <div class="lg:col-span-7">
                            <div class="rounded-3xl border border-slate-100 bg-slate-50 p-8">
                                <div class="text-sm font-black text-slate-900" x-show="active === 'loans'" x-transition>Micro-loans</div>
                                <div class="text-sm font-black text-slate-900" x-show="active === 'savings'" x-transition>Savings plans</div>
                                <div class="text-sm font-black text-slate-900" x-show="active === 'business'" x-transition>Business tools & training</div>

                                <div class="mt-4 text-slate-600 leading-relaxed" x-show="active === 'loans'" x-transition>Best for inventory, school fees, equipment, and short-term cashflow. Flexible weekly/monthly repayments.</div>
                                <div class="mt-4 text-slate-600 leading-relaxed" x-show="active === 'savings'" x-transition>Best for school fees, rent, and predictable expenses. Build habits with structured contributions.</div>
                                <div class="mt-4 text-slate-600 leading-relaxed" x-show="active === 'business'" x-transition>Best for groups and growing businesses that need support systems—reminders, training, and reporting.</div>

                                <div class="mt-8 grid gap-3 text-sm">
                                    <div class="rounded-2xl bg-white px-6 py-4 flex items-center justify-between">
                                        <span class="text-slate-500">Typical timeline</span>
                                        <span class="font-black text-slate-900" x-show="active === 'loans'" x-transition>Same / next day</span>
                                        <span class="font-black text-slate-900" x-show="active === 'savings'" x-transition>Instant setup</span>
                                        <span class="font-black text-slate-900" x-show="active === 'business'" x-transition>By agreement</span>
                                    </div>
                                    <div class="rounded-2xl bg-white px-6 py-4 flex items-center justify-between">
                                        <span class="text-slate-500">Best for</span>
                                        <span class="font-black text-slate-900" x-show="active === 'loans'" x-transition>Cashflow</span>
                                        <span class="font-black text-slate-900" x-show="active === 'savings'" x-transition>Stability</span>
                                        <span class="font-black text-slate-900" x-show="active === 'business'" x-transition>Growth</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-5">
                            <div class="rounded-3xl bg-slate-950 p-8 text-white">
                                <div class="text-xs font-black uppercase tracking-widest text-teal-200">Next step</div>
                                <h4 class="mt-4 text-2xl font-serif font-bold">Get matched with an advisor</h4>
                                <p class="mt-4 text-slate-300">Tell us your goal and we’ll recommend a product and schedule that fits your cashflow.</p>
                                <div class="mt-8 grid gap-3">
                                    <a href="{{ url('/contact') }}" class="rounded-2xl bg-teal-600 px-6 py-4 text-center text-sm font-black text-white hover:bg-teal-700 transition-colors">Request a callback</a>
                                    <a href="{{ url('/pricing') }}" class="rounded-2xl border border-white/15 bg-white/5 px-6 py-4 text-center text-sm font-black text-white hover:bg-white/10 transition-colors">See pricing</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 relative overflow-hidden bg-slate-900">
        <div class="absolute top-0 right-0 w-1/2 h-full hidden lg:block">
            <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?auto=format&fit=crop&w=1400&q=80" alt="Support" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/40 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-xl">
                <h2 class="text-4xl font-serif text-white mb-12 font-bold">How it works</h2>

                <div class="space-y-12">
                    <div class="flex gap-6">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-600/20 text-emerald-500 flex-shrink-0 flex items-center justify-center text-3xl">
                            <i class="ph-bold ph-clipboard-text"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-4">Apply with clear details</h4>
                            <p class="text-slate-400 leading-relaxed">Share your goal, amount, and schedule. We keep the process simple and supportive.</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-600/20 text-emerald-500 flex-shrink-0 flex items-center justify-center text-3xl">
                            <i class="ph-bold ph-shield-check"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-4">Responsible assessment</h4>
                            <p class="text-slate-400 leading-relaxed">We verify identity and affordability—then explain pricing and total repayment before you accept.</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-600/20 text-emerald-500 flex-shrink-0 flex items-center justify-center text-3xl">
                            <i class="ph-bold ph-handshake"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-4">Disbursement & support</h4>
                            <p class="text-slate-400 leading-relaxed">Receive funds and get reminders, education, and help—without pressure.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-emerald-600">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-serif text-white mb-8 font-bold">Need help choosing?</h2>
            <p class="text-emerald-100 text-xl max-w-2xl mx-auto mb-12">Tell us your goal and we’ll recommend the best product and repayment schedule.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="{{ url('/contact') }}" class="px-12 py-5 bg-white text-emerald-600 font-bold rounded-full shadow-2xl hover:scale-105 transition-all">Talk to an advisor</a>
                <a href="{{ url('/pricing') }}" class="flex items-center gap-3 text-white font-bold hover:scale-105 transition-all text-xl">
                    <i class="ph-bold ph-receipt text-3xl"></i> View pricing
                </a>
            </div>
        </div>
    </section>
@endsection
