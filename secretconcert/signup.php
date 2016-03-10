<?php
session_start();
if(!isset($_SESSION['FBID'])){
  header("Location:error.html");
}
include('functions.php');
      $con = connect($config);
      if(!$con) die("Connection to database died");

      $query = "SELECT * FROM user WHERE user_id = ".$_SESSION['FBID'];
    try {
      $bind = array();
        $result = query($query, $bind, $con);
        
    } catch (Exception $e) {
      echo $e;
    }
?>
<!DOCTYPE html>
  <html>
    <head>
       <meta charset="UTF-8"/>
      <title>Secret Concert | Delhi Food Events| Mumbai Food Events | Food Talk India</title>
      <meta name="description" content="Food talk India organize each events like hand-crafted and customized it with a special theme, an innovative concept and an elaborate menu.">
      <meta name="author" content="Food Talk India">
      <meta name="keyword" content="food talk india, food groups delhi, restaurant reviews, food events delhi, cocktail events, blind tasting, blind folded dinner, best brunches in delhi, food community delhi, delhi food events, mumbai food events, restaurant marketing, cocktail making workshops, largest food community india, cooking classes delhi, delhifood, sharing, restaurant, zomato, restaurant delhi, near, discover, times city, events, blind tasting, street, burrp, yelp, delhi event, mumbai event"> 
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"/>
      <link rel="shortcut icon" href="../img/favicon.png" />
      <link type="text/css" rel="stylesheet" href="../css/app.css">
      <link rel="stylesheet" href="css/flipclock.css">
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
      #dropdown2{
      margin-top: 64px;}
      .mar{
        margin-top: 64px !important;
      }
      #dropdown1{
        z-index: 99999;
      }
      .nav1{
        z-index: 99999;
      }
      .nav2{
        z-index: 999;
      }
      .logo1{
        height: 160px;
        width: auto;
        margin: 0 auto;
      }

      .side-nav .fti{
        height: auto;
      }
      .side-nav .fti a{
        height: auto;
      }
      .red-c{
        /*background-color: rgb(210,35,42) !important;*/
        color: #3c3c3c;
        font-family: roboto;
        font-weight: 400;
      }
      input[type=number]::-webkit-inner-spin-button, 
      input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
      }
      .red-c label{
        font-size: 15px;
        color: #3c3c3c;

      }
      .red-c input,.red-c select{
        border-bottom: 1px solid #9e9e9e;
      }
      .red-c textarea{
        height: 50px;
        border: 0px;
        border-bottom: 1px solid #9e9e9e;
      }
      .lgo124 img{
        height: 70px;
        width: auto;
        display: inline !important;
      }
      
      .lgo124{
        text-align: center;
      }
     .btn{
      background-color: #724D51 !important;
      margin-top: 30px;
      float: right;
     }
     .padd{
      margin: 20px 0;
      color: #3c3c3c;
     }
     .pad-img{
      padding: 10px 20px !important;
     }
     
     .red-card{
        /*background-color: rgba(210,35,42,.8) !important;*/
        border: 7px solid rgba(210,35,42,.8);
        padding: 50px 50px;
        font-family: roboto;
        font-weight: 400;
     }
     .red-c{
     	padding:20px;
     	
      margin: 0px 20px;
     }
     .blur {
    -webkit-filter: blur(5px);
    filter: blur(5px);
}
     .clock{
      display: inline-block;
      margin: 5em 0;
     }

     /*input{
      background-color: #E6FBE0 !important;
     }

     input :hover{
      background-color: #fff !important;
     }

     input :active{
      background-color: #fff !important;
     }*/
     
     .intro img{
      width: 100%;
      height: auto;
     }
     .spac{
      margin-bottom: 30px;
      font-family: titillium3;
     }
     .bold1{
      font-weight: 900;
     }
     .li1{
      padding: 10px 30px !important;
     }
     .li1 ul li{
      list-style: disc;
     }
     .main12{
      color: #101010;
     }
     .btn123{
      width: 50px;
      height: auto;
     }
     .cover{
      width: 100% !important;
     }
     .logo12{
      width: 400px;
      height: auto;
     }
     .mb12{
       margin-bottom: 25px;
     }
     .red-d{
     	background-color: rgba(255,255,255,.4);
     	height: 100vh !important;
     	position: fixed;
     	top: 0;
     	-webkit-transform: translateX(-100%);
     	-ms-transform: translateX(-100%);
     	-o-transform: translateX(-100%);
     	transform: translateX(-100%);
     }
     html{
      background-image: url('bg2.png');
      background-repeat: no-repeat;
    background-attachment: fixed;
background-size: cover;
background-position: center; 

    }
    h6{
      font-size: 18.5px;
      line-height: 1.8rem;
      color: #000;
    }
    h6 , h5{
      color : #4C2F30 !important;
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
  });(window,document,'script','dataLayer','GTM-MQQHDN');</script>
  <!-- End Google Tag Manager -->
      <div class="navbar-fixed nav1">
        
        <nav>
          <div class="nav-wrapper">
            <a href="../index.html" class="brand-logo" title="Largest Food Communtiy India"><strong>FOOD</strong>TALK<strong>INDIA</strong></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse" title="Best Brunches in Delhi"><i class="mdi-navigation-menu"></i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="../index.html" title="Food Community Delhi">Home</a></li>
              <li class="active"><a href="festival_step2/index.html" title="Food Community Delhi">Festival</a></li>
              <li><a href="../experience.html">Events</a></li>
              <li><a href="../gallery.html">Gallery</a></li>
              <li><a href="../http://www.foodtalkplus.com/" target="_blank">App <sub>BETA</sub></a>
              <li><a href="../service.html">Services</a></li>
              <li><a href="../contact.html">Contact</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="../index.html">Home</a></li>
              <li class="active"><a href="festival_step2/index.html" title="Food Community Delhi">Festival</a></li>
              <li><a href="../experience.html">Events</a></li>
              <li><a href="../gallery.html">Gallery</a></li>
              <li><a href="../http://www.foodtalkplus.com/" target="_blank">App <sub>BETA</sub></a>
              <li><a href="../service.html">Services</a></li>
              <li><a href="../contact.html">Contact</a></li>
            </ul>
          </div>
        </nav>
      </div>
      
      <div>
        
      </div>
      <div class="intro">
        <img src="cover.png" class="responsive-img">
      </div>
      
      <div class="container">
      	<div class="row  padd">
         <div class="col s12 m10 offset-m1 l10 offset-l1 center-align main12">
          
           <h5>Secret Concert #4 with Run its the Kid</h5>
           <h6>By Pagal Haina Records in Association with Food Talk India </h6>
           <p>Date: Saturday, 30th Jan'16 <br>
           Time: 7:30pm <br>
           Venue:  Its a secret ;)</p>
           
         </div> 
        </div>

        <div class="row">
         
          <div class="col s12 m12 l12">
            <div class="red-c ">
              <form action="#" method="post" id="frm" >
                  <div class="col s12 m12 l12 center-align mb12">
                    <h5>To get Invited please leave your registration details below:</h5>
                  </div>
                  <div class="section"></div>
                  <div class="row">
                    <div class="col s12 m6 l6">
                      <label for="name">Your Name</label>
                      <input type="text" name="name" id="name" class="validate" value="<?php echo $result[0]['name']; ?>" required>
                    </div>
                    <div class="col s12 m6 l6">
                      <label for="email">Your Email</label>
                      <input type="email" name="email" class="validate" id="email" value="<?php echo $result[0]['email']; ?>" required>
                    </div>
                    <div class="col s12 m6 l6">
                      <label for="contact">Your Phone</label>
                      <input type="tel" name="contact" class="validate" id="contact" value="<?php echo $result[0]['contact']; ?>" required>
                    </div>
                    <div class="col s12 m6 l6">
                      <label for="dob">Date Of Birth</label>
                      <input type="date" name="dob" id="dob" class="validate" value="<?php echo $result[0]['dob']; ?>" required>
                    </div>
                    <div class="col s12 m6 l6">
                      <label for="response">No of seats</label>
                      <select name="response" id="response">
                        <option value="1">1</option>
                        <option value="2">2</option>
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m12 l12">
                    <button class="btn waves-effect waves-light" type="submit" id="submit_btn" name="action">Submit
                    </button>
                  </div>
              </form>
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
        </div>
      </div>
  

  
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
          $("#submit_btn").attr("disabled", "disabled");
          if ($('#name').val() != "" && $('#email').val() != "" && $('#contact').val() != "" && $('#dob').val() != "") {
              $("#submit_btn").attr("disabled", false);
            };
          $('#name, #email, #contact, #dob').on('keyup', function(event) {
            event.preventDefault();
            if ($('#name').val() != "" && $('#email').val() != "" && $('#contact').val() != "" && $('#dob').val() != "") {
              $("#submit_btn").attr("disabled", false);
            };
          });
    
          $("#submit_btn").on('click', function(event){
          event.preventDefault();  
          $(this).attr("disabled", "disabled");   
          var data = $('#frm').serializeArray();
            console.log(data);           
            $.ajax({
              url: 'save_user.php',
              type: 'POST',
              dataType: 'json',
              data: data
            })
            .done(function(response) {
                
                window.location.replace("thanks.php");
              
            })
            .fail(function(response) {
              //console.log(response);
            })
            .always(function(response) {
                        });
        });
        })
      </script>
    </body>
  </html>