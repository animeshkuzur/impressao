@extends('layout.master')

@section('style')
	<!--Custom Styles-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/order_detail.css') }}">
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
		<div class="order-detail">
			<div class="order-detail-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						Order Number :	<b>{{ $orders->id }}</b>
					</div>
					<div class="col-md-6" style="text-align:right;">
						Date : <b>{{$orders->date_time}}</b>
					</div>      
				</div>
				<div class="row">
					<div class="col-md-6">
						Document Uploaded : <a href="{{ url('upload/get') }}/{{ $orders->docid }}">{{$orders->original_docname}}</a>
						<br>
						@if($orders->completed)
											Status : <b>Approved</b>
										@else
											Status : <b>Processing</b>
										@endif
					</div>
					<div class="col-md-6">
						<div class="amount">
							Rs. {{$orders->amount}}
						</div>
						
						<div style="text-align: right;">
						Payment Mode : 
						@if($orders->payment_mode_id == 1)
							<b>COD</b>
						@else
							<b>Paytm</b>
						@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						Print Details :
						<div class="print-details">
						Color : {{ $orders->color }}
						<br>
						Page Size : {{ $orders->size }}
						<br>
						Page Type : {{ $orders->type }}
						<br>
						Print Side : {{ $orders->side }}
						<br>
						Pages : {{ $orders->pages }}
						<br>
						Copies : {{ $orders->copies }}
						<br>
						Comment : {{ $orders->comments }}
						</div>
					</div>
					<div class="col-md-6">
						Delivery Address :
						<div class="print-details">
						{{ $orders->name }}
						<br>
						{{ $orders->add1 }}
						<br>
						{{ $orders->add2 }}
						<br>
						{{ $orders->city }} - {{ $orders->pincode }}
						<br>
						Phone : {{ $orders->phone }}
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<a href="{{ url('/orders/print') }}/{{ $orders->id }}" class="btn btn-primary">Finished</a>

					</div>
					<div class="col-md-6" align="right">
						<a href="{{ url('/orders/delete') }}/{{ $orders->id }}" class="btn btn-danger">Delete</a>
					</div>
				</div>
			</div>
			</div>	
		</div>
	</div>
@endsection

@section('script')
	
@endsection