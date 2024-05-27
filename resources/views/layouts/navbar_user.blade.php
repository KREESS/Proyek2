{{-- Navbar --}}
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="logo-text">User</span><br>
                <span class="logo-text logo-text-panel">Panel</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Belajar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tryout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">History Tryout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FeedBack</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle hover-effect" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu dropdown-menu-end bg-dark border border-dark border-1" aria-labelledby="dropdownMenuButton">
                        <li>
                            <button type="submit" class="dropdown-item text-light">Profile</button>
                            <!-- Form logout -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf <!-- Tambahkan CSRF token -->
                                <button type="submit" class="dropdown-item text-light">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
