<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Buxale') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>

    @livewireStyles
</head>
<body>
<div>
    <x-announce/>


    <div class="py-10 container mx-auto">
        <form action="/charge" method="post" id="payment-form">
            <div class="form-row inline">
                <div class="col">
                    <label for="accountholder-name">
                        Name
                    </label>
                    <input
                            id="accountholder-name"
                            name="accountholder-name"
                            placeholder="Jenny Rosen"
                            required
                    />
                </div>

                <div class="col">
                    <label for="email">
                        Email Address
                    </label>
                    <input
                            id="email"
                            name="email"
                            type="email"
                            placeholder="jenny.rosen@example.com"
                            required
                    />
                </div>
            </div>

            <div class="form-row">
                <!--
                  Using a label with a for attribute that matches the ID of the
                  Element container enables the Element to automatically gain focus
                  when the customer clicks on the label.
                -->
                <label for="iban-element">
                    IBAN
                </label>
                <div id="iban-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>
            </div>

            <!-- Add the client_secret from the PaymentIntent as a data attribute   -->
            <button id="submit-button" data-secret="{CLIENT_SECRET}">Submit Payment</button>

            <!-- Used to display form errors. -->
            <div id="error-message" role="alert"></div>

            <!-- Display mandate acceptance text. -->
            <div id="mandate-acceptance">
                By providing your IBAN and confirming this payment, you are authorizing
                Rocketship Inc. and Stripe, our payment service provider, to send
                instructions to your bank to debit your account in accordance with those
                instructions. You are entitled to a refund from your bank under the terms
                and conditions of your agreement with your bank. A refund must be claimed
                within eight weeks starting from the date on which your account was debited.
            </div>
        </form>
    </div>
    <x-footer/>
</div>

<script>
    // Set your publishable key: remember to change this to your live publishable key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
    var stripe = Stripe('pk_test_gFWgejrEFQU3q4FeV0GjLatz00yDQ8BagV');
    var elements = stripe.elements();
    {{--var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx', {--}}
    {{--    stripeAccount: "{{$acc_id}}"--}}
    {{--});--}}
    var elements = stripe.elements();

    // Set up Stripe.js and Elements to use in checkout form
    var style = {
        base: {
            color: "#32325d",
        }
    };

    var card = elements.create("card", { style: style });
    card.mount("#card-element");
    card.addEventListener('change', ({error}) => {
        const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.textContent = error.message;
        } else {
            displayError.textContent = '';
        }
    });
    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(ev) {
        ev.preventDefault();
        stripe.confirmCardPayment('{{$intent_secret}}', {
            payment_method: {
                card: card,
                billing_details: {
                    name: 'Jenny Rosen'
                }
            }
        }).then(function(result) {
            if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    // Show a success message to your customer
                    // There's a risk of the customer closing the window before callback
                    // execution. Set up a webhook or plugin to listen for the
                    // payment_intent.succeeded event that handles any business critical
                    // post-payment actions.
                }
            }
        });
    });
</script>

@livewireScripts
</body>
</html>
