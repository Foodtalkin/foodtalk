<?php 
session_start();
  $toins = $_SESSION['toinsertdata'];
  //var_dump($toins ["payment_id"]);
        if($_GET['payment_id'] != null || isset($_GET['payment_id'])){
          $toins = json_decode($_SESSION['toinsertdata']);
          $toins = (array)$toins;
         $toins ["payment_id"] = $_GET['payment_id'];
        }
          $toupdate = json_encode($_SESSION['toupdate']);
          $ch = curl_init($_SESSION['URL_UPDATE']);                                                                      
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");                                                                     
          curl_setopt($ch, CURLOPT_POSTFIELDS, $toupdate);                                                                  
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
              'Content-Type: application/json',                                                                                
              'Content-Length: ' . strlen($toupdate))                                                                       
          );                                                                                                                   
          $result = curl_exec($ch);
          curl_close($ch);

          $toinsertdata = json_encode($toins);
          $ch1 = curl_init($_SESSION['URL_INSERT']);                                                                      
          curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
          curl_setopt($ch1, CURLOPT_POSTFIELDS, $toinsertdata);                                                                  
          curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);                                                                      
          curl_setopt($ch1, CURLOPT_HTTPHEADER, array(                                                                          
              'Content-Type: application/json',                                                                                
              'Content-Length: ' . strlen($toinsertdata))                                                                       
          );                                                                                                                   
          $result1 = curl_exec($ch1);
          curl_close($ch1);
    $icon = "";
    $msg = "";
      if ($_SESSION['type'] == "rsvp") {
        $icon = "img/seeyou.png";
        $msg = "Your name is on 'The List' <br>
                Please Note: Club Rules Apply**";
      } elseif ($_SESSION['type'] == "contest") {
        $icon = "img/goodluck.png";
        $msg = "Now that was a piece of cake right? <br>
                Stay tuned to know if you made it to 'The List'";
      } else{
        $icon = "img/goodluck.png";
        $msg = "Now that was a piece of cake right? <br>
                Stay tuned to know if you made it to 'The List'";
      } 
 


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
    #navButton{
    display: none;
    }
    </style>
  </head>
  <body>
    <div id="page-wrapper">

      <!-- Header -->
        <header id="header">
          <h1><a href="index.html">FOODTALK</a></h1>
          
        </header>

      <!-- Main -->
        <section id="main" class="container 75%">
          <!-- Header -->
          <section class="box special">
            <header class="major">
              <img src="<?php echo $icon; ?>" alt="">
              <h4><?php echo $msg; ?></h4>
            
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
            <li>&copy; Untitled. All rights reserved.</li>
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
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="assets/js/main.js"></script>
      
  </body>
</html>
<?php 
   $_SESSION['source'] = null;
  $_SESSION['target'] = null;
  $_SESSION['USER'] = null;
  session_unset();
  ?>