<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('users/commons/loggedinnavbar')
    <title>Pay Now</title>
    <style>
        body, .container {
            background-color: #f8f9fa; /* Set background color */
            font-family: Arial, sans-serif; /* Set font family */
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column; /* Center content vertically */
        }

        .payment-section {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            width: 100%;
            text-align: center; /* Center text horizontally */
        }

        .payment-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn-pay {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-pay:hover {
            background-color: #0056b3;
        }

        .payment-image {
            width: 200px; /* Set width of the image */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 20px; /* Add margin to the bottom */
        }
    </style>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<div class="container">
    <img class="payment-image" src="image/payments.png" alt="Payment Image">
    <div class="payment-section">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h2 class="my-5">Place your order</h2>
                <button id="rzp-button1" class="btn-pay">Pay Now</button>
            </div>
        </div>
    </div>
</div>

<script>
    var urls = "{{ route('success') }}";
    var options = {
        "key": "rzp_test_zemKnuSiCYJFFR",
        "amount": '{{$razorpayOrder->amount}}',
        "currency": "INR",
        "name": "ekart",
        "description": "Test Transaction",
        "image": "image/ekart.webp",
        "order_id": "{{$razorpayOrder->id}}",
        "handler": function (response) {
            window.location.href = urls + '?payment_id=' + response.razorpay_payment_id;
        },
        "prefill": {
            "name": "Ritik Pandita",
            "email": "ritikpandita004@gmail.com",
            "contact": "9149541072"
        },
        "notes": {
            "address": "Razorpay Corporate Office"
        },
        "theme": {
            "color": "#3399cc"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function (response) {
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
    });
    document.getElementById('rzp-button1').onclick = function (e) {
        rzp1.open();
        e.preventDefault();
    }
</script>

</body>
</html>
