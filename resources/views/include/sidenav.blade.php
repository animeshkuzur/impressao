	<!--Side Navbar-->
	<div id="sidenavbar" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="{{ url('/') }}">Home</a>
	  <a href="{{ url('/#contact') }}">About</a>
	  <a href="{{ url('/#service') }}">Services</a>
	  <a href="{{ url('/#contact') }}">Contact</a>
	  @if(\Auth::check())
	  	<a href="{{ url('/orders') }}">Orders</a>
	  	<a href="{{ url('/settings') }}">Settings</a>
	  	<a href="{{ url('/logout') }}">Logout</a>	
	  @else
	  	<a href="{{ url('/auth') }}">Login</a>
	  @endif
	</div>