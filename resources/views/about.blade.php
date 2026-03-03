@extends('layouts.app')

@section('title', 'About — FeedTan Community Microfinance Group')

@section('content')
    <section class="relative overflow-hidden bg-white">
        <div class="absolute -top-24 -right-24 w-[520px] h-[520px] bg-gradient-to-br from-emerald-500/15 to-sky-500/10 blur-3xl rounded-full"></div>
        <div class="absolute -bottom-24 -left-24 w-[520px] h-[520px] bg-gradient-to-tr from-sky-500/15 to-emerald-500/10 blur-3xl rounded-full"></div>

        <div class="relative max-w-7xl mx-auto px-6 py-16 lg:py-24">
            <div class="grid gap-12 lg:grid-cols-12 lg:items-center">
                <div class="lg:col-span-6">
                    <div class="inline-flex items-center gap-2 rounded-full border border-sky-500/25 bg-sky-500/10 px-4 py-2 text-xs font-bold tracking-widest uppercase text-sky-700">About</div>
                    <h1 class="mt-6 text-4xl md:text-6xl font-serif text-slate-900 font-bold leading-[1.05]">Finance that strengthens communities</h1>
                    <p class="mt-6 text-lg text-slate-600 leading-relaxed">FeedTan Community Microfinance Group exists to help families and entrepreneurs build stability. We combine responsible lending, clear pricing, and practical support to create long-term outcomes.</p>

                    <div class="mt-10 flex flex-col sm:flex-row items-center gap-4">
                        <a href="{{ url('/products') }}" class="w-full sm:w-auto px-10 py-4 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 shadow-xl shadow-emerald-600/30 transition-all text-center">Explore products</a>
                        <a href="{{ url('/contact') }}" class="w-full sm:w-auto px-10 py-4 bg-slate-900 text-white font-bold rounded-full hover:bg-slate-950 transition-all text-center">Partner with us</a>
                    </div>
                </div>

                <div class="lg:col-span-6">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-7 rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1400&q=80" alt="Team" class="w-full h-full object-cover">
                        </div>
                        <div class="col-span-5 grid gap-4">
                            <div class="rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm">
                                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=900&q=80" alt="Documents" class="w-full h-44 object-cover">
                            </div>
                            <div class="rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm">
                                <img src="https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=900&q=80" alt="Savings" class="w-full h-44 object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                <h3 class="text-4xl font-bold text-slate-900">AES</h3>
                <p class="text-sm text-slate-500 mt-2">Data Security</p>
            </div>
        </div>
    </section>

    <section class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid gap-12 lg:grid-cols-12 lg:items-start">
                <div class="lg:col-span-6">
                    <h2 class="text-4xl font-serif text-slate-900 font-bold">Our mission & promise</h2>
                    <p class="mt-6 text-slate-600 leading-relaxed">We serve entrepreneurs, families, and community groups with products designed to build stability. Every product is built around transparent fees, flexible schedules, and respectful support.</p>

                    <div class="mt-10 grid gap-6 sm:grid-cols-2">
                        <div class="rounded-3xl border border-slate-100 bg-slate-50 p-8">
                            <div class="text-3xl text-emerald-600"><i class="ph-bold ph-target"></i></div>
                            <div class="mt-6 text-lg font-bold text-slate-900">Our mission</div>
                            <p class="mt-3 text-sm text-slate-600">Provide fair, accessible funding to underserved customers and micro-businesses.</p>
                        </div>
                        <div class="rounded-3xl border border-slate-100 bg-slate-50 p-8">
                            <div class="text-3xl text-emerald-600"><i class="ph-bold ph-handshake"></i></div>
                            <div class="mt-6 text-lg font-bold text-slate-900">Our promise</div>
                            <p class="mt-3 text-sm text-slate-600">Be transparent, respectful, and supportive—before, during, and after the loan.</p>
                        </div>
                        <div class="rounded-3xl border border-slate-100 bg-slate-50 p-8">
                            <div class="text-3xl text-emerald-600"><i class="ph-bold ph-chart-line-up"></i></div>
                            <div class="mt-6 text-lg font-bold text-slate-900">How we manage risk</div>
                            <p class="mt-3 text-sm text-slate-600">We evaluate affordability and repayment patterns, not just paperwork.</p>
                        </div>
                        <div class="rounded-3xl border border-slate-100 bg-slate-50 p-8">
                            <div class="text-3xl text-emerald-600"><i class="ph-bold ph-heart"></i></div>
                            <div class="mt-6 text-lg font-bold text-slate-900">Impact focus</div>
                            <p class="mt-3 text-sm text-slate-600">We track outcomes such as business resilience, savings habits, and household stability.</p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6">
                    <div class="rounded-[2.5rem] overflow-hidden border border-slate-100 bg-white shadow-sm">
                        <div class="p-10">
                            <div class="text-xs font-black uppercase tracking-widest text-emerald-600">What makes us different</div>
                            <h3 class="mt-4 text-3xl font-serif font-bold text-slate-900">Modern, responsible microfinance</h3>
                            <div class="mt-8 grid gap-3 text-sm text-slate-700">
                                <div class="rounded-2xl bg-slate-50 px-5 py-4 flex items-center gap-3"><i class="ph ph-check-circle text-emerald-600 text-lg"></i> Clear fee breakdown before you accept</div>
                                <div class="rounded-2xl bg-slate-50 px-5 py-4 flex items-center gap-3"><i class="ph ph-check-circle text-emerald-600 text-lg"></i> Flexible repayment schedules</div>
                                <div class="rounded-2xl bg-slate-50 px-5 py-4 flex items-center gap-3"><i class="ph ph-check-circle text-emerald-600 text-lg"></i> Support and training resources</div>
                                <div class="rounded-2xl bg-slate-50 px-5 py-4 flex items-center gap-3"><i class="ph ph-check-circle text-emerald-600 text-lg"></i> Privacy and data security standards</div>
                            </div>

                            <div class="mt-10">
                                <div class="text-sm font-bold text-slate-900">Core values</div>
                                <div class="mt-4 grid gap-3">
                                    <div class="rounded-2xl border border-slate-100 bg-white p-5">
                                        <div class="text-sm font-bold text-slate-900">Transparency</div>
                                        <div class="mt-1 text-sm text-slate-600">Clear terms and honest communication.</div>
                                    </div>
                                    <div class="rounded-2xl border border-slate-100 bg-white p-5">
                                        <div class="text-sm font-bold text-slate-900">Respect</div>
                                        <div class="mt-1 text-sm text-slate-600">Dignified customer interactions, always.</div>
                                    </div>
                                    <div class="rounded-2xl border border-slate-100 bg-white p-5">
                                        <div class="text-sm font-bold text-slate-900">Sustainability</div>
                                        <div class="mt-1 text-sm text-slate-600">Healthy portfolios that benefit both customers and communities.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6" x-data="{ step: 1 }">
            <div class="flex flex-col md:flex-row items-end justify-between mb-16 gap-6">
                <div class="max-w-2xl">
                    <span class="text-sky-700 font-black text-xs uppercase tracking-[0.4em] mb-4 inline-block">Our Story</span>
                    <h2 class="text-4xl font-serif text-slate-900 mb-6 font-bold">How we work over time</h2>
                    <p class="text-slate-500">A simple timeline showing how we support members beyond a single transaction.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <button type="button" class="px-6 py-3 rounded-full text-sm font-black border transition-all" :class="step === 1 ? 'bg-sky-600 text-white border-sky-600' : 'bg-white text-slate-900 border-slate-200 hover:bg-slate-50'" @click="step = 1">Start</button>
                    <button type="button" class="px-6 py-3 rounded-full text-sm font-black border transition-all" :class="step === 2 ? 'bg-sky-600 text-white border-sky-600' : 'bg-white text-slate-900 border-slate-200 hover:bg-slate-50'" @click="step = 2">Support</button>
                    <button type="button" class="px-6 py-3 rounded-full text-sm font-black border transition-all" :class="step === 3 ? 'bg-sky-600 text-white border-sky-600' : 'bg-white text-slate-900 border-slate-200 hover:bg-slate-50'" @click="step = 3">Growth</button>
                </div>
            </div>

            <div class="grid gap-8 lg:grid-cols-12 lg:items-start">
                <div class="lg:col-span-7">
                    <div class="rounded-[2.5rem] border border-slate-100 bg-white p-10 shadow-sm">
                        <div class="text-xs font-black uppercase tracking-widest text-sky-700" x-show="step === 1" x-transition>Step 1</div>
                        <div class="text-xs font-black uppercase tracking-widest text-sky-700" x-show="step === 2" x-transition>Step 2</div>
                        <div class="text-xs font-black uppercase tracking-widest text-sky-700" x-show="step === 3" x-transition>Step 3</div>

                        <h3 class="mt-4 text-3xl font-serif font-bold text-slate-900" x-show="step === 1" x-transition>Welcome & onboarding</h3>
                        <h3 class="mt-4 text-3xl font-serif font-bold text-slate-900" x-show="step === 2" x-transition>Ongoing support</h3>
                        <h3 class="mt-4 text-3xl font-serif font-bold text-slate-900" x-show="step === 3" x-transition>Long-term growth</h3>

                        <p class="mt-6 text-slate-600 leading-relaxed" x-show="step === 1" x-transition>We start by understanding your goal and explaining terms clearly so you can make a confident decision.</p>
                        <p class="mt-6 text-slate-600 leading-relaxed" x-show="step === 2" x-transition>Reminders, education, and respectful communication help members build healthy repayment and savings habits.</p>
                        <p class="mt-6 text-slate-600 leading-relaxed" x-show="step === 3" x-transition>As trust grows, we help you access better options and build stability for your household or group.</p>

                        <div class="mt-10 grid gap-3 text-sm text-slate-700">
                            <div class="rounded-2xl bg-slate-50 px-6 py-4 flex items-center gap-3"><i class="ph ph-check-circle text-sky-600 text-lg"></i> Clear communication</div>
                            <div class="rounded-2xl bg-slate-50 px-6 py-4 flex items-center gap-3"><i class="ph ph-check-circle text-sky-600 text-lg"></i> Responsible assessment</div>
                            <div class="rounded-2xl bg-slate-50 px-6 py-4 flex items-center gap-3"><i class="ph ph-check-circle text-sky-600 text-lg"></i> Support beyond the loan</div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?auto=format&fit=crop&w=1400&q=80" alt="Community" class="w-full h-[420px] object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 relative overflow-hidden bg-slate-900">
        <div class="absolute top-0 right-0 w-1/2 h-full hidden lg:block">
            <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?auto=format&fit=crop&w=1400&q=80" alt="Partnership" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/40 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-xl">
                <h2 class="text-4xl font-serif text-white mb-12 font-bold">Partnerships</h2>
                <div class="space-y-12">
                    <div class="flex gap-6">
                        <div class="w-16 h-16 rounded-2xl bg-emerald-600/20 text-emerald-500 flex-shrink-0 flex items-center justify-center text-3xl"><i class="ph-bold ph-users"></i></div>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-4">We work with community groups</h4>
                            <p class="text-slate-400 leading-relaxed">If you are a cooperative, NGO, or employer looking for a financial inclusion partner, we’d love to talk.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <a href="{{ url('/contact') }}" class="w-full sm:w-auto px-10 py-4 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 shadow-xl shadow-emerald-600/30 transition-all text-center">Partner with us</a>
                    <a href="{{ url('/pricing') }}" class="w-full sm:w-auto px-10 py-4 bg-white/10 text-white font-bold rounded-full border border-white/20 hover:bg-white/20 transition-all text-center backdrop-blur-md">See pricing</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-emerald-600">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-serif text-white mb-8 font-bold">Let’s build stability together</h2>
            <p class="text-emerald-100 text-xl max-w-2xl mx-auto mb-12">Start with the right product—loans, savings, or group financing—with clear terms and real support.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="{{ url('/contact') }}" class="px-12 py-5 bg-white text-emerald-600 font-bold rounded-full shadow-2xl hover:scale-105 transition-all">Talk to an advisor</a>
                <a href="{{ url('/products') }}" class="flex items-center gap-3 text-white font-bold hover:scale-105 transition-all text-xl"><i class="ph-bold ph-arrow-right text-3xl"></i> Explore products</a>
            </div>
        </div>
    </section>
@endsection
