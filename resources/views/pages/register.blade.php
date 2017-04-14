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
									Register
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
								{!! Form::open(array('route' => 'emailregister','method'=>'POST')) !!}
									{!! Form::text('name', null, array('class' => 'form-control email','placeholder'=>'Name','id'=>'name')) !!}
									<br>
									{!! Form::text('email', null, array('class' => 'form-control email','placeholder'=>'Email','id'=>'email')) !!}
									<br>
									{!! Form::password('password', array('class' => 'form-control password','placeholder'=>'Password','id'=>'password')) !!}
									<br>
									{!! Form::password('password2', array('class' => 'form-control password','placeholder'=>'Confirm Password','id'=>'password2')) !!}
									<br>
  									{!! Form::submit('&nbsp;&nbsp;Register&nbsp;&nbsp;', array('class' => 'btn btn-default','name'=>'register','id'=>'register')) !!}
  								{!! Form::close() !!}
  									<br>
  									<br>
  									<p>Who needs Email and Password when you can Sign Up with Facebook!</p>
  									<a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-primary">Sign Up with Facebook</a>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="hidden-md col-md-12">
							<div class="div-title" align="center">
								<img src="{{ url('images/logo.png') }}" class="img-responsive" style="padding-bottom: 10px;">

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="div-img" align="center">
								<img src="{{ url('/images/make-plane.png') }}" class="img-responsive" style="height:420px;">
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