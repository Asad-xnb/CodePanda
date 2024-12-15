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
                    <h1 class="tagline mb-4" style="font-size: 1.7rem;">Food and groceries delivery from Islamabad’s best restaurants and shops</h1>
                </div>
                <div class="col-md-6">
                    <img style="height: 40vh; width: 100%; object-fit: cover;" src="https://images.unsplash.com/photo-1482049016688-2d3e1b311543?q=80&w=1910&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Delicious Food" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>


<section class="container my-5">
    <h2 class="text-left mb-4" style="color: var(--dark-purple); font-weight: 300">Menu</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Food Card 1 -->
        <div class="col">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Food Item">
                <div class="card-body">
                    <h5 class="card-title">Pizza Margherita</h5>
                    <p class="card-text">Classic pizza with fresh mozzarella, basil, and tomato sauce.</p>
                    <p class="fw-bold">Price: RS 999</p>
                    <button class="btn btn-purple">Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Food Card 2 -->
        <div class="col">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Food Item">
                <div class="card-body">
                    <h5 class="card-title">Grilled Chicken</h5>
                    <p class="card-text">Juicy grilled chicken served with a side of fresh vegetables.</p>
                    <p class="fw-bold">Price: $15.00</p>
                    <button class="btn btn-purple">Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Food Card 3 -->
        <div class="col">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Food Item">
                <div class="card-body">
                    <h5 class="card-title">Vegan Salad</h5>
                    <p class="card-text">A mix of fresh greens, quinoa, and avocado with a tangy dressing.</p>
                    <p class="fw-bold">Price: $10.00</p>
                    <button class="btn btn-purple">Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Add more food cards as needed -->
    </div>
</section>

  

    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

