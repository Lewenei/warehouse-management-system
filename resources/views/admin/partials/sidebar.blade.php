<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Products Management -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-box-seam"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="products-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('products.index') }}">
                        <i class="bi bi-circle"></i><span>View Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.create') }}">
                        <i class="bi bi-circle"></i><span>Add Product</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Product Types Management -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#product-types-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-list-check"></i><span>Product Types</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="product-types-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('product-types.index') }}">
                        <i class="bi bi-circle"></i><span>View Product Types</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product-types.create') }}">
                        <i class="bi bi-circle"></i><span>Add Product Type</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Warehouse Locations Management -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#warehouse-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-house-door"></i><span>Warehouse Locations</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="warehouse-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('warehouse-locations.index') }}">
                        <i class="bi bi-circle"></i><span>View Warehouse Locations</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('warehouse-locations.create') }}">
                        <i class="bi bi-circle"></i><span>Add Warehouse Location</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Manage Users -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.viewUsers') }}">
                <i class="bi bi-person"></i><span>Users</span>
            </a>
        </li>

        <!-- Manage Suppliers -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('suppliers.index') }}">
                <i class="bi bi-truck"></i><span>Suppliers</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.sales.index') }}">
                <i class="bi bi-bag"></i> <!-- Sales icon -->
                <span>Sales</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.reports') }}">
                <i class="bi bi-file-earmark-text"></i> <!-- Optional icon -->
                <span>Reports</span>
            </a>
        </li>

        <!-- Add other links similarly -->
    </ul>
</aside>