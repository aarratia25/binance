<nav id="sidebar" aria-label="Main Navigation">
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <a class="fw-semibold text-white tracking-wide" href="{{ route('home') }}">
                <span class="smini-visible">
                    {{ config('app.name') }}
                </span>
                <span class="smini-hidden">
                    {{ config('app.name') }}
                </span>
            </a>
        </div>
    </div>
    <div class="js-sidebar-scroll">
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link" href="/">
                        <i class="nav-main-link-icon fa fa-home"></i>
                        <span class="nav-main-link-name">Inicio</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('transactions') }}">
                        <i class="nav-main-link-icon fa fa-building"></i>
                        <span class="nav-main-link-name">Transacciones</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
