
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>{{ config('app.name') }}</title>

    <meta name="description" content="Dashmix created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="/assets/css/dashmix.min.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
  </head>
  <body>
    <div id="page-container"
        @if (Route::current()->getName() == 'login' || Route::current()->getName() == 'register')
            class=""
        @else
            class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow"
        @endif>

        @if (Auth::check())
        <header id="page-header">
        <div class="content-header">
        <div class="space-x-1"></div>
            <div class="space-x-1">
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block">
                        {{ Auth::user()->name }}
                    </span>
                    <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
                </button>
                    <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="p-2">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Cerrar sesión
                            </a>
                            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </header>
            @include('includes.menu')
        @endif

        <main id="main-container">
            @yield('content')
        </main>

        @if (Auth::check())
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-0">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-1 text-center text-sm-start">
                        <a class="fw-semibold" href="#">{{ config('app.name') }}</a> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        @endif
    </div>

    <script src="/assets/js/dashmix.app.min.js"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="/assets/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
  </body>
</html>
