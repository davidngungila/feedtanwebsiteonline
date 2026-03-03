@extends('layouts.app')

@section('title', 'Contact — FeedTan Community Microfinance Group')

@section('content')
    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1556761175-129418cb2dfe?auto=format&fit=crop&w=2400&q=80" alt="Contact FeedTan" class="h-full w-full object-cover opacity-75">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/55 to-slate-950/15"></div>
        </div>
        <div class="absolute -top-24 -right-24 w-[520px] h-[520px] bg-gradient-to-br from-slate-200/10 to-emerald-500/10 blur-3xl rounded-full"></div>
        <div class="absolute -bottom-24 -left-24 w-[520px] h-[520px] bg-gradient-to-tr from-emerald-500/15 to-slate-200/10 blur-3xl rounded-full"></div>

        <div class="relative max-w-7xl mx-auto px-6 py-16 lg:py-24">
            <div class="grid gap-12 lg:grid-cols-12 lg:items-center">
                <div class="lg:col-span-7">
                    <div class="inline-flex items-center gap-2 rounded-full border border-slate-200/20 bg-slate-200/10 px-4 py-2 text-xs font-bold tracking-widest uppercase text-slate-200">Contact</div>
                    <h1 class="mt-6 text-4xl md:text-6xl font-serif text-white font-bold leading-[1.05]">Let’s talk about your goals</h1>
                    <p class="mt-6 text-lg text-slate-200 leading-relaxed">Reach out for an application, pricing questions, or partnerships. Our advisors respond quickly and respectfully.</p>

                    <div class="mt-10 flex flex-col sm:flex-row items-center gap-4">
                        <a href="#message" class="w-full sm:w-auto px-10 py-4 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 shadow-xl shadow-emerald-600/30 transition-all text-center">Send a message</a>
                        <a href="{{ url('/products') }}" class="w-full sm:w-auto px-10 py-4 bg-white/10 text-white font-bold rounded-full border border-white/20 hover:bg-white/20 transition-all text-center backdrop-blur-md">Explore products</a>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="rounded-[2.5rem] border border-white/10 bg-white/5 backdrop-blur-md p-10">
                        <div class="text-xs font-black uppercase tracking-widest text-slate-200">Quick actions</div>
                        <div class="mt-6 grid gap-3">
                            <a href="{{ url('/contact') }}" class="rounded-2xl bg-slate-950/30 border border-white/10 px-6 py-4 text-sm font-black text-white hover:bg-white/10 transition-all">Request a callback</a>
                            <a href="{{ url('/pricing') }}" class="rounded-2xl bg-slate-950/30 border border-white/10 px-6 py-4 text-sm font-black text-white hover:bg-white/10 transition-all">See example pricing</a>
                            <a href="#office" class="rounded-2xl bg-slate-950/30 border border-white/10 px-6 py-4 text-sm font-black text-white hover:bg-white/10 transition-all">Find our office</a>
                        </div>
                        <div class="mt-8 text-xs text-slate-300 leading-relaxed">We’re based in Moshi, Kilimanjaro. Support hours: Mon–Sat, 8:00–18:00.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid gap-10 lg:grid-cols-12 lg:items-start">
                <div class="lg:col-span-5">
                    <h2 class="text-4xl font-serif text-slate-900 font-bold">Contact information</h2>
                    <p class="mt-6 text-slate-600 leading-relaxed">We’re based in Moshi, Kilimanjaro. You can reach us by phone, email, or WhatsApp during support hours.</p>

                    <div class="mt-10 grid gap-6">
                        <div class="rounded-3xl border border-slate-100 bg-slate-50 p-8">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-2xl bg-emerald-600/15 text-emerald-600 flex items-center justify-center text-2xl"><i class="ph ph-clock"></i></div>
                                <div>
                                    <div class="text-sm font-bold text-slate-900">Support hours</div>
                                    <div class="text-sm text-slate-600">Mon–Sat, 8:00–18:00</div>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-6 sm:grid-cols-2">
                            <div class="rounded-3xl border border-slate-100 bg-white p-8">
                                <div class="w-12 h-12 rounded-2xl bg-emerald-600/15 text-emerald-600 flex items-center justify-center text-2xl"><i class="ph ph-phone"></i></div>
                                <div class="mt-6 text-sm font-bold text-slate-900">Phone</div>
                                <div class="mt-2 text-sm text-slate-600">+000 000 000</div>
                            </div>
                            <div class="rounded-3xl border border-slate-100 bg-white p-8">
                                <div class="w-12 h-12 rounded-2xl bg-emerald-600/15 text-emerald-600 flex items-center justify-center text-2xl"><i class="ph ph-envelope"></i></div>
                                <div class="mt-6 text-sm font-bold text-slate-900">Email</div>
                                <div class="mt-2 text-sm text-slate-600">support@feedtan.example</div>
                            </div>
                            <div class="rounded-3xl border border-slate-100 bg-white p-8">
                                <div class="w-12 h-12 rounded-2xl bg-emerald-600/15 text-emerald-600 flex items-center justify-center text-2xl"><i class="ph ph-whatsapp-logo"></i></div>
                                <div class="mt-6 text-sm font-bold text-slate-900">WhatsApp</div>
                                <div class="mt-2 text-sm text-slate-600">+000 000 000</div>
                            </div>
                            <div class="rounded-3xl border border-slate-100 bg-white p-8">
                                <div class="w-12 h-12 rounded-2xl bg-emerald-600/15 text-emerald-600 flex items-center justify-center text-2xl"><i class="ph ph-map-pin"></i></div>
                                <div class="mt-6 text-sm font-bold text-slate-900">Office address</div>
                                <div class="mt-2 text-sm text-slate-600">
                                    P.O.Box 7744, Ushirika Sokoine Road, Moshi,<br>
                                    Kilimanjaro, Tanzania
                                </div>
                            </div>
                        </div>

                        <div class="rounded-3xl border border-emerald-200 bg-emerald-50 p-8">
                            <div class="text-sm font-bold text-slate-900">Application checklist</div>
                            <p class="mt-2 text-sm text-slate-700">Have these ready to speed up your decision.</p>
                            <div class="mt-4 grid gap-2 text-sm text-slate-700">
                                <div class="rounded-2xl bg-white/80 px-5 py-4">Valid ID or business registration</div>
                                <div class="rounded-2xl bg-white/80 px-5 py-4">Phone number and address</div>
                                <div class="rounded-2xl bg-white/80 px-5 py-4">Proof of income or basic sales records</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7" x-data="{ method: 'whatsapp' }">
                    <div id="message" class="rounded-[2.5rem] border border-slate-100 bg-white shadow-sm overflow-hidden">
                        <div class="p-10">
                            <div class="text-xs font-black uppercase tracking-widest text-emerald-600">Send a message</div>
                            <h2 class="mt-4 text-3xl font-serif font-bold text-slate-900">We’ll respond quickly</h2>
                            <p class="mt-4 text-sm text-slate-600">This form is a design placeholder. Connect it to your backend later.</p>

                            <div class="mt-8 rounded-3xl border border-slate-100 bg-slate-50 p-6">
                                <div class="text-xs font-black uppercase tracking-widest text-slate-600">Preferred contact method</div>
                                <div class="mt-4 flex flex-wrap gap-3">
                                    <button type="button" class="px-6 py-3 rounded-full text-sm font-black border transition-all" :class="method === 'whatsapp' ? 'bg-slate-900 text-white border-slate-900' : 'bg-white text-slate-900 border-slate-200 hover:bg-slate-50'" @click="method = 'whatsapp'">WhatsApp</button>
                                    <button type="button" class="px-6 py-3 rounded-full text-sm font-black border transition-all" :class="method === 'phone' ? 'bg-slate-900 text-white border-slate-900' : 'bg-white text-slate-900 border-slate-200 hover:bg-slate-50'" @click="method = 'phone'">Phone</button>
                                    <button type="button" class="px-6 py-3 rounded-full text-sm font-black border transition-all" :class="method === 'email' ? 'bg-slate-900 text-white border-slate-900' : 'bg-white text-slate-900 border-slate-200 hover:bg-slate-50'" @click="method = 'email'">Email</button>
                                </div>
                                <div class="mt-4 text-sm text-slate-600" x-show="method === 'whatsapp'" x-transition>Fastest response for most requests.</div>
                                <div class="mt-4 text-sm text-slate-600" x-show="method === 'phone'" x-transition>Best for loan application guidance and repayment questions.</div>
                                <div class="mt-4 text-sm text-slate-600" x-show="method === 'email'" x-transition>Best for documents and partnership inquiries.</div>
                            </div>

                            <form class="mt-8 grid gap-5" method="post" action="#">
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <div>
                                        <label class="text-xs font-semibold text-slate-600">First name</label>
                                        <input class="mt-2 w-full rounded-2xl border border-slate-200 px-5 py-3.5 text-sm outline-none focus:border-emerald-300" placeholder="Amina" />
                                    </div>
                                    <div>
                                        <label class="text-xs font-semibold text-slate-600">Last name</label>
                                        <input class="mt-2 w-full rounded-2xl border border-slate-200 px-5 py-3.5 text-sm outline-none focus:border-emerald-300" placeholder="K." />
                                    </div>
                                </div>

                                <div>
                                    <label class="text-xs font-semibold text-slate-600">Email</label>
                                    <input type="email" class="mt-2 w-full rounded-2xl border border-slate-200 px-5 py-3.5 text-sm outline-none focus:border-emerald-300" placeholder="you@company.com" />
                                </div>

                                <div>
                                    <label class="text-xs font-semibold text-slate-600">What do you need?</label>
                                    <select class="mt-2 w-full rounded-2xl border border-slate-200 px-5 py-3.5 text-sm outline-none focus:border-emerald-300">
                                        <option>Apply for a micro-loan</option>
                                        <option>Open a savings plan</option>
                                        <option>Business / group financing</option>
                                        <option>Partnership inquiry</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="text-xs font-semibold text-slate-600">Message</label>
                                    <textarea rows="5" class="mt-2 w-full rounded-2xl border border-slate-200 px-5 py-3.5 text-sm outline-none focus:border-emerald-300" placeholder="Tell us your goal and timeline..."></textarea>
                                </div>

                                <button type="button" class="rounded-2xl bg-emerald-600 px-7 py-4 text-sm font-bold text-white hover:bg-emerald-700">Submit</button>

                                <div class="text-xs leading-5 text-slate-500">
                                    Submitting this form does not create a loan agreement. You will receive terms to review before accepting any offer.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative h-[calc(100vh-6rem)] min-h-[600px] overflow-hidden">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.4857!2d37.343!3d-3.356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMsKwMjEnMjEuNiJTIDM3wrAyMCcuOCJF!5e0!3m2!1sen!2stz!4v1"
            class="absolute inset-0 w-full h-full border-0"
            allowfullscreen
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="FeedTan Office Location - Moshi, Kilimanjaro, Tanzania">
        </iframe>
        <div class="absolute inset-0 bg-slate-950/40" style="pointer-events: none;"></div>
    </section>

    <section class="py-24 bg-emerald-600">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-serif text-white mb-8 font-bold">Ready to get started?</h2>
            <p class="text-emerald-100 text-xl max-w-2xl mx-auto mb-12">Apply online or request a callback. We’ll guide you through the simplest path to funding.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="{{ url('/contact') }}" class="px-12 py-5 bg-white text-emerald-600 font-bold rounded-full shadow-2xl hover:scale-105 transition-all">Request a callback</a>
                <a href="{{ url('/products') }}" class="flex items-center gap-3 text-white font-bold hover:scale-105 transition-all text-xl"><i class="ph-bold ph-arrow-right text-3xl"></i> Explore products</a>
            </div>
        </div>
    </section>
@endsection
