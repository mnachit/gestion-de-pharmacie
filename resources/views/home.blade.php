<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pharma &mdash; NACHIT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css "></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('Page_User/fonts/icomoon/style.css')}}">
  <link rel="stylesheet" href="{{ asset('Page_User/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('Page_User/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{ asset('Page_User/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{ asset('Page_User/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('Page_User/css/owl.theme.default.min.css')}}">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 

  <link rel="stylesheet" href="{{ asset('Page_User/css/aos.css')}}">

  <link rel="stylesheet" href="{{ asset('Page_User/css/style.css')}}">

</head>

<body>

  <div class="site-wrap">


    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="{{url('/index')}}" class="js-logo-clone">Pharma &mdash; NACHIT</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active"><a href="/index">Home</a></li>
                <li><a href="{{url('/Shop')}}">Store</a></li>
                <li><a href="">About</a></li>
                <li><a href="/Contact">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="/Carte" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              @if (Route::has('login'))
                @auth
                  <span class="number">{{session()->get('number')}}</span>
          </div>
          <div class="nav-item dropdown float-right mb-4">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="img/username/{{Auth::user()->image }}" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">{{Auth::user()->First }} {{Auth::user()->Last }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="/Profile" class="dropdown-item">My Profile</a>
                @auth
                @if(auth()->user()->Role == 'ADMIN')
                <a href="{{route('dashbord')}}" class="dropdown-item">Dasbord</a>
                @endif
                @endauth
                <a href="#" class="dropdown-item">Settings</a>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
          </div>
                @else
                  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                @endauth
              @endif
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>

        </div>
      </div>
    </div>
    
    @yield('content1')
    
  
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>Welcome to our parapharmacie, where we provide high-quality health and wellness products to help you feel your best.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4"></h3>
            <ul class="list-unstyled">
              <li><a href="#"></a></li>
              <li><a href="#"></a></li>
              <li><a href="#"></a></li>
              <li><a href="#"></a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">École YOUCODE, Youssoufia</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">nachitmed71@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="{{ asset('Page_User/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('Page_User/js/jquery-ui.js')}}"></script>
  <script src="{{ asset('Page_User/js/popper.min.js')}}"></script>
  <script src="{{ asset('Page_User/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('Page_User/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('Page_User/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('Page_User/js/aos.js')}}"></script>

  <script src="js/main.js"></script>

</body>

</html>