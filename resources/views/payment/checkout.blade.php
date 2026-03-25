<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="bg-base-200 min-h-screen text-base-content antialiased" x-data="{ 
        paymentMethod: 'card',
        cardNumber: '',
        cardExpiry: '',
        cardCvc: '',
        isProcessing: false,
        processingMessage: 'Initializing Payment',
        messages: [
            'Initializing Payment',
            'Processing Transaction',
            'Transmitting Data',
            'Securing Tier',
            'Finalizing'
        ],
        messageIndex: 0,
        startProcessing() {
            this.isProcessing = true;
            let interval = setInterval(() => {
                if (!this.isProcessing) {
                    clearInterval(interval);
                    return;
                }
                this.messageIndex = (this.messageIndex + 1) % this.messages.length;
                this.processingMessage = this.messages[this.messageIndex];
            }, 1500);
        },
        formatCardNumber(e) {
            let val = e.target.value.replace(/\D/g, '');
            val = val.substring(0, 16);
            this.cardNumber = val.replace(/(\d{4})(?=\d)/g, '$1 ');
        },
        formatExpiry(e) {
            let val = e.target.value.replace(/\D/g, '');
            val = val.substring(0, 4);
            if (val.length > 2) {
                this.cardExpiry = val.substring(0, 2) + '/' + val.substring(2);
            } else {
                this.cardExpiry = val;
            }
        },
        formatCvc(e) {
            let val = e.target.value.replace(/\D/g, '');
            this.cardCvc = val.substring(0, 3);
        }
    }">

    <!-- Ambient background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div
            class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-primary/10 rounded-full blur-[120px] animate-pulse">
        </div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-secondary/10 rounded-full blur-[120px] animate-pulse"
            style="animation-delay: 2s;"></div>
    </div>

    <div class="min-h-screen py-12 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12">

            <!-- Left Column: Checkout Form (7 col) -->
            <div class="lg:col-span-7 space-y-8">
                <div class="flex items-center gap-4 mb-2">
                    <a href="{{ route('plans') }}"
                        class="w-10 h-10 rounded-xl bg-base-100 flex items-center justify-center text-base-content/40 hover:text-primary transition-all shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <h1 class="text-3xl font-black tracking-tight italic uppercase">Checkout</h1>
                </div>

                <!-- Payment Method Selection -->
                <div class="grid grid-cols-2 gap-4">
                    <button type="button" @click="paymentMethod = 'card'"
                        :class="paymentMethod === 'card' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-base-content/10 bg-base-100 hover:border-primary/50'"
                        class="relative p-6 rounded-3xl border-2 transition-all group overflow-hidden text-left">
                        <div class="absolute top-2 right-2" x-show="paymentMethod === 'card'">
                            <span class="flex h-3 w-3"><span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span><span
                                    class="relative inline-flex rounded-full h-3 w-3 bg-primary"></span></span>
                        </div>
                        <div
                            class="mb-4 w-12 h-12 rounded-2xl bg-base-200 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <h3 class="font-black italic uppercase text-xs tracking-wider mb-1">Electronic</h3>
                        <p class="text-[10px] font-bold text-base-content/40 uppercase tracking-widest">MasterCard /
                            Visa</p>
                    </button>

                    <button type="button" @click="paymentMethod = 'manual'"
                        :class="paymentMethod === 'manual' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-base-content/10 bg-base-100 hover:border-primary/50'"
                        class="relative p-6 rounded-3xl border-2 transition-all group overflow-hidden text-left">
                        <div class="absolute top-2 right-2" x-show="paymentMethod === 'manual'">
                            <span class="flex h-3 w-3"><span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span><span
                                    class="relative inline-flex rounded-full h-3 w-3 bg-primary"></span></span>
                        </div>
                        <div
                            class="mb-4 w-12 h-12 rounded-2xl bg-base-200 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        <h3 class="font-black italic uppercase text-xs tracking-wider mb-1">Direct</h3>
                        <p class="text-[10px] font-bold text-base-content/40 uppercase tracking-widest">Manual Transfer
                        </p>
                    </button>
                </div>

                <form action="{{ route('payment.process') }}" method="POST" enctype="multipart/form-data"
                    @submit="startProcessing()" class="space-y-8">
                    @csrf
                    <input type="hidden" name="plan_id" value="{{ $planId }}">
                    <input type="hidden" name="payment_method" :value="paymentMethod">

                    <!-- Card Payment Form -->
                    <div x-show="paymentMethod === 'card'" x-cloak class="space-y-6 animate-fade-in">
                        <div class="p-8 rounded-[2.5rem] bg-base-100 border border-base-content/5 shadow-2xl space-y-6">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-sm font-black uppercase tracking-[0.2em] text-primary">Card Details</h2>
                                <div class="flex gap-2">
                                    <div class="h-6 w-10 bg-base-200 rounded-md"></div>
                                    <div class="h-6 w-10 bg-base-200 rounded-md"></div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="form-control w-full">
                                    <label class="label"><span
                                            class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Cardholder
                                            Name</span></label>
                                    <input type="text" placeholder="FULL NAME"
                                        class="input input-bordered h-14 rounded-2xl border-2 border-base-content/5 focus:border-primary transition-all font-bold uppercase tracking-wider text-sm">
                                </div>

                                <div class="form-control w-full">
                                    <label class="label"><span
                                            class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Card
                                            Number</span></label>
                                    <div class="relative">
                                        <input type="text" placeholder="0000 0000 0000 0000" x-model="cardNumber"
                                            @input="formatCardNumber"
                                            class="input input-bordered w-full h-14 rounded-2xl border-2 border-base-content/5 focus:border-primary transition-all font-bold tracking-widest text-sm">
                                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-primary">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M2.5 12h2.5c0 .351.056.688.16 1h-2.66zm5.16-1c-.104.312-.16.649-.16 1s.056.688.16 1h8.68c.104-.312.16-.649.16-1s-.056-.688-.16-1h-8.68zm11.34 2c.104-.312.16-.649.16-1s-.056-.688-.16-1h2.66c0 .351-.056.688-.16 1z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="form-control">
                                        <label class="label"><span
                                                class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Expiry</span></label>
                                        <input type="text" placeholder="MM/YY" x-model="cardExpiry"
                                            @input="formatExpiry"
                                            class="input input-bordered h-14 rounded-2xl border-2 border-base-content/5 focus:border-primary transition-all font-bold tracking-widest text-sm text-center">
                                    </div>
                                    <div class="form-control">
                                        <label class="label"><span
                                                class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">CVC</span></label>
                                        <input type="password" placeholder="***" x-model="cardCvc" @input="formatCvc"
                                            class="input input-bordered h-14 rounded-2xl border-2 border-base-content/5 focus:border-primary transition-all font-bold tracking-widest text-sm text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Manual Transfer Form -->
                    <div x-show="paymentMethod === 'manual'" x-cloak class="space-y-6 animate-fade-in">
                        <div class="p-8 rounded-[2.5rem] bg-base-100 border border-base-content/5 shadow-2xl space-y-8">
                            <div>
                                <h2 class="text-sm font-black uppercase tracking-[0.2em] text-primary mb-6">Transfer
                                    Instructions</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="p-6 rounded-3xl bg-base-200 flex flex-col justify-center">
                                        <p
                                            class="text-[10px] font-black uppercase tracking-widest text-base-content/30 mb-1">
                                            Bank Name</p>
                                        <p class="font-black italic uppercase text-xs">AlphaMode Global</p>
                                    </div>
                                    <div class="p-6 rounded-3xl bg-base-200">
                                        <p
                                            class="text-[10px] font-black uppercase tracking-widest text-base-content/30 mb-1">
                                            Account Number</p>
                                        <div class="flex items-center justify-between">
                                            <p class="font-black text-sm tracking-widest">0123456789</p>
                                            <button type="button"
                                                class="text-primary hover:scale-110 transition-transform"><svg
                                                    class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 00-2 2z" />
                                                </svg></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-control w-full space-y-4">
                                <label class="label"><span class="label-text text-sm font-bold">Proof of
                                        Transaction</span></label>
                                <div
                                    class="relative group/upload h-48 rounded-[2rem] border-2 border-dashed border-base-content/10 flex flex-col items-center justify-center bg-base- content/5 hover:border-primary/50 transition-all overflow-hidden">
                                    <input type="file" name="receipt"
                                        class="absolute inset-0 opacity-0 cursor-pointer z-10" accept="image/*"
                                        @change="fileName = $event.target.files[0].name" x-data="{ fileName: '' }">
                                    <svg class="w-12 h-12 text-base-content/20 mb-4 group-hover/upload:text-primary transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="text-xs font-black uppercase tracking-widest text-base-content/40"
                                        x-text="fileName || 'Click to upload receipt'"></p>
                                </div>
                                @error('receipt')<p class="text-error text-xs font-bold">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" :disabled="isProcessing"
                        class="group/btn relative w-full h-20 rounded-[1.5rem] overflow-hidden shadow-2xl transition-all active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary to-accent"></div>
                        <div class="relative flex items-center justify-center gap-4">
                            <span x-show="!isProcessing"
                                class="font-black italic uppercase tracking-widest text-sm text-primary-content">Initialize
                                Payment</span>
                            <span x-show="isProcessing" x-cloak
                                class="font-black italic uppercase tracking-widest text-sm text-primary-content">Processing...</span>
                            <div x-show="!isProcessing"
                                class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center group-hover/btn:rotate-45 transition-transform">
                                <svg class="w-4 h-4 text-primary-content" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                            <div x-show="isProcessing" x-cloak
                                class="loading loading-spinner loading-md text-primary-content"></div>
                        </div>
                    </button>

                    <div class="flex items-center justify-center gap-8 opacity-20">
                        <div
                            class="h-6 w-10 bg-base-content/50 rounded flex items-center justify-center text-[10px] font-black italic">
                            VISA</div>
                        <div
                            class="h-6 w-10 bg-base-content/50 rounded flex items-center justify-center text-[10px] font-black italic">
                            MC</div>
                        <div
                            class="h-6 w-10 bg-base-content/50 rounded flex items-center justify-center text-[10px] font-black italic">
                            AES-256</div>
                    </div>
                </form>
            </div>

            <!-- Right Column: Order Summary (5 col) -->
            <div class="lg:col-span-5">
                <div
                    class="sticky top-12 p-10 rounded-[2.5rem] bg-base-100/50 backdrop-blur-2xl border border-base-content/5 shadow-2xl space-y-10">
                    <div>
                        <h2
                            class="text-sm font-black uppercase tracking-[0.3em] text-base-content/40 mb-8 pb-4 border-b border-base-content/5">
                            Summary</h2>

                        <div class="space-y-6">
                            <div class="flex flex-col">
                                <p class="text-[10px] font-black uppercase tracking-widest text-primary mb-1">Biological
                                    Identity</p>
                                <p class="text-xl font-bold tracking-tight lowercase italic">{{ auth()->user()->name }}
                                </p>
                            </div>

                            <div class="flex flex-col">
                                <p class="text-[10px] font-black uppercase tracking-widest text-primary mb-1">
                                    Performance Tier</p>
                                <p class="text-2xl font-black italic uppercase tracking-tighter">{{ $planName }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4 pt-10 border-t border-base-content/5">
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold uppercase tracking-widest text-base-content/40">Tier
                                Basic</span>
                            <span class="font-black tracking-tight">${{ number_format($amount, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold uppercase tracking-widest text-base-content/40">System
                                Fee</span>
                            <span class="font-black text-success tracking-tight">FREE</span>
                        </div>
                        <div
                            class="flex justify-between items-center pt-4 mt-4 border-t-2 border-dashed border-base-content/5">
                            <span class="font-black italic uppercase tracking-widest text-xs">Total Commitment</span>
                            <span
                                class="text-3xl font-black italic tracking-tighter text-primary">${{ number_format($amount, 2) }}</span>
                        </div>
                    </div>

                    <div class="p-6 rounded-3xl bg-primary/10 border border-primary/20">
                        <div class="flex gap-4">
                            <div
                                class="w-10 h-10 rounded-2xl bg-primary flex items-center justify-center text-primary-content shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-widest mb-1 text-primary">Priority
                                    Secured</p>
                                <p
                                    class="text-[10px] leading-relaxed text-base-content/60 font-medium uppercase tracking-tight">
                                    Your data is encrypted using military-grade AES-256 protocols.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Processing Overlay -->
    <div x-show="isProcessing" x-cloak
        class="fixed inset-0 z-[100] flex flex-col items-center justify-center bg-base-300/60 backdrop-blur-md animate-fade-in">
        <div class="relative">
            <div
                class="w-24 h-24 rounded-[2rem] bg-base-100 shadow-2xl flex items-center justify-center animate-bounce">
                <svg class="w-12 h-12 text-primary animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <div class="absolute -top-2 -right-2">
                <span class="flex h-6 w-6">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-6 w-6 bg-primary"></span>
                </span>
            </div>
        </div>
        <div class="mt-8 text-center space-y-2">
            <h2 x-text="processingMessage"
                class="text-2xl font-black italic uppercase tracking-tighter bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent min-h-[1.5em]">
                Initializing Payment
            </h2>
            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-base-content/40">
                Securing your performance tier...
            </p>
        </div>
    </div>

</body>

</html>