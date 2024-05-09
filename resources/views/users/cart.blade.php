<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    @include('users/commons/loggedinnavbar')
    <style>
      /* Common styles for both desktop and mobile */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

header {
    background-color: #232f3e; 
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

main {
    padding: 20px;
    display: flex;
    justify-content: center;
}

.cart-items {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    max-width: 800px;
    width: 100%;
}

.item {
    border-bottom: 1px solid #ddd;
    padding: 20px 0;
    display: flex;
}

.item img {
    max-width: 150px;
    margin-right: 20px;
}

.item-details {
    flex-grow: 1;
}

.item-details h2 {
    font-size: 18px;
    margin: 0;
    margin-bottom: 10px;
    color: #111;
}

.quantity-selector {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.quantity-selector button {
    background-color: #f0c14b;
    color: #111;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    margin-right: 5px;
}

.quantity-selector button:hover {
    background-color: #ddb347;
}

.quantity-display {
    font-weight: bold;
    padding: 5px 10px;
    border: 1px solid #ddd;
}

.remove-btn {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.remove-btn:hover {
    background-color: #c0392b;
}

.subtotal {
    font-size: 18px;
    color: #333;
    margin-top: 20px;
    border-top: 1px solid #ddd;
    padding-top: 20px;
}

.cart-summary {
    background-color: #f3f3f3;
    border-radius: 8px;
    padding: 20px;
    margin-left: 20px;
    flex-shrink: 0;
    width: 200px;
}

.cart-summary h2 {
    font-size: 20px;
    margin-bottom: 20px;
    color: #333;
}

.cart-summary p {
    margin: 0;
    margin-bottom: 10px;
    color: #555;
}

.checkout-btn, .continue-btn {
    display: block;
    width: 100%;
    text-align: center;
    padding: 10px;
    background-color: #f0c14b;
    color: #111;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    margin-top: 10px;
}

.checkout-btn:hover, .continue-btn:hover {
    background-color: #ddb347;
}

.no-products {
    background-color: #f0c14b;
    border-radius: 8px;
    padding: 20px;
    width: 100%;
    text-align: center;
    color: #555;
}

/* Media query for mobile devices */
@media only screen and (max-width: 600px) {
    main {
        flex-direction: column; /* Stack items vertically */
        align-items: stretch; /* Stretch items to fill width */
    }

    .cart-items {
        margin-bottom: 20px; /* Add some space between cart items and summary */
    }

    .cart-summary {
        margin-left: 0; /* Reset margin for summary */
    }
}
main {
    padding: 20px;
    display: flex;
    justify-content: center;
    margin-top: 70px; /* Add margin-top to create space between navbar and cart */
}




    </style>
</head>
<body>
    <main>
        <section class="cart-items">
          
            @if(count($userCartItems) > 0)
            @foreach($userCartItems as $details)
            <div class="item" data-product-id="{{ $details->p_id }}">
                <img src="{{ asset($details->image) }}" alt="Product Image">
                <div class="item-details">
                    <h2>{{ $details->p_name }}</h2>
                    <p>Price: {{ $details->p_price }}</p>
                    <div class="quantity-selector">
                        <form action="{{route('deleteQuantity')}}" method="POST">
                            @csrf
                            <input type="hidden" name="p_id" value="{{ $details->p_id }}">
                            <input type="hidden" name="u_id" value="{{ $details->u_id }}">
                           
                            <button type="submit" name="decrease"  id="decrease"  class="decrease-btn">-</button>
                           
                            <input type="hidden" name="qty" value="{{ $details->qty }}">

                       
                        </form>
                        <span class="quantity-display">{{ $details->qty }}</span>
                        <form action="{{route('updatequantity')}}" method="POST">
                            @csrf
                            <input type="hidden" name="p_id" value="{{ $details->p_id }}">
                            <input type="hidden" name="u_id" value="{{ $details->u_id }}">
                           
                            
                         
                            <input type="hidden" name="qty" value="{{ $details->qty }}">
                            <button type="submit" name="increase" id="increase" class="increase-btn">+</button>
                        </form>
                       
                    </div>
                    <a href="/cartremove?id={{ $details->id }}" class="remove-btn">Remove</a>
                </div>
            </div>
            @endforeach
            @else
            <div class="no-products">
                No Products found
            </div>
            @endif
        </section>
        
        @if(count($userCartItems) > 0)
            <section class="cart-summary">
                <h2>Cart Summary</h2>
                <p class="subtotal">Subtotal: 0.00</p>
                <p class="tax">Tax: 0.00</p>
                <p class="total">Total: 0.00</p>
                <button class="error-message" style="color: black; display: none; background-color:  #f0c14b; border: 2px solid  #f0c14b; padding: 10px; cursor: pointer;">Please add a product to checkout.</button>

                <!-- Hidden input fields for sending data to the checkout endpoint -->
                <input type="hidden" name="subtotal" value="0.00">
                <input type="hidden" name="tax" value="0.00">
                <input type="hidden" name="total" value="0.00">
                
                <a href="/shipment" class="checkout-btn">Checkout</a>
              
                <a href="{{ route('userproduct') }}" class="continue-btn">Continue Shopping</a>
            </section>
        @endif
    
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const subtotalElement = document.querySelector('.subtotal');
            const taxElement = document.querySelector('.tax');
            const totalElement = document.querySelector('.total');
            const checkoutBtn = document.querySelector('.checkout-btn');
            const errorMessage = document.querySelector('.error-message');

            function updateSummary() {
                let subtotal = 0;
                document.querySelectorAll('.item').forEach(item => {
                    const price = parseFloat(item.querySelector('.item-details p').textContent.split(':')[1].trim().replace('$', ''));
                    const quantity = parseInt(item.querySelector('.quantity-display').textContent);
                    subtotal += price * quantity;
                });
                const taxRate = 0.1; // Assuming tax rate of 10%
                const tax = subtotal * taxRate;
                const total = subtotal + tax;

                subtotalElement.textContent = `Subtotal: ${subtotal.toFixed(2)}`;
                taxElement.textContent = `Tax: ${tax.toFixed(2)}`;
                totalElement.textContent = `Total: ${total.toFixed(2)}`;

               
                if (total === 0) {
                    errorMessage.style.display = 'block';
                    checkoutBtn.style.display = 'none';
                } else {
                    errorMessage.style.display = 'none';
                    checkoutBtn.style.display = 'block';
                }
            }

            
            updateSummary();
        });
    </script>
</body>
</html>