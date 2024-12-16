<!DOCTYPE html>
<html lang="en">
@include('includes/head', ['title' => 'Home'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        :root {
            --dark-purple: rgb(162, 20, 255);
            font-family: "Montserrat", sans-serif;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .nav-item {
            margin-left: 1rem;
        }
        .hero {
            height: 100vh;
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
    </style>
<body>
        @include('includes/header')
    <div class="hero">
        <div class="container h-100">
            <div class="row hero-content align-items-center">
                <div class="col-md-6">
                    <h1 class="tagline mb-4" style="font-size: 1.7rem;">Delicious food, delivered to your doorstep</h1>
                    <form action="/findcity" method="post" class="input-group mb-3">
                        <input type="text" class="form-control" name="city" placeholder="Enter your city or postal code" aria-label="Postal code">
                        <button class="btn btn-outline-secondary" id="locate" type="button">Locate Me</button>
                        <button class="btn btn-purple" type="submit">Find Food</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <img style="height: 70vh; width: 100%; object-fit: cover;" src="https://images.unsplash.com/photo-1482049016688-2d3e1b311543?q=80&w=1910&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Delicious Food" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Find us in these cities and many more!</h2>
        <div class="cities__grid">
            @foreach ( $cities as $city )
                @include('includes/city-card', ['name' => $city['name'], 'image' => $city['image']])
            @endforeach
            
        </div>
    </div>

    <div class="container" style="margin: 6rem auto; width: 70%;">
        <h2 class="text-center mb-4">Our service used by popular brands</h2>
        <div class="row g-3 text-center">
      
            <div class="col-6 col-md-3">
                <img src="https://cdn.brandfetch.io/idd6YXWdqJ/theme/dark/logo.svg?c=1bfwsmEH20zzEfSNTed" 
                     alt="KFC Logo" class="img-fluid rounded" style="max-height: 100px;">
            </div>
           
            <div class="col-6 col-md-3">
                <img src="https://cdn.brandfetch.io/id7ETzoB9W/w/400/h/400/theme/dark/icon.png?c=1bfwsmEH20zzEfSNTed" 
                     alt="McDonald's Logo" class="img-fluid rounded" style="max-height: 100px;">
            </div>
          
            <div class="col-6 col-md-3">
                <img src="https://cdn.brandfetch.io/idh37nk_BV/theme/dark/symbol.svg?c=1bfwsmEH20zzEfSNTed" 
                     alt="Dominos logo" class="img-fluid rounded" style="max-height: 100px;">
            </div>
           
            <div class="col-6 col-md-3">
                <img src="https://cdn.brandfetch.io/id3O1uj8JT/theme/dark/logo.svg?c=1bfwsmEH20zzEfSNTed" 
                     alt="Subway Logo" class="img-fluid rounded" style="max-height: 100px;">
            </div>
            
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        How does Codepanda work?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Codepanda is a food delivery platform that connects you with a wide variety of restaurants in your area. Simply enter your location, browse through the available restaurants, select your favorite dishes, and place your order. Our delivery partners will then pick up your food and bring it straight to your doorstep.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        How long does delivery take?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Delivery times can vary depending on factors such as your location, the restaurant's preparation time, and current demand. On average, most orders are delivered within 20-25 minutes. You can track your order in real-time through our app or website to get a more accurate estimate.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Is there a minimum order amount?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Minimum order amounts can vary by restaurant. Some restaurants may have a minimum order requirement, while others don't. You can easily see the minimum order amount, if any, on the restaurant's page before placing your order.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        How can I pay for my order?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Codepanda offers various payment options for your convenience. You can pay using credit/debit cards, digital wallets, or cash on delivery (where available). All online payments are secure and encrypted to ensure your financial information is protected.
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes/footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

