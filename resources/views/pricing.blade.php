@extends('layouts.app')

@section('title', 'Pricing — FeedTan Community Microfinance Group')

@section('content')
    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-950 to-slate-900"></div>
            <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[620px] h-[620px] bg-gradient-to-br from-emerald-500/25 to-lime-400/15 blur-3xl rounded-full"></div>
            <div class="absolute -bottom-24 left-1/3 w-[520px] h-[520px] bg-gradient-to-tr from-lime-400/20 to-emerald-500/10 blur-3xl rounded-full"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-6 py-20 lg:py-24 text-center">
            <div class="max-w-3xl mx-auto" x-data="{ billing: 'weekly' }">
                <div class="inline-flex items-center gap-2 rounded-full border border-lime-400/30 bg-lime-400/10 px-4 py-2 text-xs font-bold tracking-widest uppercase text-lime-200">Pricing</div>
                <h1 class="mt-6 text-4xl md:text-6xl font-serif text-white font-bold leading-[1.05]">Transparent costs. No hidden surprises.</h1>
                <p class="mt-6 text-lg text-slate-200 leading-relaxed">Microfinance should be clear and fair. Your final pricing depends on risk checks, location, and repayment schedule. Below are example tiers to illustrate how we structure fees.</p>

                <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ url('/contact') }}" class="w-full sm:w-auto px-10 py-4 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 shadow-xl shadow-emerald-600/30 transition-all text-center">Get a quote</a>
                    <a href="{{ url('/products') }}" class="w-full sm:w-auto px-10 py-4 bg-white/10 text-white font-bold rounded-full border border-white/20 hover:bg-white/20 transition-all text-center backdrop-blur-md">Explore products</a>
                </div>

                <div class="mt-12 inline-flex rounded-full border border-white/10 bg-white/5 p-1">
                    <button type="button" class="px-6 py-2.5 rounded-full text-sm font-black transition-all" :class="billing === 'weekly' ? 'bg-lime-400 text-slate-950' : 'text-white/80 hover:text-white'" @click="billing = 'weekly'">Weekly</button>
                    <button type="button" class="px-6 py-2.5 rounded-full text-sm font-black transition-all" :class="billing === 'monthly' ? 'bg-lime-400 text-slate-950' : 'text-white/80 hover:text-white'" @click="billing = 'monthly'">Monthly</button>
                </div>

                <div class="mt-4 text-xs text-slate-300">Toggle is for example display only.</div>

                <div class="mt-16 grid gap-8 md:grid-cols-3 text-left">
                    <div class="rounded-[2.5rem] border border-white/10 bg-white/5 backdrop-blur-md p-10">
                        <div class="text-sm font-bold text-white">Starter</div>
                        <div class="mt-2 text-sm text-slate-300">For first-time borrowers</div>
                        <div class="mt-6 text-5xl font-black text-white" x-text="billing === 'weekly' ? '3%' : '2.5%'">3%</div>
                        <div class="mt-2 text-sm text-slate-300" x-text="billing === 'weekly' ? 'per term (example)' : 'per term (example)'">per term (example)</div>
                        <div class="mt-6 grid gap-2 text-sm text-slate-200">
                            <div class="rounded-2xl bg-slate-950/30 border border-white/10 px-5 py-4">Smaller limits to build trust</div>
                            <div class="rounded-2xl bg-slate-950/30 border border-white/10 px-5 py-4">Shorter terms available</div>
                            <div class="rounded-2xl bg-slate-950/30 border border-white/10 px-5 py-4">Repayment reminders</div>
                        </div>
                        <a href="{{ url('/contact') }}" class="mt-8 inline-flex w-full justify-center rounded-2xl bg-white text-slate-950 px-6 py-4 text-sm font-black hover:bg-lime-400 transition-colors">Apply</a>
                    </div>

                    <div class="rounded-[2.5rem] border border-lime-400/30 bg-gradient-to-b from-lime-400/15 to-white/5 backdrop-blur-md p-10">
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/90 px-3 py-1 text-xs font-black text-slate-950">Most popular</div>
                        <div class="mt-5 text-sm font-bold text-white">Growth</div>
                        <div class="mt-2 text-sm text-slate-200">For returning customers</div>
                        <div class="mt-6 text-5xl font-black text-white" x-text="billing === 'weekly' ? '2%' : '1.6%'">2%</div>
                        <div class="mt-2 text-sm text-slate-200">per term (example)</div>
                        <div class="mt-6 grid gap-2 text-sm text-slate-200">
                            <div class="rounded-2xl bg-slate-950/25 border border-white/10 px-5 py-4">Higher limits based on history</div>
                            <div class="rounded-2xl bg-slate-950/25 border border-white/10 px-5 py-4">Flexible schedules</div>
                            <div class="rounded-2xl bg-slate-950/25 border border-white/10 px-5 py-4">Education modules included</div>
                        </div>
                        <a href="{{ url('/contact') }}" class="mt-8 inline-flex w-full justify-center rounded-2xl bg-emerald-600 text-white px-6 py-4 text-sm font-black hover:bg-emerald-700 transition-colors">Apply</a>
                    </div>

                    <div class="rounded-[2.5rem] border border-white/10 bg-white/5 backdrop-blur-md p-10">
                        <div class="text-sm font-bold text-white">Business</div>
                        <div class="mt-2 text-sm text-slate-300">For enterprises & groups</div>
                        <div class="mt-6 text-5xl font-black text-white">Custom</div>
                        <div class="mt-2 text-sm text-slate-300">Quote-based</div>
                        <div class="mt-6 grid gap-2 text-sm text-slate-200">
                            <div class="rounded-2xl bg-slate-950/30 border border-white/10 px-5 py-4">Larger disbursements</div>
                            <div class="rounded-2xl bg-slate-950/30 border border-white/10 px-5 py-4">Dedicated account manager</div>
                            <div class="rounded-2xl bg-slate-950/30 border border-white/10 px-5 py-4">Business training & reporting</div>
                        </div>
                        <a href="{{ url('/contact') }}" class="mt-8 inline-flex w-full justify-center rounded-2xl border border-white/15 bg-white/5 px-6 py-4 text-sm font-black text-white hover:bg-white/10 transition-colors">Talk to sales</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif text-slate-900 mb-6 font-bold">Interactive Pricing Calculator</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">Adjust loan amount, term, and schedule to see estimated costs and repayments in real time.</p>
            </div>

            <div class="grid gap-12 lg:grid-cols-12 lg:items-start" x-data="pricingCalculator()">
                <div class="lg:col-span-5">
                    <div class="rounded-[2.5rem] border border-slate-200 bg-white p-10 shadow-lg">
                        <h3 class="text-2xl font-serif font-bold text-slate-900 mb-8">Configure your loan</h3>

                        <div class="space-y-8">
                            <div>
                                <label class="text-sm font-bold text-slate-900 flex items-center justify-between mb-4">
                                    Loan amount
                                    <span class="text-lime-600 font-black text-lg" x-text="formatCurrency(amount)"></span>
                                </label>
                                <input type="range" min="50" max="5000" step="50" x-model="amount" class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer slider">
                                <div class="flex justify-between text-xs text-slate-500 mt-2">
                                    <span>$50</span>
                                    <span>$5,000</span>
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-bold text-slate-900 flex items-center justify-between mb-4">
                                    Loan term (weeks)
                                    <span class="text-lime-600 font-black text-lg" x-text="term + ' weeks'"></span>
                                </label>
                                <input type="range" min="4" max="52" step="1" x-model="term" class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer slider">
                                <div class="flex justify-between text-xs text-slate-500 mt-2">
                                    <span>4 weeks</span>
                                    <span>52 weeks</span>
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-bold text-slate-900 mb-4 block">Repayment schedule</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <button type="button" class="px-4 py-3 rounded-xl text-sm font-bold border transition-all" :class="schedule === 'weekly' ? 'bg-lime-400 text-slate-950 border-lime-400' : 'bg-white text-slate-900 border-slate-200 hover:bg-slate-50'" @click="schedule = 'weekly'">Weekly</button>
                                    <button type="button" class="px-4 py-3 rounded-xl text-sm font-bold border transition-all" :class="schedule === 'monthly' ? 'bg-lime-400 text-slate-950 border-lime-400' : 'bg-white text-slate-900 border-slate-200 hover:bg-slate-50'" @click="schedule = 'monthly'">Monthly</button>
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-bold text-slate-900 mb-4 block">Customer tier</label>
                                <select x-model="tier" class="w-full rounded-xl border border-slate-200 px-5 py-3 text-sm font-bold outline-none focus:border-lime-400">
                                    <option value="starter">Starter (3%)</option>
                                    <option value="growth">Growth (2%)</option>
                                    <option value="business">Business (Custom)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7">
                    <div class="rounded-[2.5rem] border border-slate-200 bg-white p-10 shadow-lg">
                        <h3 class="text-2xl font-serif font-bold text-slate-900 mb-8">Estimated breakdown</h3>

                        <div class="space-y-6">
                            <div class="rounded-2xl bg-slate-50 p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-sm font-bold text-slate-900">Loan amount</span>
                                    <span class="text-lg font-black text-slate-900" x-text="formatCurrency(amount)"></span>
                                </div>
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-sm font-bold text-slate-900">Interest rate</span>
                                    <span class="text-lg font-black text-lime-600" x-text="getRate()"></span>
                                </div>
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-sm font-bold text-slate-900">Total interest</span>
                                    <span class="text-lg font-black text-slate-900" x-text="formatCurrency(getInterest())"></span>
                                </div>
                                <div class="h-px bg-slate-200 my-4"></div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-bold text-slate-900">Total repayment</span>
                                    <span class="text-xl font-black text-emerald-600" x-text="formatCurrency(getTotal())"></span>
                                </div>
                            </div>

                            <div class="rounded-2xl bg-lime-50 border border-lime-200 p-6">
                                <div class="text-sm font-bold text-slate-900 mb-4">Repayment schedule</div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-slate-600">Payment frequency</span>
                                    <span class="text-sm font-black text-slate-900" x-text="schedule"></span>
                                </div>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="text-sm text-slate-600">Number of payments</span>
                                    <span class="text-sm font-black text-slate-900" x-text="getPayments()"></span>
                                </div>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="text-sm text-slate-600">Payment amount</span>
                                    <span class="text-lg font-black text-lime-600" x-text="formatCurrency(getPaymentAmount())"></span>
                                </div>
                            </div>

                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="rounded-2xl bg-slate-50 p-6">
                                    <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">First payment</div>
                                    <div class="text-lg font-black text-slate-900" x-text="getFirstPaymentDate()"></div>
                                </div>
                                <div class="rounded-2xl bg-slate-50 p-6">
                                    <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Final payment</div>
                                    <div class="text-lg font-black text-slate-900" x-text="getFinalPaymentDate()"></div>
                                </div>
                            </div>

                            <div class="rounded-2xl bg-emerald-50 border border-emerald-200 p-6">
                                <div class="text-sm font-bold text-emerald-700 mb-2">Ready to apply?</div>
                                <p class="text-sm text-emerald-600 mb-4">These are estimates only. Final terms depend on verification and local regulations.</p>
                                <a href="{{ url('/contact') }}" class="inline-flex w-full justify-center rounded-2xl bg-emerald-600 text-white px-6 py-4 text-sm font-black hover:bg-emerald-700 transition-colors">Get exact quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif text-slate-900 mb-6 font-bold">Compare scenarios</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">See how different terms and schedules affect your total cost.</p>
            </div>

            <div class="rounded-[2.5rem] border border-slate-200 bg-slate-50 p-10 overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-200">
                            <th class="text-left font-bold text-slate-900 pb-4">Scenario</th>
                            <th class="text-right font-bold text-slate-900 pb-4">Amount</th>
                            <th class="text-right font-bold text-slate-900 pb-4">Term</th>
                            <th class="text-right font-bold text-slate-900 pb-4">Rate</th>
                            <th class="text-right font-bold text-slate-900 pb-4">Interest</th>
                            <th class="text-right font-bold text-slate-900 pb-4">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        <tr class="hover:bg-white transition-colors">
                            <td class="py-4 font-bold text-slate-900">Quick starter</td>
                            <td class="text-right text-slate-600">$500</td>
                            <td class="text-right text-slate-600">4 weeks</td>
                            <td class="text-right text-slate-600">3%</td>
                            <td class="text-right text-slate-600">$15</td>
                            <td class="text-right font-black text-emerald-600">$515</td>
                        </tr>
                        <tr class="hover:bg-white transition-colors">
                            <td class="py-4 font-bold text-slate-900">Growth plan</td>
                            <td class="text-right text-slate-600">$2,000</td>
                            <td class="text-right text-slate-600">12 weeks</td>
                            <td class="text-right text-slate-600">2%</td>
                            <td class="text-right text-slate-600">$40</td>
                            <td class="text-right font-black text-emerald-600">$2,040</td>
                        </tr>
                        <tr class="hover:bg-white transition-colors">
                            <td class="py-4 font-bold text-slate-900">Business expansion</td>
                            <td class="text-right text-slate-600">$5,000</td>
                            <td class="text-right text-slate-600">24 weeks</td>
                            <td class="text-right text-slate-600">1.6%</td>
                            <td class="text-right text-slate-600">$80</td>
                            <td class="text-right font-black text-emerald-600">$5,080</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid gap-10 lg:grid-cols-12 lg:items-start">
                <div class="lg:col-span-5">
                    <h2 class="text-3xl font-serif font-bold text-slate-900">What you pay for</h2>
                    <p class="mt-6 text-slate-600 leading-relaxed">Fees support servicing, secure disbursement, customer support, and compliance. We avoid penalty-heavy structures. If you’re struggling to repay, contact us early and we’ll help you restructure.</p>
                </div>
                <div class="lg:col-span-7">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                            <div class="text-sm font-bold text-slate-900">Is there a prepayment penalty?</div>
                            <div class="mt-2 text-sm text-slate-600">No. You can repay early without additional charges.</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                            <div class="text-sm font-bold text-slate-900">Do you charge late fees?</div>
                            <div class="mt-2 text-sm text-slate-600">Fees depend on local rules. We prioritize support and restructuring.</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                            <div class="text-sm font-bold text-slate-900">How do you calculate fees?</div>
                            <div class="mt-2 text-sm text-slate-600">Fees are based on amount, term, and schedule. Full breakdown appears before accepting.</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                            <div class="text-sm font-bold text-slate-900">Can I restructure payments?</div>
                            <div class="mt-2 text-sm text-slate-600">Yes. Contact us early and we’ll review your options with you.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-emerald-600">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-serif text-white mb-8 font-bold">Get a personalized quote</h2>
            <p class="text-emerald-100 text-xl max-w-2xl mx-auto mb-12">Tell us your product, amount, and schedule. We’ll respond quickly with clear terms.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="{{ url('/contact') }}" class="px-12 py-5 bg-white text-emerald-600 font-bold rounded-full shadow-2xl hover:scale-105 transition-all">Talk to an advisor</a>
                <a href="{{ url('/products') }}" class="flex items-center gap-3 text-white font-bold hover:scale-105 transition-all text-xl">
                    <i class="ph-bold ph-arrow-right text-3xl"></i> Explore products
                </a>
            </div>
        </div>
    </section>
