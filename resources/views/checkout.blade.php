<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - AdRetail Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="dashboard-nav">
        <div class="nav-container">
            <div class="logo">AdRetail Pro</div>
            <div class="user-menu">
                <span class="user-name">{{auth()->user()->name}}</span>
                <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}&background=4F46E5&color=fff&size=40&rounded=true&bold=true" alt="{{auth()->user()->name}}" class="profile-img">
            </div>
        </div>
    </nav>

    <div class="checkout-container">
        <div class="checkout-summary">
            <h2>Order Summary</h2>
            
            <div class="cart-items">
                @foreach($cartItems as $item)
                <div class="cart-item">
                    <img src="{{ $item->product->image ?? 'https://via.placeholder.com/100x100' }}" 
                         alt="{{ $item->product->name }}" class="item-image">
                    <div class="item-details">
                        <h3>{{ $item->product->name }}</h3>
                        <p class="item-price">
                            ₦{{ number_format($item->product->price * (1 - $item->product->discount/100), 2) }}
                            @if($item->product->discount > 0)
                                <span class="original-price">₦{{ number_format($item->product->price, 2) }}</span>
                            @endif
                        </p>
                        <div class="quantity-control">
                            <button class="qty-btn minus" data-item-id="{{ $item->id }}">-</button>
                            <span class="quantity">{{ $item->quantity }}</span>
                            <button class="qty-btn plus" data-item-id="{{ $item->id }}">+</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="order-total">
                <h3>Total Amount</h3>
                <p class="total-price">₦{{ number_format($total, 2) }}</p>
            </div>

            <form action="{{ route('payment.initialize') }}" method="POST" id="paymentForm">
                @csrf
                <button type="submit" class="btn btn-primary payment-button">
                    <i class="fas fa-lock"></i> Pay with Paystack
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quantity control
            document.querySelectorAll('.qty-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.dataset.itemId;
                    const isPlus = this.classList.contains('plus');
                    const quantitySpan = this.parentElement.querySelector('.quantity');
                    let quantity = parseInt(quantitySpan.textContent);

                    if (isPlus) {
                        quantity++;
                    } else if (quantity > 1) {
                        quantity--;
                    }

                    // Update quantity in database
                    fetch(`/cart/${itemId}/update-quantity`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ quantity })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            quantitySpan.textContent = quantity;
                            // Update total price
                            document.querySelector('.total-price').textContent = 
                                '₦' + new Intl.NumberFormat().format(data.total);
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
