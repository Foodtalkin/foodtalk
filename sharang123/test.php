<?php 
  include('functions.php');
  $con = connect($config);
  if(!$con) die('No database connection available');
  
  $query1 = "SELECT count(*) FROM collected_data
            WHERE event1 = 'Liquid Studio Mumbai #3 at AER' ";
  $bind1 = array();
  $count = query($query1, $bind1, $con);


  $query = "SELECT meta1 FROM collected_data
            WHERE event1 = 'Liquid Studio Mumbai #3 at AER' ";
  $bind = array();
  $data = query($query, $bind, $con);
  $entries=(int) $count[0][0];
  $guest = 0;
  foreach ($data as $key) {
  	$guest = $key['meta1'] +$guest;
  }
  $rsvp = $guest+$entries;
  var_dump($rsvp);
?>