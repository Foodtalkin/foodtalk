<?php
session_start(); 
  $url = null;
  $source = "Website";
      if($_GET['source']){
        $source = $_GET['source'];
      }
      if($_GET['url']){
        $url = $_GET['url'];
      }
      $_SESSION['SOURCE'] = $source;
      $_SESSION['URL'] = $url;
      
      if(!isset($_SESSION['SOURCE'])){
      header("Location:error.html");
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
      
     .padd{
      margin: 20px 0;
      color: #3c3c3c;
     }
     
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
    #login img{
      width: 250px;
      height: auto;
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
            <a href="../index.html" class="brand-logo" title="Largest Food Communtiy India"><strong>FOOD</strong>TALK</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse" title="Best Brunches in Delhi"><i class="mdi-navigation-menu"></i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="../index.html" title="Food Community Delhi">Home</a></li>
              <li><a href="../experience.html">Events</a></li>
              <li><a href="../service.html">Services</a></li>
              <li><a href="../contact.html">Contact</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="../index.html">Home</a></li>
              <li><a href="../experience.html">Events</a></li>
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
      	<div class="row">
          <div class="col s12 m12 l12 padd center">
            <h5>Plese login To continue</h5>
          </div>
         <div class="col s12 m12 l12 center" id="login">
          <a href="fbconfig.php">
           <img src="img/facebook-login-button.png" alt="">
          </a>
         </div> 
        </div>
      </div>
  

  
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      
      
    </body>
  </html>