<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ UserHelp::getSetting('title') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('template/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('template/css/agency.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/my.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ route('site.home') }}">FahriART</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a data-toggle="tooltip" target="_blank" title="Facebook" href="{{ UserHelp::getSetting('facebook') }}">
                  <img style="width: 100%;display: block;margin-left: auto;margin-right: auto;" src="{{ asset('image/fb.png') }}">
                </a>
              </li>
              <li class="list-inline-item">
                <a data-toggle="tooltip" target="_blank" title="Whatsapp" href="https://web.whatsapp.com/send?phone=62{{ UserHelp::getSetting('whatsapp') }}&text=">
                  <img style="width: 100%;display: block;margin-left: auto;margin-right: auto;" src="{{ asset('image/wa.png') }}">
                </a>
              </li>
              <li class="list-inline-item">
                <a data-toggle="tooltip" target="_blank" title="Instagram" href="{{ UserHelp::getSetting('instagram') }}">
                  <img style="width: 100%;display: block;margin-left: auto;margin-right: auto;" src="{{ asset('image/in.png') }}">
                </a>
              </li>
              <li class="list-inline-item">
                <a data-toggle="tooltip" target="_blank" title="Email" href="#">
                  <img style="width: 100%;display: block;margin-left: auto;margin-right: auto;" src="{{ asset('image/email.png') }}">
                </a>
              </li>
              <li class="list-inline-item">
                <a data-toggle="tooltip" title="Telphone" href="#">
                  <img style="width: 100%;display: block;margin-left: auto;margin-right: auto;" src="{{ asset('image/telp.png') }}">
                </a>
              </li>
            </ul>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto link">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link js-scroll-trigger" data-toggle="dropdown">Kategori <i class="fa fa-angle-down"></i></a>
              <ul class="dropdown-menu my">
              @foreach ( $all_kategori as $kat)
                <li><a href="{{ route('site.kategori', $kat->slug) }}">{{ $kat->name }}</a></li>
              @endforeach
              </ul>
            </li>
            @if (auth()->check())
              <li class="nav-item dropdown">
                <a class="nav-link js-scroll-trigger" href="#" data-toggle="dropdown">{{ auth()->user()->getName()}} <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu my">
                <li><a <a target="_blank" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li><a href="{{ route('auth.logout') }}">Logout</a></li> 
              </ul>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

@yield('content')

  <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Powered by <a href="https://www.instagram.com/gi_pamungkaz/"> GPe</a></span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a data-toggle="tooltip" target="_blank" title="Facebook" href="{{ UserHelp::getSetting('facebook') }}">
                  <img style="width: 100%;display: block;margin-left: auto;margin-right: auto;" src="{{ asset('image/fb.png') }}">
                </a>
              </li>
              <li class="list-inline-item">
                <a data-toggle="tooltip" target="_blank" title="Whatsapp" href="https://web.whatsapp.com/send?phone=62{{ UserHelp::getSetting('whatsapp') }}&text=">
                  <img style="width: 100%;display: block;margin-left: auto;margin-right: auto;" src="{{ asset('image/wa.png') }}">
                </a>
              </li>
              <li class="list-inline-item">
                <a data-toggle="tooltip" target="_blank" title="Instagram" href="{{ UserHelp::getSetting('instagram') }}">
                  <img style="width: 100%;display: block;margin-left: auto;margin-right: auto;" src="{{ asset('image/in.png') }}">
                </a>
              </li>
              <li class="list-inline-item">
                <a data-toggle="tooltip" title="Email" href="#">
                  <img style="width: 100%;display: block;margin-left: auto;margin-right: auto;" src="{{ asset('image/email.png') }}">
                </a>
              </li>
              <li class="list-inline-item">
                <a data-toggle="tooltip" title="Telphone" href="#">
                  <img style="width: 100%;display: block;margin-left: auto;margin-right: auto;" src="{{ asset('image/telp.png') }}">
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
          <p>{{ UserHelp::getSetting('alamat') }}</p>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Contact form JavaScript -->
    <script src="{{ asset('template/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('template/js/contact_me.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('template/js/agency.min.js') }}"></script>
    @yield('footer')
  </body>

</html>
