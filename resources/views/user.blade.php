<!DOCTYPE html>
<html lang="en">
@include('includes.head', ['title' => $user['name']])
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
    </style>
<body>
    @include('includes.header')
    <div class="hero">
        <div class="container h-100">
            <div class="row hero-content align-items-center">
                <div class="col-md-6">
                    <h1 class="tagline mb-4" style="font-size: 1.7rem;">Food and groceries delivery from Islamabad’s best restaurants and shops</h1>
                </div>
            </div>
        </div>
    </div>
    

    <section class="user-profile py-5" style="background-color: #f8f9fa;">
        <div class="container">
          <h2 class="mb-4" style="color: var(--dark-purple); ">Welcome {{ $user['name'] }}</h2>
          <form action="/updateprofile" style="width: 50%;" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Name</label>
              <input type="text" class="form-control" name="username" id="userame" value="{{ $user['name'] }}" />
            </div>
      
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}" />
            </div>
      
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="phone" name="phone"  value="{{ $user['phone'] }}" />
            </div>
      
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="Enter Your Address For delivery" value="" />
            </div>
    
      
            <button type="submit" class="btn btn-purple">Update Information</button>
          </form>
          <div class="mt-2 mb-2">
              <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button class="nav-link" type="submit">Logout</button>
              </form>
          </div>
        
          @if (!$user['is_restaurant'] == "1")
                <div class="mt-3">
                    <a href="{{ route('registerBusiness') }}" class="btn btn-outline-dark mt-3">Register as Business</a>     
                </div>
            @else 
                <div class="mt-3">
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-dark mt-3">Dashboard</a>     
                </div>
            @endif
        </div>
      </section>
      

    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

