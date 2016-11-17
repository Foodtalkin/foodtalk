$(document).ready(function() {
    $('#logonav').hide();
	$(window).scroll(function () {
        if ($(window).scrollTop() > 150) {
            $("#navigation").css("background-color","#e54c4a");
            $("#logonav").show('slow');
            $("#logonav").attr('height', '50px');
            $('#logotxt, #logobig').hide('slow');
        } else {
            $("#navigation").css("background-color","rgba(16, 22, 54, 0)");
            // $("#fh5co-logo a").html("FoodTalk");
            $('#logotxt, #logobig').show('slow');
            $('#logonav').hide('slow');

        }
    });
    $('#contactfail, #contactsuccess, #contactvald').hide();
    $("#save").click(function(){
            event.preventDefault();
            
            $(this).attr("disabled", 'disabled');
            if(validateForm1() == true){
            var data = $('#form1').serializeArray();
            // console.log(data);
            var data2 = {name: data[0]['value'],
                        phone: data[2]['value'],
                        email: data[1]['value'],
                        purpose: data[3]['value'],
                        web : data[4]['value'],
                        location: data[5]['value'],
                        message: data[6]['value']};

            console.log("Log Entry");
            data2 = JSON.stringify(data2);
            $.ajax({
                 url: "http://api.foodtalk.in/contact",
                 type: 'POST',
                 dataType: 'application/json',
                 data: data2
               })
               .always(function(response){
                  var result = jQuery.parseJSON(response.responseText);
                  if(result.code == "200"){
                    $('#contactsuccess').show('slow');
                    $('#contactfail, #contactvald').hide();
                    $('html,body').animate({
                    scrollTop: $("#contactsuccess").offset().top},
                    'slow');
                  }else{
                    $('#contactsuccess, #contactvald').hide();
                    $('#contactfail').show('slow');
                    $('html,body').animate({
                     scrollTop: $("#contactfail").offset().top},
                    'slow');
                  }
                  
                  $('#form1')[0].reset();
                  // $("#tos1").addClass('hide');
                  // $("#toste1").removeClass('hide');
                  // $(location).attr('href', 'thanks.html');
                  $('#save').attr('disabled',false);
               });
                          
          }else{
                $('#save').attr('disabled',false);
                $('#contactsuccess, #contactfail ').hide();
                $('#contactvald').show('slow');
                console.log('2');
               
                $('html,body').animate({
                scrollTop: $("#contactvald").offset().top},
                'slow');
              }
          });

    function validateForm1() {
    	var allIsOk = true;
            //Check if empty of not
            $('#form1').find( '.imp' ).each(function () {
                if ( ! $(this).val() ) { 
                    $(this).addClass('borderR');
                    $(this).focus();
                    allIsOk = false;
                }
            });
            return allIsOk
    }
});