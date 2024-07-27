<nav class="navbar navbar-expand-lg bg-body-tertiary  fixed-top navbarr">
    <div class="container px-5">
        <a class="navbar-brand" href="#" style="font-weight: 600;">CVQ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ulnav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#skill">Skill</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#project">Project</a>
                </li>
            </ul>


            <form class="d-flex gap-2" role="search">
                @if (!Auth::user())
                    <a href="/login" class="btn btn-outline-primary" wire:navigate>Login</a>
                @else
                    <a href="/dashboard" class="btn " wire:navigate>{{Auth::user()->name}}</a>
                    <a href="{{ url('logout') }}" class="btn btn-outline-primary" wire:navigate>Logout</a>
                @endif
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-brightness-low-fill theme-icon-active"
                            data-theme-icon-active="bi-brightness-low-fill"></i>
                    </button>
                    <ul class="dropdown-menu mode px-2">
                        <li class="nav-item ">
                            <button class="dropdown-item " data-bs-theme-value="light">
                                <i class="bi bi-brightness-low-fill opacity-50 "
                                    data-theme-icon="bi-brightness-low-fill"></i> Light
                            </button>

                        </li>
                        <li class="nav-item">
                            <button class="dropdown-item" data-bs-theme-value="dark">
                                <i class="bi bi-moon-stars-fill opacity-50" data-theme-icon="bi-moon-stars-fill"></i>
                                Dark
                            </button>
                        </li>
                    </ul>
                </div>

            </form>
        </div>
    </div>
</nav>
