<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/web/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/web/assets/img/favicon.png">
  <title>
    {{ config('app.name') }}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="/web/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/web/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="/web/assets/css/font-awesome.css" rel="stylesheet" />
  <link href="/web/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="/web/assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
</head>

<body class="landing-page">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light py-2">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="/">
        <img src="/web/assets/img/logo.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="/">
                <img src="/web/assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" title="Facebook">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" title="Instagram">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" title="Twitter">
              <i class="fa fa-twitter-square"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="section section-hero section-shaped">
      <div class="shape shape-style-3 shape-default">
        <span class="span-150"></span>
        <span class="span-50"></span>
        <span class="span-50"></span>
        <span class="span-75"></span>
        <span class="span-100"></span>
        <span class="span-75"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
      </div>
      <div class="page-header">
        <div class="container shape-container d-flex align-items-center py-lg">
          <div class="col px-0">
            <div class="row align-items-center justify-content-center">
              @auth
              <div class="col-lg-10 text-center">
                    <h1 class="text-white display-1">
                        Click Disponibles ({{ (5 - $events->count()) }})
                    </h1>
                    @if ($events->count() > 0)
                    <h2 class="display-4 font-weight-normal text-white">
                        Proximo click {{ Carbon\Carbon::parse($events->first()->click)->diffForHumans()  }}
                    </h2>
                    <div class="btn-wrapper mt-4">
                        <img src="/web/assets/img/datlas_bitcoin_header2.gif" class="img-fluid">
                    </div>
                    @endif
                    @if (Carbon\Carbon::now()->gte($events->first()->click))
                        <div class="mt-4">
                            <a href="{{ route('click') }}" class="btn btn-default">
                                Click Aqui
                            </a>
                        </div>
                    @endif
                </div>
              @else
              <div class="col-lg-10 text-center">
                    <h1 class="text-white display-1">
                        {{ config('app.name') }}
                    </h1>
                    <a href="{{ route('login') }}">
                        <h2 class="display-4 font-weight-normal text-white">
                            Login
                        </h2>
                    </a>
                </div>
              @endauth
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>

    <div class="section features-1">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <h3 class="display-3">Full-Funnel Social Analytics</h3>
            <p class="lead">The time is now for it to be okay to be great.</p>
          </div>
        </div>
        <div class="row">
          @foreach ($plans as $item)
          <div class="col-md-4">
            <div class="info text-center">
              <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                <i class="ni ni-atom"></i>
              </div>
              <a href="{{ route('plan', $item->id) }}">
                <h6 class="info-title text-uppercase text-success">
                    {{ $item->name }}
                </h6>
              </a>
              <p class="description opacity-8">
                Precio desde {{ $item->price }} Hasta {{ $item->price_max }}
              </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <br /><br />
    <footer class="footer">
      <div class="container">
        <div class="row align-items-center justify-content-md-between">
          <div class="col-md-6">
            <div class="copyright">
              &copy; {{ date('Y') }} MinerGate Lite.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="/web/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="/web/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="/web/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="/web/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="/web/assets/js/plugins/bootstrap-switch.js"></script>
  <script src="/web/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="/web/assets/js/plugins/moment.min.js"></script>
  <script src="/web/assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
  <script src="/web/assets/js/plugins/bootstrap-datepicker.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="/web/assets/js/argon-design-system.min.js?v=1.2.2" type="text/javascript"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-design-system-pro"
      });
  </script>
</body>

</html>
