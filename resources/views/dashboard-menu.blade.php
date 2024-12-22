<!DOCTYPE html>
<html lang="en">
@include('includes.head', ['title' => 'Menu'])
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
        .food-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
<body>
    @include('includes.dashboard.header')

    <div class="container-fluid">
        <div class="row">
        @include('includes.dashboard.sidebar', ['active' => 'menu'])

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Menu Items</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-purple">
                            <i class="bi bi-plus-circle"></i>
                            Add New Item
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Discount</th>
                      
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food)
                                <tr>
                                    <td class="align-middle"><img src="/images/{{ $food['image'] }}" alt="{{ $food['name'] }} image" class="food-image"></td>
                                    <td class="align-middle">{{ $food['name'] }}</td>
                                    <td class="align-middle">{{ $food['price'] }}</td>
                                    <td class="align-middle">{{ $food['discount'] }}</td>
                               
                                    <td class="align-middle">
                                        <a href="/dashboard/menu/update/{{ $food['id'] }}" class=" btn btn-sm btn-outline-primary me-1">Update</a>
                                        <a href="/dashboard/menu/delete/{{ $food['id'] }}" class=" btn btn-sm btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

