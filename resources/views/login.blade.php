<!DOCTYPE html>
<html lang="en">
  @include('includes.head', ['title' => 'Login'])
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

    <section class="signup-section py-5" style="background-color: #f8f9fa">
      <div
        class="container"
        style="
          max-width: 500px;
          margin: 0 auto;
          background: white;
          padding: 30px;
          border-radius: 10px;
          box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        "
      >
        <h2 class="text-center mb-4" style="color: var(--dark-purple)">
          Be an authenticated User
        </h2>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="post" class="d-flex flex-column gap-3">
          @csrf
          <div class="mb-3">
            <label
              for="cred"
              class="form-label"
              style="font-weight: bold; color: var(--dark-purple)"
              >Email/Phone</label
            >
            <input
              type="text"
              class="form-control"
              id="cred"
              name="cred"
              placeholder="Enter your email or Phone"
              required />
          </div>

          <div class="form-group">
            <label
              for="password"
              class="form-label"
              style="font-weight: bold; color: var(--dark-purple)"
              >Password</label
            >
            <div class="password-input">
              <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Enter your password"
                id="password"
                required
              />
              <span
                title="Show Password"
                id="pass"
                class="toggle-password"
                onclick="togglePasswordVisibility()"
              >
                <svg
                  width="24px"
                  height="24px"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z"
                    stroke="#000000"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z"
                    stroke="#000000"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </span>
            </div>
          </div>


          <button type="submit" class="btn btn-purple w-100">Log-In</button>
        </form>
        <p class="text-center mt-3" style="color: #555">
          Don't have an account?
          <a href="{{ route('signup.form') }}" style="color: var(--dark-purple); font-weight: bold"
            >Register here</a
          >
        </p>
      </div>
    </section>

    @include('includes.footer')

    <script>
      const span = document.getElementById("pass");
      function togglePasswordVisibility() {
        if (password.type === "password") {
          password.type = "text";
          span.title = "Hide Password";
          span.innerHTML = `<svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M2 2L22 22" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M6.71277 6.7226C3.66479 8.79527 2 12 2 12C2 12 5.63636 19 12 19C14.0503 19 15.8174 18.2734 17.2711 17.2884M11 5.05822C11.3254 5.02013 11.6588 5 12 5C18.3636 5 22 12 22 12C22 12 21.3082 13.3317 20 14.8335" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M14 14.2362C13.4692 14.7112 12.7684 15.0001 12 15.0001C10.3431 15.0001 9 13.657 9 12.0001C9 11.1764 9.33193 10.4303 9.86932 9.88818" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>`;
        } else {
          password.type = "password";
          span.title = "Show Password";
          span.innerHTML = `<svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>`;
        }
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>