<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
                                <i class="bi bi-house-door"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $active == 'addItem' ? 'active' : '' }}" href="/dashboard/add-food">
                                <i class="bi bi-file-earmark"></i>
                                Add New Item
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $active == 'menu' ? 'active' : "" }}" href="/dashboard/menu">
                                <i class="bi bi-cart"></i>
                                Menu Items
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-people"></i>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-bar-chart"></i>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>