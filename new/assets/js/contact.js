/* ============================================================
 * Plugin Core Init
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
$(document).ready(function() {
	'use strict';
    $('#contact-form').validate({
        // Override to submit the form via ajax
        submitHandler: function(form) {
        	var a = $("#contact-form").serializeArray();
            var formdata = {
                    name: a[0]['value'],
                    phone: a[2]['value'],
                    email: a[1]['value'],
                    purpose: a[3]['value'],
                    web: a[4]['value'],
                    location: a[5]['value'],
                    message: a[6]['value']
                };
            formdata = JSON.stringify(formdata);
            $('#contact-panel').portlet({
				refresh:true
			});
			
            $.ajax({
			     type:"POST",
			     url: "http://api.foodtalk.in/contact",
			     data: formdata,
			     dataType: 'application/json'
		    })
		    .always(function(response){
                  var result = jQuery.parseJSON(response.responseText);
                  if(result.code == "200"){
                    //console.log(response);
			       	//Set your Succss Message
			       	clearForm("Thank you for Contacting Us! We have received your enquiry and will respond to you within 24 hours. For urgent enquiries please call us on the telephone number.");
                  }else{
                    $('#contact-panel').portlet({
						refresh:false,
						//Set your ERROR Message
						error:"We could not send your message, Please try Again"
					});
                  }
                  
            });
		    return false; // required to block normal submit since you used ajax
        }
    });
    function clearForm(msg){
    	$('#contact-panel').html('<div class="alert alert-success" role="alert">'+msg+'</div>');
    }
    
    $('#contact-panel').portlet({
        onRefresh: function() {
        }
    });
});