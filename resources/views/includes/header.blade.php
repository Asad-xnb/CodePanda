<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color: var(--dark-purple);">CodePanda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav" style="align-items: center;">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/restaurants">Restaurants</a>
                </li>
                @if (!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.form') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signup.form') }}">Signup</a>
                    </li>
                @else

                    <li class="nav-item">
                    <a class="nav-link" href="/user">
                        <i class="bi bi-person-circle" style="font-size: 1.5rem; color: var(--dark-purple);"></i>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link position-relative" href="/cart">
                        <i class="bi bi-cart" style="font-size: 1.5rem; color: var(--dark-purple);"></i>
                        
                        <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger">
                            {{ Cart::getTotalQuantity() }}
                        </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
