@extends('layout.master')

@section('style')
	<!--Custom Styles-->
	<!--<link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/style.css') }}">-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/login.css') }}">
@endsection

@section('content')


		<!--Nav-->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
      			<a class="navbar-brand" onclick="openNav()"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
    		</div>
	  	</div>
	</nav>


	<div class="login">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="login-panel">
						<div class="row">
							<div class="col-md-12">
								<div class="login-panel-title">
									Login
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
							@if($errors)
								@if(count($errors))
									@foreach($errors->all() as $error)
										<div class="alert alert-info alert-dismissible" role="alert">
											<font style="font-size: 12px; padding: 0px; margin : 0px;">
												{{ $error }}
												</font>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												
											</button>
										</div>
									@endforeach
								@endif
							@endif
								{!! Form::open(array('route' => 'emailauth','method'=>'POST')) !!}
									{!! Form::text('email', null, array('class' => 'form-control email','placeholder'=>'Email','id'=>'email')) !!}
									<br>
									{!! Form::password('password', array('class' => 'form-control password','placeholder'=>'Password','id'=>'password')) !!}
									<div class="checkbox">
									    <label><input type="checkbox"> Remember me</label>
									</div>
  									{!! Form::submit('&nbsp;&nbsp;Login&nbsp;&nbsp;', array('class' => 'btn btn-default','name'=>'login','id'=>'login')) !!}
  								{!! Form::close() !!}
  									<br>
  									<br>
  									<p>Who needs Email and Password when you can login with Facebook!</p>
  									<a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-primary">Login with Facebook</a>
  									<br><br>
  									<p>...or Sign Up anyway, it your wish!</p>
  									<a href="{{ url('/register') }}" class="btn btn-block btn-default">Sign Up</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="hidden-md col-md-12">
							<div class="div-title" align="center">
								<img src="{{ url('images/logo.png') }}" class="img-responsive">
								Sign in to start printing right now!
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="div-img" align="center">
								<img src="{{ url('/images/plane.jpg') }}" class="img-responsive">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		
	</script>
@endsection