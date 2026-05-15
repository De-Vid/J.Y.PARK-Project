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

    </ul>
</nav>