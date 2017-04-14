@extends('layout.master')

@section('style')
	<!--Custom Styles-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/print.css') }}">
@endsection

@section('content')


	<!--Nav-->
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
      		<a class="navbar-brand" onclick="openNav()"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
    	</div>
    	<div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-right">
	      @if(\Auth::check())
	        <li class="dropdown">
	        	<a href="{{ url('/') }}" id="username" class="dropdown-toggle" data-toggle="dropdown">Hi, {{ explode(' ',trim(\Auth::user()->name))[0] }}!</a>
	        	<ul class="dropdown-menu">
                    <li><a href="{{ url('/settings') }}" style="font-weight: 100;font-size: 130%">Settings</a></li>
                    <li><a href="{{ url('/orders') }}" style="font-weight: 100;font-size: 130%">Orders</a></li>
                    <li><a href="{{ url('/logout') }}" style="font-weight: 100;font-size: 130%">Logout</a></li>
                </ul>            
            </li>
	       	@else
	       	<li>
	        	<a href="{{ url('auth') }}" id="username">Login</a>
	        </li>
	       	@endif
	      </ul>
    </div>
	  </div>
	</nav>

	<div class="print">
		<div class="header">
			<div class="title">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
						Settings
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="upload">
				
		</div>
	</div>
@endsection

@section('script')
	
@endsection