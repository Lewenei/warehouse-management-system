<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.products') }}">
                <i class="bi bi-box"></i>
                <span>Products</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.suppliers') }}">
                <i class="bi bi-people"></i>
                <span>Suppliers</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.locations') }}">
                <i class="bi bi-geo-alt"></i>
                <span>Warehouse Locations</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.sales.index') }}">
                <i class="bi bi-bag"></i> <!-- Sales icon -->
                <span>Sales</span>
            </a>
        </li>
    </ul>
</aside>