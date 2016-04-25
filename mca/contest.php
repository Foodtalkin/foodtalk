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
			}
			.lab1{
				font-size: 1.2em;
				margin-bottom: .3em;
				width: 100%;
				text-align: left;
			}
			.lab1 ul{
				margin-left: 20px;
			}
			.dates{
				margin: 20px 0;
				font-weight: normal;
			}
			.no-border{
				border:none !important;
				font-size: 1em;
				margin: 20px 0 0 0 !important;
			}
			.cdheading{
				margin: 1em 0;
				font-weight: 400;
			}
			h2{
				font-size: 2em;
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
			}
			.part {
			    color: #8D0106 !important;
			    font-size: 1.5em;
			    font-weight: normal;
			}
			.sechead{
				font-size: 1.1em;
			}
			h2 {
			    font-size: 1.5em;
			}
			.left{
				text-align: left;
			}
			#navButton{
		display: none !important;
    }
		</style>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">FOODTALK</a></h1>
					<!-- <nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Layouts</a>
								<ul>
									<li><a href="generic.html">Generic</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="elements.html">Elements</a></li>
									<li>
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#" class="button">Sign Up</a></li>
						</ul>
					</nav> -->
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<!-- Header -->
					<section class="box special">
						<span class="image featured"><img src="images/cover.jpg" alt="" /></span>
						<header class="major">
							<h2>Participate in the Gourmet Quiz and win an invite to the MasterChef Australia inspired Party</h2>
							<p class="sechead"><i>"Let's talk Gourmet, let's talk MasterChef Australia"</i><br />
							MasterChef Australia is back with another exciting </p>
							<p class="no-border">Pass the Gourmet Vacabulary test and win an invite to the exclusive Launch Party of MasterChef Australia Season 08 in your City.
							<strong> 20 lucky winner from each city will be invited by Star World for a MasterChef inspired experience Co-Curated by Food Talk India  at Olive</strong></p>
							<div class="row uniform 50% dates">
								<div class="4u 12u(mobilep)">Delhi- 5th May'16</div>
								<div class="4u 12u(mobilep)">Mumbai- 8th May'16</div>
								<div class="4u 12u(mobilep)">Bangalore- 9th May'16</div>
							</div>
							<!-- <ul class="">
								<li>Delhi- 5th April'16 </li>
								<li>Mumbai- 8th April'16 </li>
								<li>Bangalore- 9th April'16 </li>
							</ul> -->

							<p class="no-border part">Participate Now!</p>
						</header>
						<form method="post" action="" id="frm">
							<div class="row uniform 50%">
								<label for="" class="lab1">Q. Match the Gourmet word with the image: *</label>
								<div class="6u 6u(mobilep)">
									<ul class="left">
										<li>Roulad</li>
										<li>Quennelle</li>
									</ul>
								</div>
								<div class="6u 6u(mobilep)">
									<ul class="left">
										<li>Bain Marie</li>
										<li>Carpaccio</li>
									</ul>
								</div>
								<div class="6u 6u(mobilep)">
									<span class="image1"><img src="images/BainMarie.jpg" alt="" /></span>
									<input type="text" name="dname1" id="dname1" value="" placeholder="Dish Name" class="imp" />
								</div>
								<div class="6u 6u(mobilep)">
									<span class="image1"><img src="images/carpaccio.jpg" alt="" /></span>
									<input type="text" name="dname2" id="dname2" value="" placeholder="Dish Name" class="imp"/>
								</div>
								<div class="6u 6u(mobilep)">
									<span class="image1"><img src="images/Quennelle.jpg" alt="" /></span>
									<input type="text" name="dname3" id="dname3" value="" placeholder="Dish Name" class="imp"/>
								</div>
								<div class="6u 6u(mobilep)">
									<span class="image1"><img src="images/roulad.jpg" alt="" /></span>
									<input type="text" name="dname4" id="dname4" value="" placeholder="Dish Name" class="imp"/>
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
										<div class="4u 12u(mobilep)">
											<input type="radio" name="city" value="Delhi" id="Delhi" checked>
											<label for="Delhi">Delhi</label>
										</div>
										<div class="4u 12u(mobilep)">
											<input type="radio" name="city" value="Bombay" id="Bombay">
											<label for="Bombay">Bombay</label>
										</div>
										<div class="4u 12u(mobilep)">
											<input type="radio" name="city" value="Bangalore" id="Bangalore">
											<label for="Bangalore">Bangalore</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
									<label for="insta" class="lab">Instagram handle</label>
									<input type="text" name="insta" id="insta" value="<?php echo $user['instagram_handle']; ?>" placeholder="Instagram Handle" />
								</div>
								<div class="6u 12u(mobilep)">
									<label for="twitter" class="lab">Twitter Handle</label>
									<input type="text" name="twitter" id="twitter" value="<?php echo $user['twitter_handle']; ?>" placeholder="Twitter Handle" />
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
						</form>
					</section>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<!-- <ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul> -->
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						<li><a href="">Terms & Conditions</a></li>
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
					$('#submit').on('click', function(event) {
						event.preventDefault();
						/* Act on the event */
						$(this).attr("disabled", 'disabled');
						if(validateForm() == true){
							var data = $('#frm').serializeArray();
							//console.log(data);

							var response = "Bain Marie: "+data[0]['value']+", carpaccio:"+ data[1]['value']+", Quennelle:"+data[2]['value']+", roulad:"+data[3]['value'];
							//console.log(response);

							var URL_INSERT = "http://stg-api.foodtalk.in/user/"+id+"/rsvp";
              				var URL_UPDATE = "http://stg-api.foodtalk.in/user/"+id;
              				var toinsertdata = {events_id: 74,
				                    email: data[5]['value'],
				                    contact: data[6]['value'],
				                    response: response,
				                    payment_id: '',
				                    subscribe: 0};
				            var toupdate = {name: data[4]['value'],
				                    email: data[5]['value'],
				                    contact: data[6]['value'],
				                    dob : data[7]['value'],
				                    instagram_handle: data[9]['value'],
				                    twitter_handle: data[10]['value'],
				                    city: data[8]['value']};

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