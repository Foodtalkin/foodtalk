<?php
   session_start();
   $user =(array) $_SESSION['USER']['result'];
    
    $metadata = (array) $user['metadata'];
    // var_dump($user);
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Food Talk</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/jsDatePick_ltr.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<style>
			/*.que-img{
				width: 20%;
			}*/
			#main, h2, p{
				color: #0e0e0e;
			}
			.image1{
				border-radius: 2px;
			}
			.image1 img{
				width: 100%;
				height: auto;
				border-radius: 2px;

			}

			input[type="checkbox"], input[type="radio"]{
				text-align: left;
				margin-left: 0;
				margin-right: 0;
			}
			.lab{
				font-size: 1em;
				margin-bottom: .3em;
				width: 100%;
				text-align: left;
				color: #0e0e0e;
				font-weight: 500;
			}
			.lab1{
				font-size: 1.2em;
				margin-bottom: .3em;
				width: 100%;
				text-align: left;
				color: #0e0e0e;
			}
			.lab1 ul{
				margin-left: 20px;
			}
			.lab2{
				font-size: 1.2em;
				color: #0e0e0e;
			}
			.dates{
				margin: 20px !important;
				padding: 10px;
				color: #8D0106;
				font-weight: bold;
				border:3px solid #8D0106;
			}
			.dates div{
				padding: 0;
			}
			.no-border{
				border:none !important;
				font-size: 1em;
				margin: 20px 0 0 0 !important;
				color: #0e0e0e;
			}
			.cdheading{
				margin: 1em 0;
				font-weight: 400;
				color: #0e0e0e;
			}
			h2{
				font-size: 2.2em;
				color: #0e0e0e;
				font-weight: 700;
				letter-spacing: 2px;
			}
			.borderR{
				border : 3px solid red;
			}
			#submit{
				background-color: #8D0106;
			}
			header.major p {
			    margin: .5em 0 .5em 0;
			    padding: .5em 0 0 0;
			    color: #0e0e0e;
			}
			.part {
			    color: #8D0106 !important;
			    font-size: 1.5em;
			    font-weight: normal;
			}
			.sechead{
				font-size: 1.1em;
				padding: 20px !important;
				border: solid 2px #e5e5e5;;
				color: #0e0e0e;
				font-weight: bold;
			}
			h2 {
			    font-size: 1.5em;
			    color: #0e0e0e;
			}
			.left{
				text-align: left;
			}
			.right-a{
				text-align: right;
			}
			.que-img{
				width: 70%;
				margin: 20px 15%;
			}
		</style>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="http://foodtalk.in/">FOODTALK</a></h1>
					
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<!-- Header -->
					<section class="box special">
						<span class="image featured"><img src="images/cover.jpg" alt="" /></span>
						<header class="major">
							<h2>Heston Week</h2>
							<p class="sechead"><i>#MasterChefAuQuiz with Food Talk India</i></p>
							<p class="no-border">It's the biggest week in MasterChef history <br>
								4 Pop-up restaurants in secret locations over 4 big days with one of the best Chef's in the world...Heston Blumenthal.
								<br>And we have a Special surprise for you!</p>

							
							<p></p>
							<div class="row uniform 50% dates">
								<div class="12u 12u(mobilep)">Answer the Quiz of the Day and stand a chance to win a Ltd Edition MasterChef Cheese Platter.</div>
							</div>


							<p class="no-border part">Participate Now!</p>
						</header>
						<form method="post" action="" id="frm">
							<div class="row uniform 50%">
								<div class="12u(mobilep)">
									<p class="lab">Day 4:</p>
									<label for="name" class="lab"> Heston loves History almost as much as he loves food! <br>Name the inspiration behind Mimi's dish? *</label>
									<img src="images/day4.jpg" alt="" class="que-img">
									<input type="text" name="dish" id="dish" value="" placeholder="Your Answer" class="imp"/>
								</div>
								
							</div>
							<h4 class="cdheading">You Contact Details:</h4>
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
									<label for="name" class="lab">Name *</label>
									<input type="text" name="name" id="name" value="<?php echo $user['name']; ?>" placeholder="Name" class="imp"/>
								</div>
								<div class="6u 12u(mobilep)">
									<label for="email" class="lab">Email *</label>
									<input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" placeholder="abc@xyz.com" class="imp"/>
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
									<label for="phone" class="lab">Phone *</label>
									<input type="tel" name="phone" id="phone" value="<?php echo $user['contact']; ?>" placeholder="9876543210" class="imp"/>
								</div>
								<div class="6u 12u(mobilep)">
									<label for="dob" class="lab">Date Of birth *</label>
									<input type="text" name="dob" id="dob" value="<?php echo $user['dob']; ?>" placeholder="dd-mm-yyyy" class="imp"/>
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<label for="address" class="lab">City *</label>
									<div class="row uniform 50%">
										<div class="3u 12u(mobilep)">
											<input type="radio" class="city" name="city" value="Delhi" id="Delhi">
											<label for="Delhi">Delhi</label>
										</div>
										<div class="3u 12u(mobilep)">
											<input type="radio" class="city" name="city" value="Mumbai" id="Mumbai">
											<label for="Mumbai">Mumbai</label>
										</div>
										<div class="3u 12u(mobilep)">
											<input type="radio" class="city" name="city" value="Bangalore" id="Bangalore">
											<label for="Bangalore">Bangalore</label>
										</div>
										<div class="3u 12u(mobilep)">
											<input type="radio" class="city" name="city" value="other" id="other">
											<label for="other">Other</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
									<label for="othcity" class="lab">Other City</label>
									<input type="text" name="othcity" id="othcity" placeholder="Your City" class="imp" />
								</div>
								<div class="6u 12u(mobilep)">
									<label for="insta" class="lab">Instagram handle</label>
									<input type="text" name="insta" id="insta" value="<?php echo $user['instagram_handle']; ?>" placeholder="Instagram Handle" />
								</div>
							</div>
							
							<!-- <div class="row uniform 50%">
								<div class="12u">
									<label for="address" class="lab">Postal Address</label>
									<input type="text" name="address" id="address" value="" placeholder="Postal Address" />
								</div>
							</div> -->
							
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" value="Submit" id="submit"/></li>
									</ul>
								</div>
							</div>
							<div class="row uniform">
								<div class="12u right-a">
									<a href="https://www.facebook.com/notes/food-talk-india/heston-week-masterchefquiz-with-food-talk-india/891762590953060" target="_BLANK">**Terms & Conditions Apply</a>
								</div>
							</div>
						</form>
					</section>
				</section>

			<!-- Footer -->
				<footer id="footer">
					
					<ul class="copyright">
						<li>MasterChef® is a registered trademark of Shine (Aust) Pty Ltd. All rights reserved.</li>
						<!-- <li><a href="">Terms & Conditions</a></li> -->
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/jsDatePick.min.1.3.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script type="text/javascript">
				window.onload = function(){
					new JsDatePick({
						useMode:2,
						target:"dob",
						yearsRange:[1940,2016]
						
					});
				};
			</script>
			<script>
				$(document).ready(function() {
					var id= <?php echo $user['id']; ?>;
					var usercity= <?php echo $user['city_id']; ?>;
					$('#othcity').attr('disabled', 'disabled');
					if(usercity == 1){
						$("#Delhi").attr('checked', 'checked');
						$('#othcity').val('Delhi');							
					}else if(usercity == 2){
						$("#Mumbai").attr('checked', 'checked');
						$('#othcity').val('Mumbai');	
					}else if(usercity == 4){
						$("#Bangalore").attr('checked', 'checked');
						$('#othcity').val('Bangalore');
					}else{
						$("#other").attr('checked', 'checked');
						$('#othcity').val('');
					}
					$('.city').change(function(event) {
						/* Act on the event */
						console.log($(this).val());
						$('#othcity').val($(this).val());
						$('#othcity').attr('disabled', 'disabled');
						if(this.checked && this.value =="other"){
							$('#othcity').removeAttr('disabled');
							$('#othcity').val('');
						}
					});
					$('#submit').on('click', function(event) {
						event.preventDefault();
						/* Act on the event */
						$(this).attr("disabled", 'disabled');
						if(validateForm() == true){
							var data = $('#frm').serializeArray();
							//console.log(data);

							var response = "day4 : "+$('#dish').val();
							//console.log(response);

							var URL_INSERT = "http://api.foodtalk.in/user/"+id+"/rsvp";
              				var URL_UPDATE = "http://api.foodtalk.in/user/"+id;
              				var toinsertdata = {events_id: 94,
				                    email: $('#email').val(),
				                    contact: $('#phone').val(),
				                    response: response,
				                    payment_id: '',
				                    subscribe: 0};
				            var toupdate = {name: $('#name').val(),
				                    email: $('#email').val(),
				                    contact: $('#phone').val(),
				                    dob : $('#dob').val(),
				                    instagram_handle: $('#insta').val(),
				                    city: $('#othcity').val()};

				            $.ajax({
				                url: "createsession.php",
				                type: 'POST',
				                dataType: 'json',
				                data: {URL_INSERT: URL_INSERT,
				                       URL_UPDATE: URL_UPDATE,
				                       toinsertdata: toinsertdata,
				                       toupdate: toupdate,
				                       venue : ''}
				                })
				                .done(function(response) {
				                    if(response == 1){
					                  $(location).attr('href', 'thanks.php');
					                }
				                 
				               	})
				               	.fail(function(response) {
				                 	console.log(response);
				                 	$('#submit').attr('disabled',false);
				               	})
				               	.always(function() {
				                	console.log("complete");
				                	//$(location).attr('href', 'http://imojo.in/47vvf9');
				              	});
						}
						else{
							$('#submit').attr('disabled',false);
						}
					});

					// validate function
					function validateForm() {
			            var allIsOk = true;
			            //Check if empty of not
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