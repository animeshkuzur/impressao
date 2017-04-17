@extends('layout.master')

@section('style')
	<!--Custom Styles-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/order.css') }}">
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
                    <li><a href="{{ url('/print') }}" style="font-weight: 100;font-size: 130%">Print</a></li>
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

	<div class="orders">
		<div class="header">
			<div class="title">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							Orders
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="order-list">
			<div class="container">
			@if($orders)
				@foreach($orders as $order)					
					<a href="{{ url('/orders/details/'.$order->id) }}" target="_blank" style="text-decoration: none;">
					<div class="row">
						<div class="col-md-12">
						<div class="container">
							<div class="order-list-item">
								
								<div class="row">
									<div class="col-sm-4">
										Date : <b>{{$order->date_time}}</b><br>
										Order No: <b>{{$order->id}}</b>
									</div>
									<div class="col-sm-4">
										Document : {{$order->original_docname}}<br>
										@if($order->completed)
											Status : <b>Approved</b>
										@else
											Status : <b>Processing</b>
										@endif
									</div>
									<div class="col-sm-4">
										<div class="amt">Rs. {{$order->amount}}</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" style="text-align: center;">
										Click to view details
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
					
					</a>
				@endforeach
			@else
				<div class="row">
						<div class="col-md-12">
						<div class="container">
							<div class="order-list-item">
								
								<div class="row">
									<div class="col-sm-12">
										NO ORDERS YET
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>

			@endif
			</div>	
		</div>
	</div>
@endsection

@section('script')
	
@endsection