<?php 
session_start();
$_SESSION['source']= $_GET['source'];
 ?>
  <!DOCTYPE html>
  <html>
    <head>
       <meta charset="UTF-8"/>
      <title>Liquid Studio | Food Talk India</title>
      <meta name="description" content="Food talk India organize each events like hand-crafted and customized it with a special theme, an innovative concept and an elaborate menu.">
      <meta name="author" content="Food Talk India">
      <meta name="keyword" content="food talk india, food groups delhi, restaurant reviews, food events delhi, cocktail events, blind tasting, blind folded dinner, best brunches in delhi, food community delhi, delhi food events, mumbai food events, restaurant marketing, cocktail making workshops, largest food community india, cooking classes delhi, delhifood, sharing, restaurant, zomato, restaurant delhi, near, discover, times city, events, blind tasting, street, burrp, yelp, delhi event, mumbai event"> 
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"/>
      <link type="text/css" rel="stylesheet" href="../css/app.css"/>
      <link rel="shortcut icon" href="../img/favicon.png" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-60524336-1', 'auto');
        ga('send', 'pageview');

      </script>
      <style>
        .red-c{
          color: #3c3c3c;
        }
        .red-c label{
          font-size: 16px !important;
          color: #424242 !important;
        }
        .card{
          padding: 0 0 30px 0 !important;
        }
        .spc{
          padding: 0 20px;
        }
        .spac{
          margin-bottom: 40px;
        }
        
        .btn{
          margin: 0 .75rem;
        }
        .error{
          color: red;
        }
        .intro img{
          width: 100%;
          height: auto;
        }
        .container{
        	padding: 0 !important;
        }
        .divider {
		    height: 1px !important;
		    overflow: hidden;
		    background-color: #1BD6C4 !important;
		    margin: 20px !important;
		}
		h6{
			font-size: 16px;
			margin-bottom: 30px;
			margin-top: 30px;
		}
      </style>
    </head>
    <body>
      <!-- Google Tag Manager -->
  <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MQQHDN"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-MQQHDN');</script>
  <!-- End Google Tag Manager -->
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper">
            <a href="../index.html" class="brand-logo"><strong>FOOD</strong>TALK</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="../index.html">Home</a></li>
              <!-- <li><a href="delhilive/index.html">Festival</a></li> -->
              <li class="active"><a href="../experience.html">Events</a></li>
              <li><a href="http://www.foodtalkplus.com/" target="_blank">App <sub>BETA</sub></a>
              <li><a href="../service.html">Services</a></li>
              <li><a href="../contact.html">Contact</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="../index.html">Home</a></li>
              <!-- <li><a href="delhilive/index.html">Festival</a></li> -->
              <li class="active"><a href="../experience.html">Events</a></li>
              <li><a href="http://www.foodtalkplus.com/" target="_blank">App <sub>BETA</sub></a>
              <li><a href="../service.html">Services</a></li>
              <li><a href="../contact.html">Contact</a></li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="container">       
        <div class="row">
          <div class="col s12 m10 offset-m1 l10 offset-l1 ">
            <div class="red-c">
              <form action="" method="post" id="frm">
                  <div class="card">
                    <div class="intro">
                      <img src="bg.jpg" alt="" class="responsive-img">
                    </div>
                    <div class="col s12 m12 l12 center-align spac">
                      <h4>RSVP to get on the list</h4>
                      <h5>#LiquidStudio</h5>
                      <h5> India's most interactive bar concept comes to Mumbai.</h5>
                      
                      <div class="col l12 m12 s12" style="font-size:13px">
                        <div class="col l4 m4 s6 center-align numon">
                          <i class="small mdi-action-event"></i>
                          <p class="center">Friday, 5th Feb`16</p>
                        </div>
                        <div class="col l4 m4 s6 center-align numon">
                          <i class="small mdi-action-schedule"></i>
                          <p class="center">9:00 PM Onwards<br></p>
                        </div>
                        <div class="col l4 m4 s12 center-align numon">
                          <i class="small mdi-maps-place"></i>
                          <p class="center">AER, Four Seasons</p>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row spc">
                    	<div class="col s12 m12 l12">
                    		<div class="col s12 m6 l6">
		                      <label for="name" class=""> Name * <span class="error hide" id="e-n">field can't be empty</span></label>
		                      <input type="text" name="name" id="name"  class="validate" required>
			                 </div>
	                        <div class="col s12 m6 l6">
	                          <label for="email" class=""> Email * <span class="error hide" id="e-e">field can't be empty</span></label>
	                          <input type="email" name="email" id="email"  class="validate" required>
	                        </div>
	                        <div class="col s12 m6 l6">
	                          <label for="phone" class=""> Phone Number * <span class="error hide" id="e-p">field can't be empty</span></label>
	                          <input type="tel" name="phone" id="phone"  class="validate" required>
	                        </div>
	                        <div class="col s12 m6 l6">
                        	  <label>No. of Friends</label>
							  <select class="browser-default" name="meta1" id="meta1">
							  	<option value="0">0</option>
							    <option value="1">1</option>
							    <option value="2">2</option>
							    <option value="3">3</option>
							  </select>
	                        </div>
                        </div>
                    </div>

                    
                      <div class="col s12 m12 l12 padd">
                        <button class="btn waves-effect waves-light right" type="submit" id="submit_btn" name="action">Submit
                        </button>
                      </div>
                    </div>
                </div>
              </form>
              <div class="col s12 m12 l12 padd">
                <p class="grey-text text-lighten-1">Disclaimer : Alcohol will not be served to anyone below the legal drinking age</p>
              </div>
            </div>
            
          </div>
        </div>
        <div id="modal2" class="modal">
      <div class="modal-content">
        <h4>Oops!</h4>
        <p>Something Went Wrong</p>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
      </div>
    </div>
    
    
    </div>

          
      <footer class="foot">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="col s12 m4 l4 center-align"><a href="mailto:info@foodtalkindia.com" target="_top">info@foodtalkindia.com</a></div>
            <div class="col s12 m4 l4 center-align"><a href="tel:+911244225022">+91 124 422 5022</a></div>
            <div class="col s12 m4 l4 center-align"><a href="../index.html">© Digital Food Talk Pvt Ltd</a></div>
          </div>
        </div>
      </footer>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="js/flipclock.js"></script>
      
      <script type="text/javascript">
        $(document).ready(function(){
          $(".dropdown-button").dropdown({ hover: false });
          $(".button-collapse").sideNav();
          $('select').material_select();    
          $('.modal-trigger').leanModal();
          
          $("#submit_btn").on('click', function(event){
          event.preventDefault();  
          $(this).attr("disabled", "disabled");   
            var data = $('#frm').serializeArray();
            var fill = true;
            if(data[0]['value'] ==""){
              $('#e-n').removeClass('hide');
              fill = false;
            }else{
              $('#e-n').addClass('hide');
              fill = true;
            }
            if(data[1]['value'] ==""){
              $('#e-e').removeClass('hide');
              fill = false;
            }else{
              $('#e-e').addClass('hide');
              fill = true;
            }
            if(data[2]['value'] ==""){
              $('#e-p').removeClass('hide');
              fill = false;
            }else{
              $('#e-p').addClass('hide');
              fill = true;
            }
            
            if(fill == true){
 
              console.log(data);
                $.ajax({
                url: 'save.php',
                type: 'POST',
                dataType: 'json',
                data: data,
              })
              .done(function(response) {
                console.log(response);
                if (response == true) {
                  $('#frm')[0].reset();
                  url = "thanks.html";
                  $(location).attr("href", url);
                } else{
                  $('#modal2').openModal();
                };
              })
              .fail(function(response) {
                console.log(response);
              });
            }else{
              $("#submit_btn").attr("disabled", false);
            }
            
        });
        })
      </script>
    </body>
  </html>