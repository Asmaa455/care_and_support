<!DOCTYPE html>
<html>
<head>
    <title>Stripe Test</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <form id="payment-form">
        <div id="card-element">
            <!-- سيتم إدراج Stripe Element هنا -->
        </div>
        <div>
            <label for="postal-code">ZIP Code:</label>
            <input type="text" id="postal-code" name="postal-code">
        </div>
        <button type="submit">Submit Payment</button>
    </form>

    <div id="card-errors" role="alert"></div>

    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}'); // استخدم مفتاح Stripe العام الخاص بك
        var elements = stripe.elements();

        var card = elements.create('card', { hidePostalCode: true });
        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var postalCode = document.getElementById('postal-code').value;

            stripe.createToken(card, { address_zip: postalCode }).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            console.log('stripeToken:', token.id);
            alert('stripeToken: ' + token.id);
        }
    </script>
</body>
</html>
