<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: var(--dark-purple);">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Codepanda Restaurant</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="mt-2 mb-2" style="margin-right: 1rem;">
              <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button class="nav-link" type="submit">Sign Out</button>
              </form>
            </div>
        </div>
    </header>