<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Codepanda - Your favorite food, delivered fast</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      :root {
        --dark-purple: rgb(162, 20, 255);
      }
      .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
      }
      .nav-item {
        margin-left: 1rem;
      }
      .hero {
        height: 20vh;
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

      .password-input {
        position: relative;
      }

      .password-input input[type="password"] {
        padding-right: 30px;
      }

      .password-input .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a
          class="navbar-brand"
          href="index.html"
          style="color: var(--dark-purple)"
          >Codepanda</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNav"
        >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Restaurants</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="hero">
        <div class="container h-100">
            <div class="row hero-content align-items-center">
                <div class="col-md-6">
                    <h1 class="tagline mb-4" style="font-size: 1.7rem;">Food worth working for</h1>
                <p>Register your restaurant with Codepanda and reach more customers!</p>
                </div>
            </div>
        </div>
    </div>

    <section class="register-business py-5" style="background-color: #f8f9fa;">
        <div class="container">
          <h2 class="mb-4" style="color: var(--dark-purple); font-weight: 300;">Register Your Business</h2>
          <form action="/registerBusiness" method="POST">
            <div class="mb-3">
              <label for="businessName" class="form-label">Business Name</label>
              <input type="text" class="form-control" id="businessName" placeholder="CodePanda" required />
            </div>
      
            <div class="mb-3">
              <label for="businessEmail" class="form-label">Business Email</label>
              <input type="email" class="form-control" id="businessEmail" placeholder="example@business.com" required />
            </div>
      
            <div class="mb-3">
              <label for="businessPhone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="businessPhone" placeholder="(041) 123 456678" required />
            </div>
      
            <div class="mb-3">
              <label for="businessAddress" class="form-label">Business Address</label>
              <input type="text" class="form-control" id="businessAddress" placeholder="Shop no. / Street no. / Landmark / City" required />
            </div>
      
            <div class="mb-3">
              <label for="businessWebsite" class="form-label">Business Website (Optional)</label>
              <input type="url" class="form-control" id="businessWebsite" placeholder="https://www.codepanda.com" />
            </div>
      
            <div class="mb-3">
              <label for="businessLogo" class="form-label">Business Logo / Profile pic</label>
              <input type="file" class="form-control" id="businessLogo" />
            </div>
      
            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input" id="termsConditions" required />
              <label class="form-check-label" for="termsConditions">I agree to the <a href="#">Terms & Conditions</a></label>
            </div>
      
            <button type="submit" class="btn btn-purple">Register Business</button>
          </form>
        </div>
      </section>
      

    <div class="container">
      <section class="py-5">
        <div class="row">
          <div class="col-6 col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">Home</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary"
                  >Features</a
                >
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">About</a>
              </li>
            </ul>
          </div>

          <div class="col-6 col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">Home</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary"
                  >Features</a
                >
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">About</a>
              </li>
            </ul>
          </div>

          <div class="col-6 col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">Home</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary"
                  >Features</a
                >
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-body-secondary">About</a>
              </li>
            </ul>
          </div>

          <div class="col-md-5 offset-md-1 mb-3">
            <form>
              <h5>Subscribe to our newsletter</h5>
              <p>Monthly digest of what's new and exciting from us.</p>
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden"
                  >Email address</label
                >
                <input
                  id="newsletter1"
                  type="text"
                  class="form-control"
                  placeholder="Email address"
                />
                <button class="btn btn-purple" type="button">Subscribe</button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>

    <footer class="text-center py-3" style="background-color: #f0e6ff">
      <p>&copy; 2023 Codepanda. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3">
          <a class="link-body-emphasis" href="#"
            ><svg class="bi" width="24" height="24">
              <use xlink:href="#twitter"></use>
            </svg>
          </a>
        </li>
        <li class="ms-3">
          <a class="link-body-emphasis" href="#"
            ><svg class="bi" width="24" height="24">
              <use xlink:href="#instagram"></use></svg></a>
        </li>
        <li class="ms-3">
          <a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
              <use xlink:href="#facebook"></use></svg></a>
        </li>
      </ul>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
