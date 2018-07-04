<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="{{url('assets/img/favicon.png')}}">

	<title>Raffle Website - Login</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&amp;subset=latin-ext" rel="stylesheet">

	<!-- CSS - REQUIRED - START -->
	<!-- Batch Icons -->
	<link rel="stylesheet" href="{{url('assets/fonts/batch-icons/css/batch-icons.css')}}">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{url('assets/css/bootstrap/bootstrap.min.css')}}">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="{{url('assets/css/bootstrap/mdb.min.css')}}">
	<!-- Custom Scrollbar -->
	<link rel="stylesheet" href="{{url('assets/plugins/custom-scrollbar/jquery.mCustomScrollbar.min.css')}}">
	<!-- Hamburger Menu -->
	<link rel="stylesheet" href="{{url('assets/css/hamburgers/hamburgers.css')}}">

	<!-- CSS - REQUIRED - END -->

	<!-- CSS - OPTIONAL - START -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{url('assets/fonts/font-awesome/css/font-awesome.min.css')}}">

	<!-- CSS - DEMO - START -->
	<link rel="stylesheet" href="{{url('assets/demo/css/ui-icons-batch-icons.css')}}">
	<!-- CSS - DEMO - END -->

	<!-- CSS - OPTIONAL - END -->

	<!-- QuillPro Styles -->
	<link rel="stylesheet" href="{{url('assets/css/quillpro/quillpro.css')}}">
</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div class="right-column sisu">
				<div class="row mx-0">
					<div class="col-md-7 order-md-2 signin-right-column px-5 bg-dark">
						<a class="signin-logo d-sm-block d-md-none" href="#">
							<img src="{{url('assets/img/logo-white.png')}}" width="145" height="32.3" alt="QuillPro">
						</a>
						<h1 class="display-4">Sign In To get Started</h1>
						<p class="lead mb-5">
							Big data latte SpaceTeam unicorn cortado hacker physical computing paradigm.
						</p>
					</div>
					<div class="col-md-5 order-md-1 signin-left-column bg-white px-5">
						<a class="signin-logo d-sm-none d-md-block" href="#">
							<img src="{{url('assets/img/logo-dark.png')}}" width="145" height="32.3" alt="QuillPro">
						</a>
						@if(Session::has('message'))
			                <div id="successMessage" style ="color:red;text-align: center;" class="alert alert-success"> {{Session::get('message')}} </div>
			                 @endif
			                 <form action="" method="post">
								{{ csrf_field() }}
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control ggg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{old('email')}}">
								@if ($errors->has('email'))
				                    <div class="error">{{ $errors->first('email') }}</div>
				                @endif
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control ggg" id="exampleInputPassword1" placeholder="Password" name="password" value="{{old('password')}}">
							</div>
							<div class="custom-control custom-checkbox mb-3">
								<input type="checkbox" class="custom-control-input" id="keep-signed-in">
								<label class="custom-control-label" for="keep-signed-in">Keep Me Signed In</label>
							</div>
							<button type="submit" class="btn btn-primary btn-gradient btn-block">
								<i class="batch-icon batch-icon-key"></i>
								Sign In
							</button>
							<hr />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- SCRIPTS - REQUIRED START -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- Bootstrap core JavaScript -->
	<!-- JQuery -->
	<script type="text/javascript" src="{{url('assets/js/jquery/jquery-3.1.1.min.js')}}"></script>
	<!-- Popper.js - Bootstrap tooltips -->
	<script type="text/javascript" src="{{url('assets/js/bootstrap/popper.min.js')}}"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="{{url('assets/js/bootstrap/bootstrap.min.js')}}"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="{{url('assets/js/bootstrap/mdb.min.js')}}"></script>
	<!-- Velocity -->
	<script type="text/javascript" src="{{url('assets/plugins/velocity/velocity.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/plugins/velocity/velocity.ui.min.js')}}"></script>
	<!-- Custom Scrollbar -->
	<script type="text/javascript" src="{{url('assets/plugins/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<!-- jQuery Visible -->
	<script type="text/javascript" src="{{url('assets/plugins/jquery_visible/jquery.visible.min.js')}}"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script type="text/javascript" src="{{url('assets/js/misc/ie10-viewport-bug-workaround.js')}}"></script>

	<!-- SCRIPTS - REQUIRED END -->

	<!-- SCRIPTS - OPTIONAL START -->
	<!-- Image Placeholder -->
	<script type="text/javascript" src="{{url('assets/js/misc/holder.min.js')}}"></script>
	<!-- SCRIPTS - OPTIONAL END -->

	<!-- QuillPro Scripts -->
	<script type="text/javascript" src="{{url('assets/js/scripts.js')}}"></script>
</body>
</html>
