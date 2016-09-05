$(document).ready(function() {     
    
    /* ======= jQuery Placeholder ======= */
    /* Ref: https://github.com/mathiasbynens/jquery-placeholder */
    
    $('input, textarea').placeholder();      
	
	/* ======= Fixed Header animation ======= */ 
	       
    $(window).on('scroll', function() {
         
         if ($(window).scrollTop() > 0 ) {
             $('#header').addClass('header-change');
         }
         else {
             $('#header').removeClass('header-change');             
         }
    }); 
    
    /* ======= Toggle between Signup & Login Modals ======= */ 
    $('#signup-link').on('click', function(e) {
        $('#signup-modal').modal();
        $('#login-modal').modal('toggle');
        e.preventDefault();
    });
    
    
    
    $('#login-link').on('click', function(e) {
        $('#login-modal').modal();
        $('#signup-modal').modal('toggle');
        e.preventDefault();
    });
    
    
    $('#myNavmenu').offcanvas({toggle:false, canvas:"body", autohide: false});
    
    /* ======= jQuery FitVids - Responsive Video ======= */
    /* Ref: https://github.com/davatron5000/FitVids.js/blob/master/README.md */
    
    $(".video-container").fitVids();
    

});