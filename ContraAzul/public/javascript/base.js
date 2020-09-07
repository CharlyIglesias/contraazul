$(document).ready(function(){
                
    $('.menu-toggle').click(function () {
        console.log("picados"); 
        $('nav').toggleClass('active');
    });
});

function myFunction2(id){
    const speed = 1000;
    const targetElement = document.getElementById(id.id);
    var element = document.getElementById("navigator");
    element.classList.remove("active");
    $('html, body').animate({ scrollTop: $(targetElement).offset().top }, speed);
}


function myFunction(id) {
    var elmnt = document.getElementById(id.id);

    
    // document.getElementById("barritas").click();
    elmnt.scrollIntoView();
}

