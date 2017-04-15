@extends('layout.master')

@section('style')
	<!--Custom Styles-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/print.css') }}">
@endsection

@section('content')

  <meta name="_token" content="{{ csrf_token() }}"/>



  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />



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
						<div class="col-xs-8">
						Print
						</div>
            <div class="col-xs-4">
              <div class="next-btn-block">
              
              </div>
            </div>
					</div>
				</div>
			</div>
		</div>
    <div class="content">
      <div class="dropbox" >
        <div class="pulse">
        <div class="sonar-wrapper">
          <div class="sonar-emitter">
            <div id="upload-text">
            <span class="glyphicon glyphicon-send"></span>
            </div>
            <div class="sonar-wave"></div>
          </div>
          <div class="droppable">
            Click or Drop your file here.
          </div>
        </div>
      </div>
      </div>


      <div class="print-details" hidden>
        <div class="row">
          <div class="document-tag">
            <div class="col-md-6">
                <div class="document-tag-name">
                  no document uploaded!  
                </div>      
            </div>
            <div class="col-md-6">
                <div class="document-tag-price">
                  
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
              <br>
              <form>
                  <div class="page-color" align="center">
                    <label class="radio-inline">
                        <input type="radio" name="pgcolor" value="1" checked="checked">Black & White
                      </label>
                      &nbsp;&nbsp;&nbsp;
                      <label class="radio-inline">
                        <input type="radio" name="pgcolor" value="2">Color
                      </label>
                  </div>
                
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
                
                  <div class="page-side" align="center">
                    <label class="radio-inline">
                        <input type="radio" name="pgside" checked="checked" value="1">Single Side
                      </label>
                      &nbsp;&nbsp;&nbsp;
                      <label class="radio-inline">
                        <input type="radio" name="pgside" value="2">Both Sides
                      </label>
                  </div>
                
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
                
                  <div class="page-count" align="center">
                    <div class="form-inline">
                    Number of Pages : &nbsp;<input type="number" class="form-control" style="width:170px;" name="pgnumber" value="0" min="0"></input>
                    </div>
                  </div>

                  <div class="copy-count" align="center">
                    <div class="form-inline">
                    Number of Copies : &nbsp;<input type="number" class="form-control" style="width:170px;" name="cpnumber" value="1" min="1"></input>
                    </div>
                  </div>

                  <div class="print-comment" align="center">
                     <div class="form-inline">
                      Comment:
                      <textarea class="form-control" rows="2" id="comment" name="comment" placeholder="Special Instructions"></textarea>
                    </div>
                  </div>
                  </form>
          </div>
          <div class="col-md-6">
            <div class="price-amount">
            Rs. 00.00 
          </div>
          <div class="price-amount-subtext">
            + RS. 10 (Delivery Charge) *
            <br><br><br>
            <p>* Free delivery on first order</p> 
          </div>
          </div>
        </div>
      </div>

      <div class="checkout" hidden>
        <div class="row">
          <div class="document-tag">
            <div class="col-md-6">
                <div class="document-tag-name">
                  no document uploaded!  
                </div>      
            </div>
            <div class="col-md-6">
                <div class="document-tag-price">
                  
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="address-title">
              Delivery address:
            </div>
          </div>
        </div> 
        <div id="delivery-address">
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
        <hr style="margin: 0px 50px 0px 50px">
        <div class="row">
          <div class="col-md-6">
            <div class="address-title">
              Payment:
            </div>
            <div class="address-content">
              <div class="paymode-wrapper">
                <label class="radio-inline"><input type="radio" name="paymode" value="1" checked="checked">COD</label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" name="paymode" value="2">
                  <div id="paytm-amt">Paytm</div> 
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="address-title">
              Discount Coupon:
            </div>
            <div class="address-content">
              <div class="paymode-wrapper">
                <input type="text" name="discount" placeholder="Coupon Code" id="discode">
                <button type="button" class="btn btn-default btn-sm" id="getdiscount">Apply</button>
                <div id="coupon-stat">
                  
                </div>
                <br><br>
              </div>
            </div>
          </div>
        </div>
      </div>

      

    </div>
    <input type="text" name="document_id" id="document_id" hidden>
      <input type="text" name="document_name" id="document_name" hidden>
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

  <!--Add Address Modal-->
  <div id="addadd" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Address</h4>
      </div>
      <div class="modal-body">
        <div class="new-address">
          
          <div class="form-group">
          <input type="text" name="address-name" id="address-name" placeholder="Name (Home, Work, etc.)" class="form-control">
          </div>
          <div class="form-group">
          <input type="text" name="address-line1" id="address-line1" placeholder="Address Line 1" class="form-control">
          </div>
          <div class="form-group">
          <input type="text" name="address-line2" id="address-line2" placeholder="Address Line 2" class="form-control">
          </div>
          <div class="form-group">
          <input type="text" name="address-city" id="address-city" placeholder="City" class="form-control">
          </div>
          <div class="form-group">
          <input type="text" name="address-pincode" id="address-pincode" placeholder="Pincode" class="form-control">
          </div>
          <div class="form-group">
          <input type="text" name="address-mobile" id="address-mobile" placeholder="Mobile" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <div class="error" id="error" align="left">
          </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="add-addr" class="btn btn-primary">Add</button>
      </div>
    </div>

  </div>
  </div>

