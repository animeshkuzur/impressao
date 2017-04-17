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
		<div class="setting-content">
			Name : {{ \Auth::user()->name }}
			<BR><br>
			Email : {{ \Auth::user()->email }}

		</div>
		<hr>
		<div id="delivery-address">
		<div style="font-weight: 300;font-size:150%;padding: 0px 40px;">Address :</div>
        <ul class="row" style="list-style: none;" id="ul-addr">
          @if($user_address)
          @foreach($user_address as $adds)
          <li class="col-md-3">
            <div class="address-content">
              <div class="address">
                <div class="radio">
                  <label><input type="radio" name="address" value="{{ $adds->id }}">&nbsp;&nbsp;<b>{{ $adds->name }}</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="delete_addr" style="color:red;cursor:pointer;" at="{{ $adds->id }}"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
                <p>{{ $adds->add1 }}</p>
                <p>{{ $adds->add2 }}</p>
                <p>{{ $adds->city." - ".$adds->pincode }}</p>
                <p>Mobile : {{ $adds->phone }}</p>
              </div>
            </div>
          </li>
          @endforeach
          @endif
          
          <li class="col-md-3">
            <a href="" id="add-address" data-toggle="modal" data-target="#addadd">
            <div class="address-content">
              <div class="address">
                <span class="glyphicon glyphicon-plus"></span>
                <p>Add a new address</p>
              </div>
            </div>
            </a>
          </li>
        </ul>
        </div>
	</div>
@endsection

@section('script')
	
@endsection