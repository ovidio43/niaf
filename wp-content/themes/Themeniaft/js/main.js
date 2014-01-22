$( document ).ready(function() {
  /*$(window).load(function() {
    $("#status").fadeOut();
    $("#preloader").delay(1000).fadeOut("slow");
  })	*/
	var galleries = $('.ad-gallery').adGallery({
    slideshow: {
        enable: true,
        autostart: true,
        speed: 5000
      }    
  });
    $('.wrap-slider').height($('.wrap-slider li').height());
    $('.bxslider-main').bxSlider({
  		mode: 'fade',
  		pager: false,
  		auto:  true,
  		pause: 4500,
  		infiniteLoop: true,
  		captions: false,
      onSliderLoad: function(){
        $('.wrap-slider').css('visibility','visible');
        $('.wrap-slider').css('height','auto');
      }
	});
	$('.bxslider-featured').bxSlider({
		slideWidth: 300,
		minSlides: 3,
		pager: false,
		maxSlides: 3,
    auto:  false,
    moveSlides:1,
		controls: true,
		slideMargin: 20
	});
	$('.bxslider-partner').bxSlider({
		slideWidth: 280,
		minSlides: 3,
		maxSlides: 3,
    auto:  false,
		pager: false,
		controls: true,
		slideMargin: 25
	});	
    $("#validar_form").validate({
        rules: { 
            email: {required: true, email: true }
        },
        submitHandler: function() {
          var query = $("#validar_form").serialize();
          var srcPath = $("body").attr("rel");  
            $.ajax({
              type: "POST",
              url: srcPath+"/formulariosSalesforce/_SF_validation_user.php",
              data: query,
              beforeSend: function(objeto){
                $("#msg").html('');
                $("#msg").addClass("loadform");                
                //$(".menu-social-menu-container").css("visibility","hidden");
              },
              success: function(data) {               
                if(data==1){
                  setTimeout(function(){
                    window.location.href = $(".main-container-full").attr("rel");
                  }, 1000);                 
                }else if(data==0){
                	$('#msg').html(data);  
                  $("#msg").removeClass("loadform");                
                  //$(".menu-social-menu-container").css("visibility","visible");                                 
                }else{
                	$('#msg').html(data);   
                  $("#msg").removeClass("loadform");                
                 // $(".menu-social-menu-container").css("visibility","visible"); 
                }
                 
              }                            
            });
           
        }
    });
  $( "#website_login" ).focus(function() {
    if (this.value == 'Password') {
      $(this).attr("type","password");
      this.value = '';
    }    
  });
  $( "#website_login" ).blur(function() {
    if (this.value == '') {
      $(this).attr("type","text");
      this.value = 'Password';}
  });
  $('.gallery-icon a').fancybox();
  $("#email").val("Email Address");
  $("#website_login").val("Password");
  $("#s").val("Search");
  if($("#loginform").attr("rel")>0){
    $(".onlymembers ").css("display","block");
  }
});