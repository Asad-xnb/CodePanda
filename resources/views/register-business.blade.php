<!DOCTYPE html>
<html lang="en">
  @include('includes.head', ['title' => 'Register Business'])
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
  <body>
    @include('includes.header')
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
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <form action="{{ route('registerBusiness') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="businessName" class="form-label">Business Name</label>
                    <input type="text" class="form-control" id="businessName" name="name" 
                          value="{{ old('name') }}" placeholder="CodePanda" required />
                </div>

                <div class="mb-3">
                    <label for="businessPhone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="businessPhone" 
                          value="{{ old('phone') }}" placeholder="(041) 123 456678" required />
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <select class="form-select" id="city" name="city" required>
                        <option selected disabled>Select City</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="businessAddress" class="form-label">Business Address</label>
                    <input type="text" class="form-control" name="address" id="businessAddress" 
                          value="{{ old('address') }}" placeholder="Shop no. / Street no. / Landmark" required />
                </div>

                <div class="mb-3">
                    <label for="businessProfile" class="form-label">Business Profile Pic</label>
                    <input type="file" class="form-control" id="businessProfile" name="image" />
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="terms" id="termsConditions" 
                          {{ old('terms') ? 'checked' : '' }} />
                    <label class="form-check-label" for="termsConditions">
                        I agree to the <a href="#">Terms & Conditions</a>
                    </label>
                </div>

                <button type="submit" class="btn btn-purple">Register Business</button>
            </form>


        </div>
      </section>
      

    @include('includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
