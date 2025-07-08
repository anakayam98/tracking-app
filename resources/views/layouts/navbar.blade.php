<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- User Info & Logout -->
        <li class="nav-item dropdown no-arrow">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                {{ Auth::user()->name }}
            </span>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Logout</button>
            </form>
        </li>
    </ul>
</nav>
