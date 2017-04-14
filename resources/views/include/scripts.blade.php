	<!--Scripts-->
	<script type="text/javascript">
		function openNav() {
		    document.getElementById("sidenavbar").style.width = "230px";
		}

		function closeNav() {
		    document.getElementById("sidenavbar").style.width = "0";
		}

		function checkScroll(){
		    var startY = $('.navbar').height(); //The point where the navbar changes in px

		    if($(window).scrollTop() > startY){
		        $('.navbar').addClass("scrolled");
		    }else{
		        $('.navbar').removeClass("scrolled");
		    }
		}

		if($('.navbar').length > 0){
		    $(window).on("scroll load resize", function(){
		        checkScroll();
		    });
		}
	</script>