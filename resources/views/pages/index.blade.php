@extends('layout.master')

@section('style')
	<!--Custom Styles-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/style.css') }}">
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
	<!--Header-->
	<div class="page-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="logo center-block">
						<img src="{{ URL::asset('images/logo.png')}}" class="img-responsive"/>
					</div>
					<div class="tagline">
						Online Document Printing Store!
					</div>
					<div class="subtext">
						First online document printing store dedicated to serve the students.
						Order by 11:59 pm...Expect delivery next morning.
					</div>
				</div>
				<div class="col-md-6">
					<div class="upload-section">
						<a href="{{ url('/print') }}">
							<img src="{{ URL::asset('images/header.png')}}" class="img-responsive"/>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Div seperator-->
	<div class="divider">
		<img src="{{ URL::asset('images/div.png')}}" class="img-responsive" />	
	</div>

	<!--Price Calculator-->
	<div class="price">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="rate-card">
						<div class="row">
							<div class="col-md-12">
								<div class="title">
									Rate Card
								</div>
							</div>
						</div>
						<form>
						<div class="row">
							<div class="col-md-12">
								<div class="page-color" align="center">
									<label class="radio-inline">
								     	<input type="radio" name="pgcolor" value="1" checked="checked">Black & White
								    </label>
								    &nbsp;&nbsp;&nbsp;
								    <label class="radio-inline">
								     	<input type="radio" name="pgcolor" value="2">Color
								    </label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="page-size" align="center">
									Page Size : 
								    <div class="btn-group" data-toggle="buttons">
								        <label class="btn btn-default active">
								            <input type="radio" name="pgsize" value="2" checked="checked"> &nbsp;&nbsp;A4&nbsp;&nbsp;
								        </label>
								        <label class="btn btn-default">
								            <input type="radio" name="pgsize" value="1"> &nbsp;&nbsp;A5&nbsp;&nbsp;
								        </label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="page-side" align="center">
									<label class="radio-inline">
								     	<input type="radio" name="pgside" checked="checked" value="1">Single Side
								    </label>
								    &nbsp;&nbsp;&nbsp;
								    <label class="radio-inline">
								     	<input type="radio" name="pgside" value="2">Both Sides
								    </label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="page-type" align="center">
									<div class="form-inline">
									Page Type : &nbsp;
										<select class="form-control" id="pgtype" style="width:auto;">
										  <option value="1">75 GSM Copier</option>
										  <option value="2">100 GSM Cedar</option>
										  <option value="3">90 GSM Bond</option>
										  <option value="4">75 GSM Sticker Paper</option>
										</select>
										<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#pgtypes"><span class="glyphicon glyphicon-question-sign"></span></button>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="page-count" align="center">
									<div class="form-inline">
									Number of Pages : &nbsp;<input type="number" class="form-control" style="width:170px;" name="pgnumber" value="0"></input>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</form>
				<div class="col-md-6">
					<div class="price-amount">
						Rs. 00.00	
					</div>
					<div class="price-amount-subtext">
						+ Delivery Charge *
						<br><br><br>
						<p>* Free delivery on first order</p>	
					</div>
					
					
				</div>
			</div>
		</div>
	</div>

	<!--Div seperator-->
	<div class="divider">
		<img src="{{ URL::asset('images/div2.png') }}" class="img-responsive" />	
	</div>

	<!--Features-->
	<div class="features" id="service">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="wrapper">
						<div class="feat-icon center-block">
							<img src="{{ URL::asset('images/door-01.png') }}" class="img-responsive" />
						</div>
						<div class="title">
							Door Step Delivery!
						</div>
						<div class="desc">
							Save your energy and time for some other productive work. Order online and get it delivered to your doorsteps.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="wrapper">
						<div class="feat-icon center-block">
							<img src="{{  URL::asset('images/coin-01.png') }}" class="img-responsive" />
						</div>
						<div class="title">
							Cheap Rates!
						</div>
						<div class="desc">
							No more arbitrary pricing. Save your hard earned money and pay standard rates.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="wrapper">
						<div class="feat-icon center-block">
							<img src="{{ URL::asset('images/order-01.png') }}" class="img-responsive" />
						</div>
						<div class="title">
							No Minimum Order!
						</div>
						<div class="desc">
							Just want to get one sheet printed and delivered? No issues, impressao always at your service.
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="wrapper">
						<div class="feat-icon center-block">
							<img src="{{ URL::asset('images/lock-01.png')}}" class="img-responsive" />
						</div>
						<div class="title">
							Secure
						</div>
						<div class="desc">
							Feel free to upload your information and files on our website. It is highly secure. For more information, read our privacy policy.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="wrapper">
						<div class="feat-icon center-block">
							<img src="{{ URL::asset('images/file-01.png')}}" class="img-responsive" />
						</div>
						<div class="title">
							Quality Print outs
						</div>
						<div class="desc">
							Never compromise with the quality. You are paying for the work, demand for the best. impressao gurantees quality print outs.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="wrapper">
						<div class="feat-icon center-block">
							<img src="{{URL::asset('images/bulk-01.png') }}" class="img-responsive" />
						</div>
						<div class="title">
							Bulk Order Service
						</div>
						<div class="desc">
							Get special discounts on bulk orders from schools, colleges or start-ups.
							Contact us
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Div Seperator-->
	<div class="divider">
		<img src="{{ URL::asset('images/city-01.png') }}" class="img-responsive" />	
	</div>

	<!--Contact Us-->
	<div class="contactus" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="about" id="about">
						<div class="title">
							About Us
						</div>
						<div class="content">
							A small group of nerds trying to make this process of document printing much simple, convenient and interesting especially for the students. Printing is going to be lot more fun. Give us a try!!
						</div>
						<div class="footer">
							<div class="row">
								<div class="col-md-4">
									<span class="glyphicon glyphicon-earphone"></span>
									<p>+91 7064267360</p>
								</div>
								<div class="col-md-4">
									<span class="glyphicon glyphicon-home"></span>
									<p>Bhubaneswar</p>
								</div>
								<div class="col-md-4">
									<span class="glyphicon glyphicon-envelope"></span>
									<p>info@impressao.in</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="contactform" id="contact">
						<div class="title">
							Contact Us
						</div>
						<div class="form-group">
							<input type="text" name="email" placeholder="Email" class="form-control input-sm" />
							<br>
							<textarea name="message" placeholder="Message" class="form-control input-sm" rows="4"></textarea>
							<br>
							<button class="btn btn-sm btn-default pull-right">Send</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--Footer-->
	<div class="footer">
		<div class="container-fluid">
			Copyright (c) 2017 impressao.in
		</div>
	</div>

	<!-- Modal -->
	<div id="pgtypes" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Page Type</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-md-3">
	        		<div class="row">
	        			<div class="col-md-12">
	        				<div class="pgtype-title">
	        					75 GSM Copier
	        				</div>	
	        				<div class="pgtype-img">
	        					<img src="{{ URL::asset('images/75gms.jpg') }}" class="img-responsive">
	        				</div>
	        				<div class="pgtype-desc">
	        					Long lasting whiteness, crisp & brighter colour impression. Quality photocopy, project reports & resume.
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-md-3">
	        		<div class="row">
	        			<div class="col-md-12">
	        				<div class="pgtype-title">
	        					100 GSM Cedar
	        				</div>	
	        				<div class="pgtype-img">
	        					<img src="{{ URL::asset('images/100gsmcedar.jpg') }}" class="img-responsive">
	        				</div>
	        				<div class="pgtype-desc">
	        					Fully coated super smooth paper, sharper images, intensive colour, clear crisp text. Brochures, annual reports, menus, flyers, direct mail, postcard. Preferred for colour printing.
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-md-3">
	        		<div class="row">
	        			<div class="col-md-12">
	        				<div class="pgtype-title">
	        					90 GSM BOND
	        				</div>	
	        				<div class="pgtype-img">
	        					<img src="{{ URL::asset('images/90gsmbond.jpg') }}" class="img-responsive">
	        				</div>
	        				<div class="pgtype-desc">
	        					Bright and white water-marked paper, long lasting aesthetically appealing paper. Projects, presentations, resumes, letterheads.
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-md-3">
	        		<div class="row">
	        			<div class="col-md-12">
	        				<div class="pgtype-title">
	        					75 GSM Sticker Paper
	        				</div>	
	        				<div class="pgtype-img">
	        					<img src="{{ URL::asset('images/75gms.jpg') }}" class="img-responsive">
	        				</div>
	        				<div class="pgtype-desc">
	        					Long lasting whiteness, crisp & brighter colour impression along with adhesive property. Quality photocopy, project reports & resume.
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	        <br><br>
	        <div class="row">
	        	<div class="col-md-12">
	        		<div class="pgtype-footer">
	        			* GSM : Gram per Square Meter (in other words the thickness of the paper)
	        		</div>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		var rates = [@foreach ($rates as $rate) [{{ $rate->page_size_id }},{{$rate->page_type_id}},{{$rate->print_type_id}},{{$rate->print_side_id}},{{$rate->price}}],@endforeach ]; 

		$("form :input").on('keyup change',function() {
  			var pgcolor = $('input[name=pgcolor]:checked').val();
  			var pgside = $('input[name=pgside]:checked').val();
  			var pgsize = $('input[name=pgsize]:checked').val();
  			var pgtype = $('#pgtype').find(":selected").val();
  			var pgnumber = $('input[name=pgnumber]').val();

  			$.each(rates,function(i,rate){
  				if(rate[0] == pgsize && rate[1] == pgtype && rate[2] == pgcolor && rate[3] == pgside){
  					var cost = rate[4]*pgnumber;
  					$("div.price-amount").text("Rs. "+cost.toFixed(2));
  				}
  			});
  			
		});	
	</script>
@endsection