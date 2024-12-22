<!DOCTYPE html>
<html lang="en">
@include('includes.head', ['title' => 'Add Food Item'])
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
            @include('includes.dashboard.sidebar', ['active' => 'addItem'])

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Add Food Item</h1>
                </div>

                <form class="needs-validation" action="{{ route('addFood') }}" method="post" enctype="multipart/form-data" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="itemName" class="form-label">Item Name</label>
                            <input type="text" class="form-control" name="name" id="itemName" placeholder="e.g. Chicken Burger" required>
                            <div class="invalid-feedback">
                                Valid item name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Describe the food item..." required></textarea>
                            <div class="invalid-feedback">
                                Please enter a description.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="price" class="form-label">Price (RS)</label>
                          <input type="number" class="form-control" id="price" name="price" placeholder="100" step="1" min="0" required>
                            <div class="invalid-feedback">
                                Valid price is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="discount" class="form-label">Discount (If-Any)</label>
                            <input type="text" class="form-control" id="discount" name="discount" placeholder="e.g. In Rupees (20)" required>
                            <div class="invalid-feedback">
                                Please Enter valid Discount.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="itemImage" class="form-label">Item Image</label>
                            <input type="file" class="form-control" id="itemImage" accept="image/*" required>
                            <div class="invalid-feedback">
                                Please upload an image for the food item.
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-purple btn-lg" type="submit">Add Food Item</button>
                </form>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

