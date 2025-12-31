<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment – {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        .font-sans {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-display {
            font-family: 'Space Grotesk', sans-serif;
        }
    </style>
</head>

<body class="font-sans antialiased bg-base-200 min-h-screen text-base-content">

    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-20 -left-40 w-80 h-80 bg-primary/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-1/3 -right-40 w-96 h-96 bg-secondary/15 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/3 w-72 h-72 bg-accent/15 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 2s;"></div>
    </div>

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg w-full space-y-8">

            <!-- Header -->
            <div class="text-center">
                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-primary/30 rounded-2xl blur-md group-hover:opacity-70 transition-all duration-300">
                        </div>
                        <div
                            class="relative w-16 h-16 bg-base-100 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-all duration-300 shadow-xl p-3 border border-base-content/5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-10 h-10 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Badge -->
                <div class="badge badge-primary badge-outline gap-2 p-4 mb-4">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm font-semibold">Secure Payment</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-display font-bold leading-tight mb-3">
                    <span class="text-base-content">Secure</span>
                    <br>
                    <span class="text-primary">Payment</span>
                </h1>

                <p class="text-lg text-base-content/70">
                    {{ $planName ?? 'Membership' }} Subscription
                </p>
            </div>

            <!-- Amount Card -->
            <div class="relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-primary via-secondary to-accent rounded-3xl blur-xl opacity-20 group-hover:opacity-30 transition-opacity duration-500">
                </div>
                <div class="relative bg-base-100 rounded-2xl p-8 border border-primary/20 shadow-xl">
                    <div class="text-center">
                        <p class="text-sm font-semibold text-primary mb-2">Amount Due</p>
                        <p class="text-6xl font-display font-bold text-base-content mb-2">
                            ${{ number_format($amount, 2) }}</p>
                        <p class="text-xs text-base-content/60 font-medium">Includes processing & verification</p>
                    </div>
                </div>
            </div>

            <!-- Applicant Info -->
            <div class="bg-base-100 rounded-xl p-5 border border-base-300 shadow-lg">
                <h3 class="font-bold text-base-content mb-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    Subscriber Details
                </h3>
                <div class="text-sm text-base-content/70 space-y-2">
                    <div class="flex justify-between">
                        <span class="font-medium">Name:</span>
                        <span class="font-semibold text-base-content">{{ $data['first_name'] ?? '' }}
                            {{ $data['middle_name'] ?? '' }} {{ $data['last_name'] ?? '' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Email:</span>
                        <span class="font-semibold text-base-content">{{ $data['email'] ?? '' }}</span>
                    </div>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-primary via-secondary to-accent rounded-3xl blur-xl opacity-15 group-hover:opacity-25 transition-opacity duration-500">
                </div>

                <div class="relative bg-base-100 p-8 rounded-3xl shadow-2xl border border-base-300">
                    <form id="paymentForm" action="{{ route('payment.process') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="plan_id" value="{{ $planId ?? '' }}">

                        <!-- Payment Method -->
                        <div>
                            <label class="block text-base-content font-semibold mb-3 text-sm">
                                Payment Method
                            </label>
                            <label
                                class="flex items-center p-4 border-2 border-primary bg-primary/5 rounded-xl cursor-pointer transition-all">
                                <input type="radio" name="payment_method" value="card" checked
                                    class="radio radio-primary">
                                <div class="ml-3 flex items-center gap-3">
                                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    <div>
                                        <p class="font-bold text-base-content">Debit/Credit Card</p>
                                        <p class="text-xs text-base-content/60">Visa, Mastercard, Verve</p>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- Card Details -->
                        <div id="cardDetailsSection" class="space-y-4">
                            <!-- Card Number -->
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text font-semibold">Card Number</span>
                                </label>
                                <input type="text" id="card_number" name="card_number" placeholder="1234 5678 9012 3456"
                                    maxlength="19" required
                                    class="input input-bordered w-full font-mono text-lg focus:input-primary">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <!-- Expiry Date -->
                                <div class="form-control w-full">
                                    <label class="label">
                                        <span class="label-text font-semibold">Expiry Date</span>
                                    </label>
                                    <input type="text" id="card_expiry" name="card_expiry" placeholder="MM/YY"
                                        maxlength="5" required
                                        class="input input-bordered w-full font-mono text-lg focus:input-primary">
                                </div>

                                <!-- CVV -->
                                <div class="form-control w-full">
                                    <label class="label">
                                        <span class="label-text font-semibold">CVV</span>
                                    </label>
                                    <input type="text" id="card_cvv" name="card_cvv" placeholder="123" maxlength="4"
                                        required
                                        class="input input-bordered w-full font-mono text-lg focus:input-primary">
                                </div>
                            </div>

                            <!-- Cardholder Name -->
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text font-semibold">Cardholder Name</span>
                                </label>
                                <input type="text" id="card_name" name="card_name" placeholder="NAME ON CARD" required
                                    class="input input-bordered w-full font-medium uppercase focus:input-primary">
                            </div>
                        </div>

                        @if($errors->any())
                            <div role="alert" class="alert alert-error">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endif

                        <!-- Pay Button -->
                        <button id="payBtn" type="button"
                            class="btn btn-primary btn-lg w-full rounded-xl shadow-lg shadow-primary/30 hover:shadow-primary/50 text-xl font-bold">
                            <span class="flex items-center gap-2">
                                Pay ${{ number_format($amount, 0) }}
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                        </button>

                        <!-- Security Note -->
                        <div class="flex items-center justify-center text-xs text-base-content/50 gap-2">
                            <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Your payment is encrypted and secure</span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Back Link -->
            <div class="text-center">
                <a href="{{ route('plans') }}"
                    class="text-sm text-base-content/60 hover:text-primary font-medium inline-flex items-center group transition-colors">
                    <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Return to Plans
                </a>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div id="gatewayModal"
        class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50">
        <div class="bg-base-100 w-full max-w-md p-10 rounded-3xl shadow-2xl text-center mx-4 border border-base-300">
            <div class="flex justify-center mb-6">
                <div class="w-20 h-20 rounded-full bg-primary/10 flex items-center justify-center">
                    <svg class="w-10 h-10 text-primary animate-pulse" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <h2 class="text-2xl font-display font-bold mb-3 text-base-content">Processing Payment…</h2>
            <p id="processingText" class="text-base-content/70 font-medium">Initializing gateway…</p>
        </div>
    </div>

    <script>
        const payBtn = document.getElementById('payBtn');
        const modal = document.getElementById('gatewayModal');
        const processingText = document.getElementById('processingText');
        const form = document.getElementById('paymentForm');

        // Card input elements
        const cardNumber = document.getElementById('card_number');
        const cardExpiry = document.getElementById('card_expiry');
        const cardCVV = document.getElementById('card_cvv');
        const cardName = document.getElementById('card_name');

        // Format card number with spaces (1234 5678 9012 3456)
        cardNumber.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\s/g, '').replace(/\D/g, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            e.target.value = formattedValue;
        });

        // Format expiry date as MM/YY
        cardExpiry.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });

        // CVV - numbers only
        cardCVV.addEventListener('input', (e) => {
            e.target.value = e.target.value.replace(/\D/g, '');
        });

        // Cardholder name - letters and spaces only
        cardName.addEventListener('input', (e) => {
            e.target.value = e.target.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase();
        });

        payBtn.addEventListener('click', () => {

            // Validate card details
            const cardNumberValue = cardNumber.value.replace(/\s/g, '');
            const cardExpiryValue = cardExpiry.value;
            const cardCVVValue = cardCVV.value;
            const cardNameValue = cardName.value.trim();

            // Check if all fields are filled
            if (!cardNumberValue || !cardExpiryValue || !cardCVVValue || !cardNameValue) {
                alert("Please fill in all card details.");
                return;
            }

            // Validate card number (should be 13-19 digits)
            if (cardNumberValue.length < 13 || cardNumberValue.length > 19) {
                alert("Please enter a valid card number.");
                cardNumber.focus();
                return;
            }

            // Validate expiry format (MM/YY)
            if (!/^\d{2}\/\d{2}$/.test(cardExpiryValue)) {
                alert("Please enter expiry date in MM/YY format.");
                cardExpiry.focus();
                return;
            }

            // Validate expiry date is not in the past
            const [month, year] = cardExpiryValue.split('/').map(Number);
            const currentDate = new Date();
            const currentYear = currentDate.getFullYear() % 100;
            const currentMonth = currentDate.getMonth() + 1;

            if (year < currentYear || (year === currentYear && month < currentMonth)) {
                alert("Card has expired. Please use a valid card.");
                cardExpiry.focus();
                return;
            }

            if (month < 1 || month > 12) {
                alert("Please enter a valid month (01-12).");
                cardExpiry.focus();
                return;
            }

            // Validate CVV (3 or 4 digits)
            if (cardCVVValue.length < 3 || cardCVVValue.length > 4) {
                alert("Please enter a valid CVV (3 or 4 digits).");
                cardCVV.focus();
                return;
            }

            // Validate cardholder name
            if (cardNameValue.length < 3) {
                alert("Please enter the cardholder name.");
                cardName.focus();
                return;
            }

            // All validations passed, proceed with payment
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            payBtn.disabled = true;
            payBtn.classList.add('opacity-70');

            setTimeout(() => processingText.innerText = "Connecting to bank…", 1200);
            setTimeout(() => processingText.innerText = "Verifying card details…", 2200);
            setTimeout(() => {
                processingText.innerText = "Payment successful!";
                setTimeout(() => form.submit(), 1000);
            }, 3500);
        });
    </script>

</body>

</html>