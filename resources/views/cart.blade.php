<!DOCTYPE html>
<html lang="en">
@include('includes/head', ['title' => 'Cart'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
        :root {
            --dark-purple: #a214ff;
            font-family: "Montserrat", sans-serif;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .nav-item {
            margin-left: 1rem;
        }
        .btn-purple {
            background-color: var(--dark-purple);
            color: white;
        }
        .btn-purple:hover {
            background-color: #b44aff;
            color: white;
        }
        .cart-item {
            border-bottom: 1px solid rgb(162, 187, 211);
            padding: 1rem 0;
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        .cart-item img {
            max-width: 100px;
            height: auto;
        }
    </style>
<body>
    @include('includes/header')

    <div class="container my-5">
        <h1 class="mb-4">Your Cart</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="cart-items">
                    @foreach ($cartItems as $cartItem)
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <img src="{{ $cartItem['attributes']['image'] }}" alt="{{ $cartItem['name'] }} image" class="img-fluid rounded">
                                </div>
                                <div class="col-6">
                                    <h5>{{ $cartItem['name'] }}</h5>
                                    <p class="text-muted">From: Burger Haven</p>
                                </div>
                                <div class="col-3 text-end">
                                @if ($cartItem['attributes']['discount'] > 0)
                                    <p class="fw-bold">
                                        Price: 
                                        <span class="text-muted text-decoration-line-through">RS {{ $cartItem['price'] }}</span> 
                                        RS {{ $cartItem['price'] - $cartItem['attributes']['discount'] }}
                                    </p>
                                @else
                                    <p class="fw-bold">Price: RS {{ $cartItem['price'] }}</p>
                                @endif
                                <div class="btn-group" role="group">
                                    <form action="{{ route('cart.updateQuantity') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $cartItem['id'] }}">
                                        <input type="hidden" name="quantity" value="{{ $cartItem['quantity'] - 1 }}">
                                        <button type="submit" class="btn btn-outline-secondary btn-sm" {{ $cartItem['quantity'] <= 1 ? 'disabled' : '' }}>-</button>
                                    </form>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" disabled>{{ $cartItem['quantity'] }}</button>
                                    <form action="{{ route('cart.updateQuantity') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $cartItem['id'] }}">
                                        <input type="hidden" name="quantity" value="{{ $cartItem['quantity'] + 1 }}">
                                        <button type="submit" class="btn btn-outline-secondary btn-sm">+</button>
                                    </form>
                                </div>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $cartItem['id'] }}">
                                    <button type="submit" class="btn btn-link text-danger">Remove</button>
                                </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>RS {{$cartTotal}}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Delivery Fee:</span>
                            <span>RS {{$deliveryFee}}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>GST:</span>
                            <span>RS {{$GST}}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 fw-bold">
                            <span>Total:</span>
                            <span>RS {{ $cartTotal + $deliveryFee + $GST}}</span>
                        </div>
                        <form>
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="expiryDate" class="form-label">Expiry Date</label>
                                    <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" required>
                                </div>
                                <div class="col">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" placeholder="123" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cardName" class="form-label">Name on Card</label>
                                <input type="text" class="form-control" id="cardName" placeholder="Asad Zubair" required>
                            </div>
                            <button type="submit" class="btn btn-purple w-100">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes/footer')
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

