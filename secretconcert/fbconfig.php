<?php
session_start();
if(!isset($_SESSION['SOURCE'])){
	header("Location:error.html");
}
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '567830766693152','1a65bcf7762bec777087a127d26d6295' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://foodtalkindia.com/secretconcert/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
      $gender = $graphObject->getProperty('gender');
      
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;
      $_SESSION['FULLNAME'] = $fbfullname;
      $_SESSION['EMAIL'] =  $femail;
      $_SESSION['GENDER'] =  $gender;
      include('functions.php');
      $con = connect($config);
      if(!$con) die("Connection to database died");

      $query = "SELECT * FROM user WHERE user_id = ".$_SESSION['FBID'];
      try {
      	$bind = array();
        $result = query($query, $bind, $con);
        if($result){
        	$_SESSION['NEW'] = false;
          // if (isset($_SESSION['URL'])) {
          //   header("Location: ". $_SESSION['URL']);
          // } else {
          //   header("Location: eventlist.php");
          // }
          header("Location: signup.php");
          
        }else{
          try {
              $query = "INSERT INTO user ( user_id, name, profile_pic, email, gender) VALUES ( :user_id, :name, :profile_pic, :email, :gender)";
              $bind = array('user_id'=> $fbid,
                  'name'=> $fbfullname,
                  'profile_pic'=>"https://graph.facebook.com/".$fbid."/picture",
                  'email'=> $femail,
                  'gender'=> $gender); 
                  $result = insertto($query, $bind, $con);
                  $_SESSION['NEW'] = true;
                  header("Location: signup.php");
              } catch (Exception $e) {
                echo $e;
              }
        	
        }
      } catch (Exception $e) {
        echo $e;
      }

  // header("Location: index.php");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>