@endsection

@section('script')
	<script type="text/javascript">
		function makeDroppable(element, callback) {

  var input = document.createElement('input');
  input.setAttribute('type', 'file');
  input.setAttribute('multiple', true);
  input.style.display = 'none';

  input.addEventListener('change', triggerCallback);
  element.appendChild(input);
  
  element.addEventListener('dragover', function(e) {
    e.preventDefault();
    e.stopPropagation();
    element.classList.add('dragover');
  });

  element.addEventListener('dragleave', function(e) {
    e.preventDefault();
    e.stopPropagation();
    element.classList.remove('dragover');
  });

  element.addEventListener('drop', function(e) {
    e.preventDefault();
    e.stopPropagation();
    element.classList.remove('dragover');
    triggerCallback(e);
  });
  
  element.addEventListener('click', function() {
    input.value = null;
    input.click();
  });

  function triggerCallback(e) {
    var files;
    $('.droppable').text($('input[type=file]').val().replace(/.*(\/|\\)/, ''));
    if(e.dataTransfer) {
      files = e.dataTransfer.files;
    } else if(e.target) {
      files = e.target.files;
    }
    callback.call(null, files);
  }
}

var element = document.querySelector('.dropbox');
function callback(files) {
  var formData = new FormData();
  formData.append("files", files[0]);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  $.ajax({
    url: "{{ url('/upload/add')}}",
    method: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    xhr: function() {
        var xhr = $.ajaxSettings.xhr();
        xhr.upload.onprogress = function(e) {
            $("#upload-text").text(Math.floor(e.loaded / e.total *100) + '%');
        };
        return xhr;
    }, 
    success: function(response) {
      $(".next-btn-block").html("<a class='next-print-details'><img src=\"{{ URL::asset('/images/next.png') }}\" class='img-responsive' align='right'></a>");
      $("#document_id").val(response.document_id);
      $("#document_name").val(response.document_name);
      $(".document-tag-name").html("<span class='glyphicon glyphicon-file'></span>&nbsp;&nbsp;"+response.document_name);
      //console.log($("#document_name").val());
    },
    error: function (xhr, ajaxOptions, thrownError) {
           console.log(xhr.status);
           console.log(xhr.responseText);
           console.log(thrownError);
       }
  });
}
$(".sonar-wave").on("webkitAnimationIteration oanimationiteration animationiteration", function(){
  $(this).css("background-color", '#ED1C24');
})
makeDroppable(element, callback);

$(".next-btn-block").on('click','a.next-print-details',function(){
  $('.dropbox').fadeOut('slow');
  $('.print-details').fadeIn('slow');
  $('.next-btn-block').html("");
});

$(".next-btn-block").on('click','a.next-checkout',function(){
  $('.print-details').fadeOut('slow');
  $('.checkout').fadeIn('slow');
  $('.next-btn-block').html("");
});


