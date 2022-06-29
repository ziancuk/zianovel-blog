<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header text-center ml-2 mt-4">
            <strong class="text-muted" style="font-size: 25px;">Antrian App</strong>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                            <i class="fas fa-home text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('listArtikel') ? 'active' : '' }}" href="/list-artikel">
                            <i class="fas fa-database text-primary"></i>
                            <span class="nav-link-text">List Artikel</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('genre') ? 'active':''}}" href="/genre">
                            <i class="fas fa-parking text-primary"></i>
                            <span class="nav-link-text">Genre</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <i class="fas fa-sign-out-alt text-danger"></i>
                            <span class="nav-link-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>