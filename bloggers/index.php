<!DOCTYPE html>
  <html>
    <head>
       <meta charset="UTF-8"/>
      <title>Food Talk India</title>
      <meta name="description" content="Food talk India organize each events like hand-crafted and customized it with a special theme, an innovative concept and an elaborate menu.">
      <meta name="author" content="Food Talk India">
      <meta name="keyword" content="food talk india, food groups delhi, restaurant reviews, food events delhi, cocktail events, blind tasting, blind folded dinner, best brunches in delhi, food community delhi, delhi food events, mumbai food events, restaurant marketing, cocktail making workshops, largest food community india, cooking classes delhi, delhifood, sharing, restaurant, zomato, restaurant delhi, near, discover, times city, events, blind tasting, street, burrp, yelp, delhi event, mumbai event"> 
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"/>
      <link type="text/css" rel="stylesheet" href="../css/app.css"/>
      <link rel="shortcut icon" href="../img/favicon.png" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <style>
      	[type="checkbox"]:not(:checked), [type="checkbox"]:checked{
      		position: relative !important;
      		left: 0 !important;
      		margin: 5px;
      		width: 15px;
      		height: 15px;
      	}
      	label{
      		font-size: 18px;
      		color: #807E7E;
      		margin-top: 10px !important;
      		margin-bottom: 5px;
      	}
      	.checkval{
      		font-size: 14px !important;
      		margin-left: 15px !important;
      	}
      	input[type=text], input[type=password], input[type=email], input[type=url], input[type=time], input[type=date], input[type=datetime-local], input[type=tel], input[type=number], input[type=search], textarea.materialize-textarea, .select-wrapper input.select-dropdown{
      		border: 1px solid #BDB6B6 !important;
      		padding: 0 5px !important;
      	}
      	#frm{
      		margin-top: 30px;
      	}
      	.borderR{
      		border: 2px solid red !important;
      	}
      	.error{
      		color: red;
      	}
		nav{
			height: 180px !important;
		}
		.brand-logo{
			/*font-size: 30px !important;
			margin-top: 25px;*/
			margin-left: 0 !important;
		}
		.brand-logo img{
			height: 170px;
			width: auto;
		}
		.m-b{
			margin-bottom: 15px;
		}
		select {
		background-color: rgba(255,255,255,0.9);
		    width: 100%;
		    padding: 5px;
		    border: 1px solid #BDB6B6 !important;
		    /* border-radius: 2px; */
		    height: 3.1rem;
		}
		</style>
    </head>
    <body>
    	<nav>
	    <div class="nav-wrapper">
	      <a href="#" class="brand-logo center"><img src="logo_cc-white.png" alt=""></a>
	      <!-- <ul id="nav-mobile" class="left hide-on-med-and-down">
	        <li><a href="sass.html">Sass</a></li>
	        <li><a href="badges.html">Components</a></li>
	        <li><a href="collapsible.html">JavaScript</a></li>
	      </ul> -->
	    </div>
	  </nav>
	  <div class="container">
	  	<div class="row">
	  		<div class="col s12 m12 l12 center-align">
	  			<h4>Are you a blogger or a micro blogger?</h4>
	  			<p>Food talk loves the blogger community and we want to be in constant touch with you.</p>
	  		</div>
	  	</div>
	  	<div class="row">
	  		<div class="col s12 m12 l12">
		  		<form action="" id="frm">
		  			<div class="col s12 m12 l12 ">
		  				<div class="col s12 m12 l12 m-b">
		  					<label for="category">I am a ... *</label> <br> 
		  					<div class="error" id="ce">atleast select one</div>
		  					<div class="col s12 m6 l6"><input type="checkbox" name="category[]" value="blogger" id="blogger"><span class="checkval">Blogger</span></div>
		  					<div class="col s12 m6 l6"><input type="checkbox" name="category[]" value="microblogger" id="microblogger"><span class="checkval">Micro Blogger</span></div>
							
		  				</div>
		  				<div class="col s12 m12 l12 m-b">
		  					<label for="field">I Blog about *</label> <br> 
		  					<div class="error" id="fe">atleast select one</div>
		  					<div class="col s12 m3 l3"><input type="checkbox" name="field[]" value="Food" id="food"><span class="checkval">Food</span></div>
		  					<div class="col s12 m3 l3"><input type="checkbox" name="field[]" value="Lifestyle" id="lifestyle"><span class="checkval">Lifestyle</span></div>
		  					<div class="col s12 m3 l3"><input type="checkbox" name="field[]" value="Fashion" id="fashion"><span class="checkval">Fashion</span></div>
		  					<div class="col s12 m3 l3"><input type="checkbox" name="field[]" value="Travel" id="travel"><span class="checkval">Travel</span></div>
		  				</div>
		  			</div>
		  			<div class="col s12 m12 l12">
		  				<div class="col s12 m4 l4">
		  					<label for="name">Name *</label>
		  					<input type="text" name="name" id="name" class="imp">
		  				</div>
		  				<div class="col s12 m4 l4">
		  					<label for="email">Email Address *</label>
		  					<input type="email" name="email" id="email" class="imp">
		  				</div>
		  				<div class="col s12 m4 l4">
		  					<label for="phone">Phone Number *</label>
		  					<input type="tel" name="phone" id="phone" class="imp">
		  				</div>
		  			</div>
		  			<div class="col s12 m12 l12">
		  				<div class="col s12 m4 l4">
		  					<label for="instagram">Instagram handle</label>
		  					<input type="text" id="instagram" name="instagram">
		  				</div>
		  				<div class="col s12 m4 l4">
		  					<label for="twitter">Twitter handle</label>
		  					<input type="text" id="twitter" name="twitter">
		  				</div>
		  				<div class="col s12 m4 l4">
		  					<label for="facebook">Facebook handle</label>
		  					<input type="text" id="facebook" name="facebook">
		  				</div>
		  			</div>
		  			<div class="col s12 m12 l12">
		  				<div class="col s12 m6 l6">
		  					<label for="facebook_page">Facebook Page</label>
		  					<input type="text" id="facebook_page" name="facebook_page">
		  				</div>
		  				<div class="col s12 m6 l6">
		  					<label for="url">Website</label>
		  					<input type="text" name="url" id="url">
		  				</div>
		  			</div>
		  			<div class="col s12 m12 l12">
		  				<div class="col s12 m4 l4">
		  					<label for="pincode">Pincode *</label>
		  					<input type="number" id="pincode" name="pincode" class="imp">
		  				</div>
		  				<div class="col s12 m4 l4">
		  					<label for="city">City *</label>
		  					<select name="city" id="city" class="browser-default">
		  						<option value="Delhi">Delhi</option>
		  						<option value="Mumbai">Mumbai</option>
		  						<option value="Pune">Pune</option>
		  						<option value="Bangalore">Bangalore</option>
		  						<option value="Other">Other</option>
		  					</select>
		  				</div>
		  				<div class="col s12 m4 l4">
		  					<label for="other">Other</label>
		  					<input type="text" id="other" name="other">
		  				</div>
		  			</div>
		  			<div class="col s12 m12 l12 m-b">
		  				<div class="col s12 m8 l8">
		  					<label for="address">Address</label>
		  					<input type="text" name="address" id="address">
		  				</div>
		  				<div class="col s12 m4 l4">
		  					<label for="device">Type of Phone *</label>
		  					<select name="device" id="device" class="browser-default">
		  						<option value="Android">Android</option>
		  						<option value="iPhone">iPhone</option>
		  						<option value="Other">Other</option>
		  					</select>
		  				</div>
		  			</div>
		  			<div class="col s12 m12 l12 m-b">
		  				<button class="waves-effect waves-light btn right" id="submit">Save</button>
		  			</div>
		  		</form>
	  		</div>
	  	</div>
	  </div>

	  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>

		<script>
			$(document).ready(function() {
			    $('select').material_select();
			    $('#other').prop('disabled', true);
			    $('#ce, #fe').addClass('hide');
			    $('#city').on('change', function(event) {
			    	event.preventDefault();
			    	if($('#city').val() == "Other"){
			    		$('#other').prop('disabled', false);
			    		$('#other').focus();
			    	}else{
			    		$('#other').prop('disabled', true);
			    	}
			    });
			    $('#submit').on('click', function(event) {
			    	event.preventDefault();
			    	$(this).attr("disabled", 'disabled');
			    	var cat = $('input[name="category[]"]:checked').length > 0;
			    	var type = $('input[name="field[]"]:checked').length > 0;
			    	if(cat == true){
			    		if(type == true){
			    			if(validateForm() == true){
			    				var category1 = $('#blogger:checked').val();
						    	var category2 = $('#microblogger:checked').val();
						    	var field1 = $('#food:checked').val();
						    	var field2 = $('#lifestyle:checked').val();
						    	var field3 = $('#fashion:checked').val();
						    	var field4 = $('#travel:checked').val();
						    	var category = category1+", "+category2;
						    	var field = field1+", "+field2+", "+field3+", "+field4;
						    	if($('#city').val() == "Other"){
						    		var city = $('#other').val();
						    	}else{
						    		var city = $('#city').val();
						    	}
						    	var data = {name: $('#name').val(),
						    				email: $('#email').val(),
						    				phone: $('#phone').val(),
						    				instagram: $('#instagram').val(),
						    				twitter: $('#twitter').val(),
						    				facebook: $('#facebook').val(),
						    				facebook_page: $('#facebook_page').val(),
						    				url: $('#url').val(),
						    				pincode: $('#pincode').val(),
						    				address: $('#address').val(),
						    				location: city,
						    				category: category,
						    				field: field,
						    				device: $('#device').val()};
						    	console.log(data);
						    	$.ajax({
						    		url: 'save.php',
						    		type: 'POST',
						    		dataType: 'JSON',
						    		data: data,
						    	})
						    	.done(function(response) {
						    		console.log("success");
						    		if(response == 1){
					                  $(location).attr('href', 'thanks.html');
					                 }
						    	})
						    	.fail(function() {
						    		console.log("error");
						    		$('#submit').attr('disabled',false);
						    	});
			    			}else{
			    				
			    				$('#submit').attr('disabled',false);
			    			}
			    		}else{
			    			$('#fe').removeClass('hide');
		    				$('#submit').attr('disabled',false);
		    			}
			    	}else{
			    		$('#ce').removeClass('hide');
	    				$('#submit').attr('disabled',false);
	    			}
						    	
			    
			    	
			    });

				function validateForm() {
	            	var allIsOk = true;
		            // Check if empty of not
		            $('#frm').find( '.imp' ).each(function () {
		                if ( ! $(this).val() ) { 
		                    $(this).addClass('borderR');
		                    $(this).focus();
		                    allIsOk = false;
		                }
		            });
		            return allIsOk
		        };
			  });
		</script>
    </body>
  </html>