@endsection

<style>
.slider::-webkit-slider-thumb {
    appearance: none;
    width: 20px;
    height: 20px;
    background: #84cc16;
    cursor: pointer;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}
.slider::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: #84cc16;
    cursor: pointer;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}
</style>

<script>
function pricingCalculator() {
    return {
        amount: 1000,
        term: 12,
        schedule: 'weekly',
        tier: 'growth',
        formatCurrency(value) {
            return '$' + value.toLocaleString();
        },
        getRate() {
            const rates = { starter: 3, growth: 2, business: 1.6 };
            return rates[this.tier] + '%';
        },
        getInterest() {
            const rate = this.tier === 'starter' ? 0.03 : this.tier === 'growth' ? 0.02 : 0.016;
            return Math.round(this.amount * rate);
        },
        getTotal() {
            return this.amount + this.getInterest();
        },
        getPayments() {
            if (this.schedule === 'weekly') return this.term;
            return Math.ceil(this.term / 4);
        },
        getPaymentAmount() {
            return Math.round(this.getTotal() / this.getPayments());
        },
        getFirstPaymentDate() {
            const days = this.schedule === 'weekly' ? 7 : 30;
            const date = new Date();
            date.setDate(date.getDate() + days);
            return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
        },
        getFinalPaymentDate() {
            const days = this.schedule === 'weekly' ? this.term * 7 : Math.ceil(this.term / 4) * 30;
            const date = new Date();
            date.setDate(date.getDate() + days);
            return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
        }
    }
}
</script>
