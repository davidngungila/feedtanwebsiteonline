@extends('layouts.app')

@section('title', 'FeedTan Community Microfinance Group — Loans & savings for growing businesses')

@section('content')
    <section class="relative h-[calc(100vh-6rem)] min-h-[620px] overflow-hidden rounded-none">
        <div class="swiper heroSwiper h-full w-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide relative flex items-center">
                    <div class="absolute inset-0 z-0">
                        <img src="https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=2200&q=80" alt="Savings" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/85 via-slate-950/35 to-transparent"></div>
                    </div>
                    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full">
                        <div class="max-w-2xl translate-y-10 opacity-0 transition-all duration-1000 slide-content">
                            <span class="inline-block px-4 py-1.5 bg-emerald-600/20 text-emerald-300 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-emerald-600/30">FeedTan Microfinance</span>
                            <h1 class="text-4xl md:text-6xl lg:text-7xl font-serif text-white mb-8 leading-[1.05]">Grow your business with <span class="text-emerald-400">clear, fair funding</span></h1>
                            <p class="text-lg md:text-xl text-slate-200 mb-10 leading-relaxed">Fast micro-loans, savings plans, and community support for entrepreneurs in Moshi and beyond.</p>
                            <div class="flex flex-col sm:flex-row items-center gap-4">
                                <a href="{{ url('/contact') }}" class="w-full sm:w-auto px-10 py-4 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 shadow-xl shadow-emerald-600/30 transition-all text-center">Apply now</a>
                                <a href="{{ url('/products') }}" class="w-full sm:w-auto px-10 py-4 bg-white/10 text-white font-bold rounded-full border border-white/20 hover:bg-white/20 transition-all text-center backdrop-blur-md">Explore products</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide relative flex items-center">
                    <div class="absolute inset-0 z-0">
                        <img src="https://images.unsplash.com/photo-1556761175-129418cb2dfe?auto=format&fit=crop&w=2200&q=80" alt="Business" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/85 via-slate-950/35 to-transparent"></div>
                    </div>
                    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full">
                        <div class="max-w-2xl translate-y-10 opacity-0 transition-all duration-1000 slide-content">
                            <span class="inline-block px-4 py-1.5 bg-emerald-600/20 text-emerald-300 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-emerald-600/30">Fast Decisions</span>
                            <h1 class="text-4xl md:text-6xl lg:text-7xl font-serif text-white mb-8 leading-[1.05]">Micro-loans for <span class="text-emerald-400">inventory & working capital</span></h1>
                            <p class="text-lg md:text-xl text-slate-200 mb-10 leading-relaxed">Transparent fees, flexible repayment schedules, and reminders to help you stay on track.</p>
                            <div class="flex flex-col sm:flex-row items-center gap-4">
                                <a href="{{ url('/pricing') }}" class="w-full sm:w-auto px-10 py-4 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 shadow-xl shadow-emerald-600/30 transition-all text-center">View pricing</a>
                                <a href="{{ url('/contact') }}" class="w-full sm:w-auto px-10 py-4 bg-white/10 text-white font-bold rounded-full border border-white/20 hover:bg-white/20 transition-all text-center backdrop-blur-md">Request a callback</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide relative flex items-center">
                    <div class="absolute inset-0 z-0">
                        <img src="https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&w=2200&q=80" alt="Mobile" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/85 via-slate-950/35 to-transparent"></div>
                    </div>
                    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full">
                        <div class="max-w-2xl translate-y-10 opacity-0 transition-all duration-1000 slide-content">
                            <span class="inline-block px-4 py-1.5 bg-emerald-600/20 text-emerald-300 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-emerald-600/30">Secure & Simple</span>
                            <h1 class="text-4xl md:text-6xl lg:text-7xl font-serif text-white mb-8 leading-[1.05]">Save smarter. <span class="text-emerald-400">Build stability.</span></h1>
                            <p class="text-lg md:text-xl text-slate-200 mb-10 leading-relaxed">Goal-based savings plans and support that protects your privacy and strengthens your household.</p>
                            <div class="flex flex-col sm:flex-row items-center gap-4">
                                <a href="{{ url('/contact') }}" class="w-full sm:w-auto px-10 py-4 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 shadow-xl shadow-emerald-600/30 transition-all text-center">Open an account</a>
                                <a href="{{ url('/about') }}" class="w-full sm:w-auto px-10 py-4 bg-white/10 text-white font-bold rounded-full border border-white/20 hover:bg-white/20 transition-all text-center backdrop-blur-md">Learn about FeedTan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-10 right-10 z-20 hidden sm:flex gap-4">
                <button class="swiper-prev w-14 h-14 rounded-full border border-white/20 bg-white/10 text-white flex items-center justify-center hover:bg-emerald-600 hover:border-emerald-600 transition-all backdrop-blur-md" type="button" aria-label="Previous">
                    <i class="ph ph-caret-left text-2xl"></i>
                </button>
                <button class="swiper-next w-14 h-14 rounded-full border border-white/20 bg-white/10 text-white flex items-center justify-center hover:bg-emerald-600 hover:border-emerald-600 transition-all backdrop-blur-md" type="button" aria-label="Next">
                    <i class="ph ph-caret-right text-2xl"></i>
                </button>
            </div>

            <div class="swiper-pagination !bottom-10 !left-6 !text-left !w-auto"></div>
        </div>
    </section>

    <style>
        .swiper-pagination-bullet { width: 12px; height: 12px; background: rgba(255,255,255,0.3); opacity: 1; }
        .swiper-pagination-bullet-active { background: #10b981; width: 30px; border-radius: 6px; }
        .swiper-slide-active .slide-content { transform: translateY(0); opacity: 1; }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const el = document.querySelector('.heroSwiper');
            if (!el || typeof Swiper === 'undefined') return;

            new Swiper(el, {
                loop: true,
                speed: 1000,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-next',
                    prevEl: '.swiper-prev',
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                }
            });
        });
    </script>

    <section class="relative z-20 -mt-10 max-w-5xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 bg-white rounded-2xl shadow-2xl p-8 border border-slate-100 divide-x divide-slate-100">
            <div class="text-center px-4">
                <h3 class="text-4xl font-bold text-slate-900">2008</h3>
                <p class="text-sm text-slate-500 mt-2">Established</p>
            </div>
            <div class="text-center px-4">
                <h3 class="text-4xl font-bold text-slate-900">5k+</h3>
                <p class="text-sm text-slate-500 mt-2">Members Served</p>
            </div>
            <div class="text-center px-4">
                <h3 class="text-4xl font-bold text-slate-900">24h</h3>
                <p class="text-sm text-slate-500 mt-2">Typical Decision</p>
            </div>
            <div class="text-center px-4">
                <h3 class="text-4xl font-bold text-slate-900">99%</h3>
                <p class="text-sm text-slate-500 mt-2">Support Response</p>
            </div>
        </div>
    </section>

    <section class="py-32 bg-white" id="calculator">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid gap-12 lg:grid-cols-12 lg:items-start">
                <div class="lg:col-span-5">
                    <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Repayment Estimator</span>
                    <h2 class="text-4xl font-serif text-slate-900 font-bold">Estimate your repayment</h2>
                    <p class="mt-6 text-slate-500 leading-relaxed">Use this quick estimator to understand an example repayment. Final fees depend on eligibility and local rules—your full breakdown is shown before accepting.</p>

                    <div class="mt-10 rounded-[2.5rem] border border-slate-100 bg-slate-50 p-10">
                        <div class="text-sm font-bold text-slate-900">Example summary</div>
                        <div class="mt-6 grid gap-3 text-sm text-slate-700">
                            <div class="flex items-center justify-between rounded-2xl bg-white px-5 py-4"><span class="text-slate-500">Loan amount</span><span id="estAmountOut" class="font-black text-slate-900">TZS 300,000</span></div>
                            <div class="flex items-center justify-between rounded-2xl bg-white px-5 py-4"><span class="text-slate-500">Term</span><span id="estTermOut" class="font-black text-slate-900">30 days</span></div>
                            <div class="flex items-center justify-between rounded-2xl bg-white px-5 py-4"><span class="text-slate-500">Service fee (example)</span><span id="estFeeOut" class="font-black text-slate-900">3%</span></div>
                            <div class="flex items-center justify-between rounded-2xl bg-white px-5 py-4"><span class="text-slate-500">Total repayment (est.)</span><span id="estTotalOut" class="font-black text-emerald-700">TZS 309,000</span></div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7">
                    <div class="rounded-[2.5rem] border border-slate-100 bg-white shadow-sm overflow-hidden">
                        <div class="p-10">
                            <div class="text-xs font-black uppercase tracking-widest text-emerald-600">Set your example</div>
                            <h3 class="mt-4 text-3xl font-serif font-bold text-slate-900">Choose amount & term</h3>

                            <div class="mt-10 grid gap-8">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-bold text-slate-900">Amount (TZS)</label>
                                        <span id="estAmountLabel" class="text-sm font-black text-slate-900">300,000</span>
                                    </div>
                                    <input id="estAmount" type="range" min="50000" max="2000000" step="50000" value="300000" class="mt-4 w-full accent-emerald-600" />
                                    <div class="mt-2 flex items-center justify-between text-xs text-slate-500">
                                        <span>50,000</span>
                                        <span>2,000,000</span>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-bold text-slate-900">Term (days)</label>
                                        <span id="estTermLabel" class="text-sm font-black text-slate-900">30</span>
                                    </div>
                                    <input id="estTerm" type="range" min="15" max="180" step="15" value="30" class="mt-4 w-full accent-emerald-600" />
                                    <div class="mt-2 flex items-center justify-between text-xs text-slate-500">
                                        <span>15</span>
                                        <span>180</span>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <label class="text-sm font-bold text-slate-900">Fee (example %)</label>
                                        <span id="estFeeLabel" class="text-sm font-black text-slate-900">3</span>
                                    </div>
                                    <input id="estFee" type="range" min="1" max="6" step="0.5" value="3" class="mt-4 w-full accent-emerald-600" />
                                    <div class="mt-2 flex items-center justify-between text-xs text-slate-500">
                                        <span>1%</span>
                                        <span>6%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 grid gap-3 sm:grid-cols-2">
                                <a href="{{ url('/pricing') }}" class="rounded-2xl border border-slate-200 bg-white px-6 py-4 text-center text-sm font-bold text-slate-900 hover:bg-slate-50">See pricing</a>
                                <a href="{{ url('/contact') }}" class="rounded-2xl bg-emerald-600 px-6 py-4 text-center text-sm font-bold text-white hover:bg-emerald-700">Talk to an advisor</a>
                            </div>

                            <p class="mt-6 text-xs text-slate-500 leading-relaxed">This estimator is for demonstration only and does not create an agreement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        (function () {
            function fmtTZS(n) {
                try {
                    return 'TZS ' + Number(n).toLocaleString('en-US');
                } catch (e) {
                    return 'TZS ' + String(n);
                }
            }

            function $(id) { return document.getElementById(id); }

            function update() {
                var amount = Number($('estAmount').value || 0);
                var term = Number($('estTerm').value || 0);
                var fee = Number($('estFee').value || 0);

                $('estAmountLabel').textContent = amount.toLocaleString('en-US');
                $('estTermLabel').textContent = String(term);
                $('estFeeLabel').textContent = String(fee);

                var total = Math.round(amount + (amount * fee / 100));

                $('estAmountOut').textContent = fmtTZS(amount);
                $('estTermOut').textContent = term + ' days';
                $('estFeeOut').textContent = fee + '%';
                $('estTotalOut').textContent = fmtTZS(total);
            }

            document.addEventListener('DOMContentLoaded', function () {
                var amount = $('estAmount');
                var term = $('estTerm');
                var fee = $('estFee');
                if (!amount || !term || !fee) return;

                amount.addEventListener('input', update);
                term.addEventListener('input', update);
                fee.addEventListener('input', update);

                update();
            });
        })();
    </script>

    <section class="py-32 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-end justify-between mb-16 gap-6">
                <div class="max-w-2xl">
                    <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Simple Process</span>
                    <h2 class="text-4xl font-serif text-slate-900 mb-6 font-bold">From application to funding</h2>
                    <p class="text-slate-500">A clear, guided process designed to be fast and respectful.</p>
                </div>
                <a href="{{ url('/contact') }}" class="text-emerald-600 font-bold flex items-center gap-2 hover:gap-3 transition-all">Start an application <i class="ph ph-arrow-right"></i></a>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-600/15 text-emerald-600 flex items-center justify-center text-2xl"><i class="ph ph-clipboard-text"></i></div>
                    <h3 class="mt-6 font-bold text-slate-900">1. Apply</h3>
                    <p class="mt-3 text-sm text-slate-600">Choose product, amount, and schedule. Share your basic details.</p>
                </div>
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-600/15 text-emerald-600 flex items-center justify-center text-2xl"><i class="ph ph-identification-card"></i></div>
                    <h3 class="mt-6 font-bold text-slate-900">2. Verify</h3>
                    <p class="mt-3 text-sm text-slate-600">Identity and affordability checks to keep members safe.</p>
                </div>
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-600/15 text-emerald-600 flex items-center justify-center text-2xl"><i class="ph ph-file-text"></i></div>
                    <h3 class="mt-6 font-bold text-slate-900">3. Review terms</h3>
                    <p class="mt-3 text-sm text-slate-600">See full pricing and total repayment before you accept.</p>
                </div>
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-600/15 text-emerald-600 flex items-center justify-center text-2xl"><i class="ph ph-hand-coins"></i></div>
                    <h3 class="mt-6 font-bold text-slate-900">4. Get funded</h3>
                    <p class="mt-3 text-sm text-slate-600">Disbursement and reminders—plus support beyond the loan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6" x-data="{ open: null }">
            <div class="grid gap-12 lg:grid-cols-12 lg:items-start">
                <div class="lg:col-span-5">
                    <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">FAQ</span>
                    <h2 class="text-4xl font-serif text-slate-900 font-bold">Common questions</h2>
                    <p class="mt-6 text-slate-500 leading-relaxed">Quick answers for borrowers, savers, and group members.</p>
                </div>

                <div class="lg:col-span-7">
                    <div class="grid gap-4">
                        <button type="button" class="w-full text-left rounded-3xl border border-slate-100 bg-slate-50 p-8" @click="open = (open === 1 ? null : 1)">
                            <div class="flex items-center justify-between gap-4">
                                <div class="text-sm font-black text-slate-900">Do you charge a prepayment penalty?</div>
                                <i class="ph ph-caret-down text-slate-500" :class="open === 1 ? 'rotate-180' : ''"></i>
                            </div>
                            <div x-show="open === 1" x-transition class="mt-4 text-sm text-slate-600 leading-relaxed">No. You can repay early without additional charges.</div>
                        </button>

                        <button type="button" class="w-full text-left rounded-3xl border border-slate-100 bg-slate-50 p-8" @click="open = (open === 2 ? null : 2)">
                            <div class="flex items-center justify-between gap-4">
                                <div class="text-sm font-black text-slate-900">How quickly do I get a decision?</div>
                                <i class="ph ph-caret-down text-slate-500" :class="open === 2 ? 'rotate-180' : ''"></i>
                            </div>
                            <div x-show="open === 2" x-transition class="mt-4 text-sm text-slate-600 leading-relaxed">Most applicants receive a decision within 24 hours (timelines vary by product and verification).</div>
                        </button>

                        <button type="button" class="w-full text-left rounded-3xl border border-slate-100 bg-slate-50 p-8" @click="open = (open === 3 ? null : 3)">
                            <div class="flex items-center justify-between gap-4">
                                <div class="text-sm font-black text-slate-900">What if I’m struggling to repay?</div>
                                <i class="ph ph-caret-down text-slate-500" :class="open === 3 ? 'rotate-180' : ''"></i>
                            </div>
                            <div x-show="open === 3" x-transition class="mt-4 text-sm text-slate-600 leading-relaxed">Contact us early. We prioritize support and restructuring options over penalties.</div>
                        </button>

                        <button type="button" class="w-full text-left rounded-3xl border border-slate-100 bg-slate-50 p-8" @click="open = (open === 4 ? null : 4)">
                            <div class="flex items-center justify-between gap-4">
                                <div class="text-sm font-black text-slate-900">Can groups apply together?</div>
                                <i class="ph ph-caret-down text-slate-500" :class="open === 4 ? 'rotate-180' : ''"></i>
                            </div>
                            <div x-show="open === 4" x-transition class="mt-4 text-sm text-slate-600 leading-relaxed">Yes. Group lending is available for verified community groups and cooperatives.</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 relative overflow-hidden bg-slate-900">
        <div class="absolute top-0 right-0 w-1/2 h-full hidden lg:block">
            <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?auto=format&fit=crop&w=1400&q=80" alt="Community" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/40 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-xl">
                <h2 class="text-4xl font-serif text-white mb-12 font-bold">Why choose FeedTan?</h2>

                <div class="space-y-12">
                    <div class="flex gap-6">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-600/20 text-emerald-500 flex-shrink-0 flex items-center justify-center text-3xl">
                            <i class="ph-bold ph-shield-check"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-4">Responsible lending</h4>
                            <p class="text-slate-400 leading-relaxed">We assess affordability and explain total repayment clearly before you accept any offer.</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-600/20 text-emerald-500 flex-shrink-0 flex items-center justify-center text-3xl">
                            <i class="ph-bold ph-users-four"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-4">Community support</h4>
                            <p class="text-slate-400 leading-relaxed">We work with groups and individuals to build savings habits and improve business resilience.</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-600/20 text-emerald-500 flex-shrink-0 flex items-center justify-center text-3xl">
                            <i class="ph-bold ph-lock-key"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-4">Privacy & security</h4>
                            <p class="text-slate-400 leading-relaxed">Secure processes and encrypted data handling to protect members and their information.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-emerald-600">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-serif text-white mb-8 font-bold">Ready to grow with FeedTan?</h2>
            <p class="text-emerald-100 text-xl max-w-2xl mx-auto mb-12">Talk to our advisors today and choose the best product for your goals.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="{{ url('/contact') }}" class="px-12 py-5 bg-white text-emerald-600 font-bold rounded-full shadow-2xl hover:scale-105 transition-all">Apply / Contact</a>
                <a href="{{ url('/products') }}" class="flex items-center gap-3 text-white font-bold hover:scale-105 transition-all text-xl">
                    <i class="ph-bold ph-arrow-right text-3xl"></i> View products
                </a>
            </div>
        </div>
    </section>

    <section class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <span class="text-emerald-600 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Community Trust</span>
                <h2 class="text-4xl md:text-5xl font-serif text-slate-900 font-bold mb-6">What members say</h2>
                <p class="text-slate-500 max-w-2xl mx-auto">Sample testimonials for design. Replace with your real member stories when ready.</p>
            </div>

            <div class="swiper reviewsSwiper pb-16">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                            <div class="flex items-center justify-between mb-8">
                                <div class="flex gap-1 text-emerald-500">
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                </div>
                                <div class="text-xs font-bold text-slate-400">Verified</div>
                            </div>
                            <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"The terms were clear and the process was fast. The repayment reminders helped me avoid late payments."</p>
                            <div class="mt-auto flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                    <img src="https://i.pravatar.cc/150?u=feedtan1" alt="Member" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900">Amina K.</h4>
                                    <p class="text-sm text-slate-500">Retail owner · Moshi</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                            <div class="flex items-center justify-between mb-8">
                                <div class="flex gap-1 text-emerald-500">
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                </div>
                                <div class="text-xs font-bold text-slate-400">Verified</div>
                            </div>
                            <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"I used the loan to stock my shop. Support was respectful and quick whenever I had questions."</p>
                            <div class="mt-auto flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                    <img src="https://i.pravatar.cc/150?u=feedtan2" alt="Member" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900">Joseph M.</h4>
                                    <p class="text-sm text-slate-500">Entrepreneur · Kilimanjaro</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                            <div class="flex items-center justify-between mb-8">
                                <div class="flex gap-1 text-emerald-500">
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                </div>
                                <div class="text-xs font-bold text-slate-400">Verified</div>
                            </div>
                            <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"The savings plan helped me stay disciplined. I reached my goal earlier than expected."</p>
                            <div class="mt-auto flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                    <img src="https://i.pravatar.cc/150?u=feedtan3" alt="Member" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900">Fatima S.</h4>
                                    <p class="text-sm text-slate-500">Saver · Moshi</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 flex flex-col h-full">
                            <div class="flex items-center justify-between mb-8">
                                <div class="flex gap-1 text-emerald-500">
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                    <i class="ph-fill ph-star"></i>
                                </div>
                                <div class="text-xs font-bold text-slate-400">Verified</div>
                            </div>
                            <p class="text-slate-600 text-lg leading-relaxed mb-10 italic">"Great customer care and clear communication. I appreciated the respectful approach."</p>
                            <div class="mt-auto flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-slate-200 overflow-hidden">
                                    <img src="https://i.pravatar.cc/150?u=feedtan4" alt="Member" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900">Neema P.</h4>
                                    <p class="text-sm text-slate-500">Group member · Tanzania</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-pagination-reviews !bottom-0"></div>
            </div>
        </div>
    </section>

    <style>
        .swiper-pagination-reviews .swiper-pagination-bullet { width: 10px; height: 10px; background: #e2e8f0; opacity: 1; margin: 0 6px !important; }
        .swiper-pagination-reviews .swiper-pagination-bullet-active { background: #10b981; width: 24px; border-radius: 5px; }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const el = document.querySelector('.reviewsSwiper');
            if (!el || typeof Swiper === 'undefined') return;

            new Swiper(el, {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination-reviews',
                    clickable: true,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                }
            });
        });
    </script>
@endsection
