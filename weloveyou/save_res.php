<?php 

	

	include 'functions.php';

	date_default_timezone_set('Asia/Calcutta');



    try {

    	$con = connect($config);

    	if(!$con)die("Database connection aborted");

        $v1 ="no";
        $v2 ="no";
        $v3 ="no";
        $v4 ="no";
        $v5 ="no";
        $v6 ="no";
        $v7 ="no";
        $v8 ="no";
        $v9 ="no";
        $v0 ="no";

        if(isset($_POST['home_d'])){
            $v1 = "yes";
        }
        if(isset($_POST['nveg'])){
            $v2 = "yes";
        }
        if(isset($_POST['dinein'])){
            $v3 = "yes";
        }
        if(isset($_POST['outdoor'])){
            $v4 = "yes";
        }
        if(isset($_POST['ac'])){
            $v5 = "yes";
        }
        if(isset($_POST['bar'])){
            $v6 = "yes";
        }
        if(isset($_POST['microbrewery'])){
            $v7 = "yes";
        }
        if(isset($_POST['sheesha'])){
            $v8 = "yes";
        }
        if(isset($_POST['wifi'])){
            $v9 = "yes";
        }
        if(isset($_POST['l_music'])){
            $v0 = "yes";
        }
        


		$query = "INSERT INTO restaurants (name, phone, email, foodtalkid, e_name, cusine, address, e_phone, website, 
            cost, home_d, nveg, dinein, outdoor, ac, bar, microbrewery, sheesha, wifi, l_music, remarks)
         VALUES ( :name, :phone, :email, :foodtalkid, :e_name, :cusine, :address, :e_phone, :website, 
            :cost, :home_d, :nveg, :dinein, :outdoor, :ac, :bar, :microbrewery, :sheesha, :wifi, :l_music, :remarks)";

    	$bind = array('name'=>$_POST['name'],'phone'=>$_POST['phone'],'email'=>$_POST['email'],
        'foodtalkid'=> $_POST['foodtalkid'],'e_name'=> $_POST['e_name'], 'cusine'=> $_POST['cusine'],
        'address'=>$_POST['address'], 'e_phone'=> $_POST['e_phone'], 'website'=> $_POST['website'],
        'cost'=>$_POST['cost'],'home_d'=> $v1, 'nveg'=> $v2,'dinein'=> $v3,'outdoor'=> $v4,'ac'=> $v5,
        'bar'=> $v6,'microbrewery'=> $v7,'sheesha'=> $v8,
        'wifi'=> $v9,
        'l_music'=> $v0,
        'remarks'=>$_POST['remarks']); 

    	$result = insertto($query, $bind, $con);

    			echo "true";	

    } catch (Exception $e) {

    	echo $e;

    }

         



 ?>