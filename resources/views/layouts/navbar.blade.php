<!-- Left navbar -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#">
            <i class="fas fa-bars"></i>
        </a>
    </li>
</ul>

<!-- Right navbar -->
<ul class="navbar-nav ml-auto">

    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger btn-sm">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </li>

</ul>