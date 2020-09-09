var doAnimations = function() {
    
    // Calc current offset and get all animatables
    var offset = $(window).scrollTop() + $(window).height(),
        $animatables = $('.animatable');
    
    // Unbind scroll handler if we have no animatables
    if ($animatables.length == 0) {
      $(window).off('scroll', doAnimations);
    }
    
    // Check all animatables and animate them if necessary
		$animatables.each(function(i) {
       var $animatable = $(this);
			if (($animatable.offset().top + $animatable.height() - 20) < offset) {
        $animatable.removeClass('animatable').addClass('animated');
			}
    });

  };
  
  function enviarMensaje(){
    console.log("entre a la funcion");
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(inputEmail.value)){
            console.log("entre al if");
            $.get(pathMessages, { nameSender: $('#inputName').val(), emailSender: $('#inputEmail').val(), asunto: $('#inputAsunto').val(), contentSender: $('#inputDescription').val() }, function( data ){
            var respuesta = data['response'];
            var sent = respuesta;
            console.log(sent);
            $('#inputName').val("");
            $('#inputEmail').val("");
            $('#inputAsunto').val("");
            $('#inputDescription').val("");
            showToast();
            });
    }else{
        document.getElementById("emailHelp").innerHTML = "Please type a valid email address.";
        $("#emailHelp").addClass("text-error"); 
    }
}



function showToast(){
    $('.toast').toast('show')
    
}
  
  // Hook doAnimations on scroll, and trigger a scroll
	$(window).on('scroll', doAnimations);
    $(window).trigger('scroll');

