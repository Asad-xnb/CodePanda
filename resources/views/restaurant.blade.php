<!DOCTYPE html>
<html lang="en">
@include('includes.head', ['title' => 'Restaurant'])
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

    :root {
        --dark-purple: rgb(162, 20, 255);
        --dark-purple-50: rgba(162, 20, 255, 0.5);
        font-family: "Montserrat", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .nav-item {
        margin-left: 1rem;
    }

    .hero {
        height: 50vh;
        background-color: #f8f9fa;
    }

    .hero-content {
        height: 100%;
    }

    .tagline {
        font-size: 2.5rem;
        font-weight: bold;
        color: var(--dark-purple);
    }

    .btn-purple {
        background-color: var(--dark-purple);
        color: white;
    }

    .btn-purple:hover {
        background-color: #b44aff;
        color: white;
    }

    .cities__grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1rem;
    }

    .cities__grid-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        transition: transform 0.3s ease;
        aspect-ratio: 4 / 3;
    }

    .cities__grid-item:hover {
        transform: scale(1.05);
    }

    .cities__grid-item figure {
        width: 100%;
        height: 100%;
        margin: 0;
    }

    .cities__grid-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .cities__grid-item figcaption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 0.5rem;
        background: rgba(162, 20, 255, 0.7);
        color: white;
        font-weight: bold;
    }

    .accordion-button:not(.collapsed) {
        background-color: #f0e6ff;
        color: var(--dark-purple);
    }

    .accordion-button:focus {
        border-color: var(--dark-purple);
        box-shadow: 0 0 0 0.25rem rgba(162, 20, 255, 0.25);
    }

    .card:hover {
        transform: scale(1.03);
        transition: transform 0.3s ease;
    }
</style>

<body>
    @include('includes.header')

    <div class="hero">
        <div class="container h-100">
            <div class="row hero-content align-items-center">
                <div class="col-md-6">
                    <h1 class="tagline mb-4" style="font-size: 1.7rem;">{{ $restaurant['name'] }}</h1>
                    <p><strong>Address:</strong> {{ $restaurant['address'] }}</p>
                    <p><strong>Phone:</strong> {{ $restaurant['phone'] }}</p>
                </div>
                <div class="col-md-6">
                    <img style="height: 40vh; width: 100%; object-fit: cover;" src="/images/{{ $restaurant['image'] }}"
                        alt="{{ $restaurant['name'] }} image" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>


    <section class="container my-5">
        <h2 class="text-left mb-4" style="color: var(--dark-purple); font-weight: 300">Menu</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($foods as $food)
                <div class="col">
                    <div class="card h-100">
                        <img src="/images/{{ $food['image'] }}" class="card-img-top img-fluid"
                            alt="{{ $food['name'] }} picture" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $food['name'] }}</h5>
                            <p class="card-text">{{ $food['description'] }}</p>
                            @if ($food['discount'] > 0)
                                <p class="fw-bold">
                                    Price:
                                    <span class="text-muted text-decoration-line-through">RS {{ $food['price'] }}</span>
                                    RS {{ $food['price'] - $food['discount'] }}
                                </p>
                            @else
                                <p class="fw-bold">Price: RS {{ $food['price'] }}</p>
                            @endif
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $food['id'] }}">
                                <input type="hidden" name="name" value="{{ $food['name'] }}">
                                <input type="hidden" name="price" value="{{ $food['price'] }}">
                                <input type="hidden" name="image" value="{{ $food['image'] }}">
                                <input type="hidden" name="restaurant_name" value="{{ $restaurant['name'] }}">
                                <input type="hidden" name="restaurant_id" value="{{ $restaurant['id'] }}">
                                @if ($food['discount'] > 0)
                                    <input type="hidden" name="discount" value="{{ $food['discount'] }}">
                                @endif
                                <button class="btn btn-purple">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
    </section>
    <section class="container my-5">
        <h2 id="location1">Address</h2>
        <section class="location1" style="padding-top: 20px; height: 70vh;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d851.3103244936692!2d73.09847299982485!3d31.407477280628207!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x392267cd226d1499%3A0x99502afb0af8385f!2sFrozen%20Feast!5e0!3m2!1sen!2s!4v1734935152535!5m2!1sen!2s"
                style="border: 0; width: 100%; height: 100%" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </section>
    </section>
    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>