<!DOCTYPE html>
<html lang="en">
@include('includes.head', ['title' => 'Dashboard'])
    <style>
        :root {
            --dark-purple: #a214ff;
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }
        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
        }
        .navbar .navbar-toggler {
            top: .25rem;
            right: 1rem;
        }
        .navbar .form-control {
            padding: .75rem 1rem;
        }
        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }
        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }
        .nav-link {
            color: #333;
        }
        .nav-link.active {
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
    </style>
<body>
    @include('includes.dashboard.header')

    <div class="container-fluid">
        <div class="row">
            @include('includes.dashboard.sidebar', ['active' => 'dashboard'])

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <i class="bi bi-calendar"></i>
                            This week
                        </button>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total Orders</h5>
                                <p class="card-text display-6">152</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Revenue</h5>
                                <p class="card-text display-6">$3,240</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">New Customers</h5>
                                <p class="card-text display-6">24</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Average Order Value</h5>
                                <p class="card-text display-6">$21.32</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>Recent Orders</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Items</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1001</td>
                                <td>John Doe</td>
                                <td>2x Burger, 1x Fries</td>
                                <td>$25.98</td>
                                <td><span class="badge bg-warning text-dark">Preparing</span></td>
                                <td><button class="btn btn-sm btn-purple">Update</button></td>
                            </tr>
                            <tr>
                                <td>1002</td>
                                <td>Jane Smith</td>
                                <td>1x Pizza, 1x Salad</td>
                                <td>$22.99</td>
                                <td><span class="badge bg-info text-dark">Out for Delivery</span></td>
                                <td><button class="btn btn-sm btn-purple">Update</button></td>
                            </tr>
                            <tr>
                                <td>1003</td>
                                <td>Bob Johnson</td>
                                <td>3x Tacos, 1x Soda</td>
                                <td>$18.97</td>
                                <td><span class="badge bg-success">Delivered</span></td>
                                <td><button class="btn btn-sm btn-purple">View</button></td>
                            </tr>
                            <tr>
                                <td>1004</td>
                                <td>Alice Brown</td>
                                <td>1x Pasta, 1x Garlic Bread</td>
                                <td>$16.99</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                                <td><button class="btn btn-sm btn-purple">View</button></td>
                            </tr>
                            <tr>
                                <td>1005</td>
                                <td>Charlie Wilson</td>
                                <td>2x Sushi Rolls, 1x Miso Soup</td>
                                <td>$29.97</td>
                                <td><span class="badge bg-warning text-dark">Preparing</span></td>
                                <td><button class="btn btn-sm btn-purple">Update</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
</body>
</html>