var rates = [@foreach ($rates as $rate) [{{ $rate->page_size_id }},{{$rate->page_type_id}},{{$rate->print_type_id}},{{$rate->print_side_id}},{{$rate->price}}],@endforeach ]; 

    $("form :input").on('keyup change',function() {
        var pgcolor = $('input[name=pgcolor]:checked').val();
        var pgside = $('input[name=pgside]:checked').val();
        var pgsize = $('input[name=pgsize]:checked').val();
        var pgtype = $('#pgtype').find(":selected").val();
        var pgnumber = $('input[name=pgnumber]').val();
        var cpnumber = $('input[name=cpnumber]').val();

        $.each(rates,function(i,rate){
          if(rate[0] == pgsize && rate[1] == pgtype && rate[2] == pgcolor && rate[3] == pgside){
            var cost = cpnumber*(rate[4]*pgnumber);
            $("div.price-amount").text("Rs. "+cost.toFixed(2));
            if(cost>0){
              $(".next-btn-block").html("<a class='next-checkout'><img src=\"{{ URL::asset('/images/next.png') }}\" class='img-responsive' align='right'></a>");
              $(".document-tag-price").html("Rs. <b>"+(cost+10).toFixed(2)+"</b>");
              $("#paytm-amt").text("Paytm Rs. "+(cost+10).toFixed(2)+" to 7064267360");
            }
            else{
              $(".next-btn-block").html("");
              $(".document-tag-price").html("");
            }
          }
        });
        
    });

    $("#add-addr").click(function(){
      var name = $("#address-name").val();
      var add1 = $("#address-line1").val();
      var add2 = $("#address-line2").val();
      var city = $("#address-city").val();
      var pin = $("#address-pincode").val();
      var mob = $("#address-mobile").val();
      if(!name.trim() || !add1.trim() || !add2.trim() || !city.trim() || !pin.trim() || !mob.trim()){
        $("#error").text("Some field(s) missing!");
      }
      else{
        $("#addadd").modal('toggle');
        var data = {"name":name,"add1":add1,"add2":add2,"city":city,"pin":pin,"mob":mob}
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{ url('/address/add')}}",
          method: 'POST',
          data: data,
          dataType: 'json',
          success: function(response) {
            $("#delivery-address").html('');
            $("#delivery-address").append('<ul class="row" style="list-style: none;" id="ul-addr">');
            if(response.addr){
              $.each(response.addr,function(index, value){
                $("#ul-addr").append('<li class="col-md-3"><div class="address-content"><div class="address"><div class="radio"><label><input type="radio" name="address" value="'+value.id+'">&nbsp;&nbsp;<b>'+value.name+'</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="delete_addr" style="color:red;cursor:pointer;" at="'+value.id+'"><span class="glyphicon glyphicon-trash"></span></a></div><p>'+value.add1+'</p><p>'+value.add2+'</p><p>'+value.city+' - '+value.pincode+'</p><p>Mobile : '+value.phone+'</p></div></div></li>');                
              });
            }
            else{
              $("#delivery-address").html('Server Failed!')
            }
            $("#ul-addr").append('<li class="col-md-3"><a href="" id="add-address" data-toggle="modal" data-target="#addadd"><div class="address-content"><div class="address"><span class="glyphicon glyphicon-plus"></span><p>Add a new address</p></div></div></a></li></ul>');
          },
          beforeSend: function() {
              gif_url = "{{ URL::asset('/images/91.gif') }}";
              $("#delivery-address").html("");
              $("#delivery-address").html('<div class="row"><div class="col-md-12"><div align="center"><img src='+gif_url+'></img></div></div></div><br>');
           },
          error: function (xhr, ajaxOptions, thrownError) {
                 console.log(xhr.status);
                 console.log(xhr.responseText);
                 console.log(thrownError);
          }
        });
      } 
    }); 

    $('#getdiscount').click(function(){
      var coupon = $("#discode").val();
      var data = {'discount':coupon}
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{ url('/verify/discount')}}",
          method: 'POST',
          data: data,
          dataType: 'json',
          success: function(response) {
            if(response.error){
              $("#coupon-stat").text(response.error);  
            }
            else if(response.success){
              $("#coupon-stat").text(response.rebate+"% OFF!"+response.success);
              $(".document-tag-price").append("(-50%)")

            }
            else{
              $("#coupon-stat").text("unable to verify");
            }
            
            //console.log($("#document_name").val());
          },
          error: function (xhr, ajaxOptions, thrownError) {
                 console.log(xhr.status);
                 console.log(xhr.responseText);
                 console.log(thrownError);
          }
        });
    });

    $("#delivery-address").on('click','a#delete_addr',function(){
      var addr_id = $(this).attr('at');
      var data = {'address_id':addr_id}
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{ url('/address/delete')}}",
          method: 'POST',
          data: data,
          dataType: 'json',
          success: function(response) {
              $("#delivery-address").html('');
              $("#delivery-address").append('<ul class="row" style="list-style: none;" id="ul-addr">');
              if(response.addr){
                $.each(response.addr,function(index, value){
                  $("#ul-addr").append('<li class="col-md-3"><div class="address-content"><div class="address"><div class="radio"><label><input type="radio" name="address" value="'+value.id+'">&nbsp;&nbsp;<b>'+value.name+'</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="delete_addr" style="color:red;cursor:pointer;" at="'+value.id+'"><span class="glyphicon glyphicon-trash"></span></a></div><p>'+value.add1+'</p><p>'+value.add2+'</p><p>'+value.city+' - '+value.pincode+'</p><p>Mobile : '+value.phone+'</p></div></div></li>');                
                });
            }
            else{
              $("#delivery-address").html('Server Failed!')
            }
            $("#ul-addr").append('<li class="col-md-3"><a href="" id="add-address" data-toggle="modal" data-target="#addadd"><div class="address-content"><div class="address"><span class="glyphicon glyphicon-plus"></span><p>Add a new address</p></div></div></a></li></ul>');            
          },
          error: function (xhr, ajaxOptions, thrownError) {
                 console.log(xhr.status);
                 console.log(xhr.responseText);
                 console.log(thrownError);
          }
        });
    });

    $("#delivery-address input:radio").on('click',function(){
        $(".next-btn-block").html("<a class='next-order'><img src=\"{{ URL::asset('/images/next.png') }}\" class='img-responsive' align='right'></a>");
    });

    $(".next-btn-block").on('click','a.next-order',function(){
      var address_id = $('input[name=address]:checked').val();
        var document_id = $('input[name=document_id]').val();
        var pg_color = $('input[name=pgcolor]:checked').val();
        var pg_side = $('input[name=pgside]:checked').val();
        var pg_size = $('input[name=pgsize]:checked').val();
        var pg_type = $('#pgtype').find(":selected").val();
        var pg_number = $('input[name=pgnumber]').val();
        var cp_number = $('input[name=cpnumber]').val();
        var discount = $("#discode").val();
        var comment = $("textarea#comment").val();
        var paymode_id = $('input[name=paymode]:checked').val();

        var request = {'address_id':address_id,'document_id':document_id,'pg_color':pg_color,'pg_side':pg_side,'pg_size':pg_size,'pg_type':pg_type,'pg_number':pg_number,'cp_number':cp_number,'discount':discount,'comment':comment,'paymode_id':paymode_id}
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{ url('/orders/add')}}",
          method: 'POST',
          data: request,
          dataType: 'json',
          success: function(response) {
            if(response.success){
              done_url = "{{ URL::asset('/images/tick-box.png') }}";
              url = "{{ url('/orders') }}";
              $('body').children().fadeOut('slow');
              $('body').html('<div class="container"><div class="row"><div class="col-md-12"><div  class="pg-img" align="center" style="text-align: center;margin-top: 25vh;font-size: 200%;font-weight: 100;"><img src="'+done_url+'" class="img-responsive" style="margin:0 auto;width:200px;"><br><br>Done <p><a href="'+url+'">(Click anywhere to continue)</a></p></div></div></div></div>');
            }
            if(response.error){
              done_url = "{{ URL::asset('/images/round-delete-button.png') }}";
              url = "{{ url('/print') }}";
              $('body').children().fadeOut('slow');
              $('body').html('<div class="container"><div class="row"><div class="col-md-12"><div  class="pg-img" align="center" style="text-align: center;margin-top: 25vh;font-size: 200%;font-weight: 100;"><img src="'+done_url+'" class="img-responsive" style="margin:0 auto;width:200px;"><br><br>ERROR!! <p><a href="'+url+'">(Click anywhere to continue)</a></p></div></div></div></div>');
            }
          },
          beforeSend: function() {
              gif_url = "{{ URL::asset('/images/91.gif') }}";
              $('body').children().fadeOut('slow');
              $('body').html('<div class="container container-table"><div class="row vertical-center-row"><div class="text-center col-md-4 col-md-offset-4"><img src="'+gif_url+'" class="img-responsive"></div></div></div>');
           },
          error: function (xhr, ajaxOptions, thrownError) {
                 console.log(xhr.status);
                 console.log(xhr.responseText);
                 console.log(thrownError);
          }
        });
    });

	</script>
@endsection