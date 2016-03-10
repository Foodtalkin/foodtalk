<?php 
  include('functions.php');
  $con = connect($config);
  if(!$con) die('No database connection available');
  $bind = array();
  $query = "SELECT * FROM collected_data
            WHERE event1 = 'Liquid Studio Mumbai #3 at AER' ORDER BY id DESC";
  $result = query($query, $bind, $con);
  // $query1 = "SELECT count(*) FROM collected_data
  //           WHERE event1 = 'Liquid Studio Mumbai #3 at AER' ";
  // $bind1 = array();
  // $count = query($query1, $bind1, $con);
  // var_dump($count);
?>

<!DOCTYPE html>
  <html>
    <head>
      <title>Food Talk India | Food Community India</title>
      <meta name="description" content="An Invite-Only Social Food Community- where member’s come together to read and share genuine food experiences via real time recommendations.">
      <meta name="author" content="Food Talk India">
      <meta name="keyword" content="food talk india, food groups delhi, restaurant reviews, food events delhi, cocktail events, blind tasting, blind folded dinner, best brunches in delhi, food community delhi, delhi food events, mumbai food events, restaurant marketing, cocktail making workshops, largest food community india, cooking classes delhi, delhifood, sharing, restaurant, zomato, restaurant delhi, near, discover, times city, events, blind tasting, street, burrp, yelp, delhi event, mumbai event"> 
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <meta charset="UTF-8"/>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"/>
      <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!-- Include general styling -->
      <link type="text/css" rel="stylesheet" href="../css/app.css">
       <style>
        .brand-logo{margin-left: 20px;}
        .intro img {width: 100%;height: auto;}
        .page-footer, footer{margin-top: 0 !important;background-color: #616161 !important;}
        .footer-copyright p{margin-bottom: 10 !important;}
        .foot{padding-top: 0px !important;padding-bottom: 0 !important;}
        .foot1{margin-bottom: 0px !important;}
        .santa{
  display: inline-block;
  position: absolute;
  left: 190px;
}
.santa1{
  display: inline-block;
}
       </style>
    </head>
    <body>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper">
            <span class="santa1 hide-on-med-and-up right"></span>
            <a href="../index.html" class="brand-logo"><strong>FOOD</strong>TALK</a>
            <span class="santa hide-on-small-only"></span>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="../index.html">Home</a></li>
              <li><a href="../experience.html">Events</a></li>
              <li><a href="../service.html">Services</a></li>
              <li class="active"><a href="../contact.html">Contact</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="../index.html">Home</a></li>
              <!-- <li><a href="../delhilive/index.html">Festival</a></li> -->
              <li><a href="../experience.html">Events</a></li>
              <li><a href="../service.html">Services</a></li>
              <li class="active"><a href="../contact.html">Contact</a></li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="container">
      <div class="body">
        <div class="row">
          <div class="col s12 m12 l12">
<!--             <h6 class="right">Total Count </h6> -->
            <table class="highlight">
              <thead>
                <tr>
                    <th data-field="id">Name</th>
                    <th data-field="meta1">Number Of Guest</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($result as $key) { ?>
                <tr>
                  <td><?php echo($key['name']); ?></td>
                  <td><?php echo($key['meta1']); ?></td>
              </tr>
          <?php
            }
          ?>
              </tbody>
            </table>
            
          </div>
        </div>
      </div>
      </div>
    </div>
</div>
     
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <!-- Start jQuery code -->
      <script type="text/javascript">
        $(document).ready(function(){
          $(".button-collapse").sideNav();
          $("#frm").on('submit', function(event){
          event.preventDefault();          
          var data = $('#frm').serializeArray();
          $.post('save.php', data, function(d){
            console.log(d);
            if(d == "true"){
              window.location.replace("http://foodtalkindia.com");
          } 
          })
        });
        });
      </script>
     </body>
  </html>