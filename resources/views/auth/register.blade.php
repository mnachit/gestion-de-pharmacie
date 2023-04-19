<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('auth/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('auth/images/bg.jpg')}});">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Sign Up</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group d-flex flex-row">
                                    <input type="text" id="first" name="first" class="form-control" placeholder="First" required>
                                    <input type="text" id="last" name="last" class="form-control" placeholder="Last" required>
                                </div>
		      		            <div class="form-group">
		      			            <input class="form-control" type="tel" id="phone" name="phone" placeholder="Mobile Number" required>
		      		            </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    {{-- @if (session()->get('Text')) --}}
                                    {{-- @php
                                        dd(session()->get('test'));
                                    @endphp --}}
                                    {{-- <h6>erour in email</h6> --}}
                                    {{-- @endif --}}
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <input id="password1" type="password" class="form-control" placeholder="C_Password" required>
                                    <span toggle="#password1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
									    </label>
								    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#" style="color: #fff">Forgot Password</a>
                                    </div>
	                            </div>
	                        </form>
                            <p class="w-100 text-center">&mdash;<a href="{{route('login')}}" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span>Go Page Login</a>&mdash;</p>
                            <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                            <div class="social d-flex text-center">
                                <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                                <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
                            </div>
		            </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('auth/js/jquery.min.js')}}"></script>
  <script src="{{ asset('auth/js/popper.js')}}"></script>
  <script src="{{ asset('auth/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('auth/js/main.js')}}"></script>

	</body>
</html>

