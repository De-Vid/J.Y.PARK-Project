<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

        <li class="nav-item" style="font-weight: bold;">
            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <li class="nav-item" style="font-weight: bold;">
            <a href="{{ route('admin.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>Admin</p>
            </a>
        </li>

        <li class="nav-item" style="font-weight: bold;">
            <a href="{{ route('user.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>User</p>
            </a>
        </li>

        <li class="nav-item" style="font-weight: bold;">
            <a href="{{ route('admin.users') }}" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>User Roles</p>
            </a>
        </li>
        <li class="nav-item" style="font-weight: bold;">
            <a href="{{ route('admin.categories.index') }}" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>Categories</p>
            </a>
        </li>

        <li class="nav-item" style="font-weight: bold;">
            <a href="{{ route('admin.product.index') }}" class="nav-link">
                <i class="nav-icon fas fa-box-open"></i>
                <p>Product</p>
            </a>
        </li>
        
        <li class="nav-item" style="font-weight: bold;">
            <a href="{{ route('admin.orders.index') }}" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>Orders</p>
            </a>
        </li>

    </ul>
</nav>