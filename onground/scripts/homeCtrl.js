app.controller('homeCtrl', ['$scope','homeFact', 'authFact', '$window', function($scope,homeFact,authFact,$window){
	$scope.couponcode = "";
	$scope.Iagree = false;
	$scope.couponDetails = {};
	$scope.alldatatrue = false;
	$scope.defaultpage = true;
	$scope.invaliddata = false;
	$scope.couponisused = false;
	$scope.Reedeemfail = false;
	$scope.Reedeemsuccess = false;
	$scope.couponInput = true;
	$scope.reedeemed = {};
	$scope.focus = true;

	$scope.stats = {};
	homeFact.getstatus(function(response){
		$scope.stats = response.data.storeOffers;
		console.log($scope.stats);
	})

	var myin = $window.document.getElementById('myinput');
        if(myin){
        	myin.focus();
        }
          
    $scope.newCode = function(){
    	$scope.couponcode = "";
		$scope.Iagree = false;
		$scope.couponDetails = {};
		$scope.alldatatrue = false;
		$scope.defaultpage = true;
		$scope.invaliddata = false;
		$scope.couponisused = false;
		$scope.Reedeemfail = false;
		$scope.Reedeemsuccess = false;
		$scope.couponInput = true;
		$scope.reedeemed = {};
		$scope.focus = true;
    }
	$scope.getCodeData = function(){
		if($scope.couponcode == ""){
			alert("Coupon code Can't be empty");
			return;
		}
		homeFact.getCodeData($scope.couponcode,function(response){
            if(response.data.code){
            	// code exist
            	if(response.data.user){
            		// user atteched to code
            		if(response.data.storeOffer){
            			// store offer is live
            			if(response.data.isUsed == false){
            				// coupon code not used
            				$scope.couponDetails = response.data;
            				$scope.defaultpage = false;
            				$scope.alldatatrue = true;
            				$scope.invaliddata = false;
            				$scope.Reedeemfail = false;
							$scope.Reedeemsuccess = false;
							$scope.couponisused = false;
							$scope.couponInput = false;
            				console.log($scope.couponDetails);
            			}else{
            				// is used
            				$scope.invaliddata = false;
            				$scope.couponisused = true;
            				$scope.alldatatrue = false;
            				$scope.defaultpage = false;
            				$scope.Reedeemfail = false;
							$scope.Reedeemsuccess = false;
							$scope.couponInput = false;
            				console.log('isUsed');
            				$scope.errorMsg = "This coupon code is already used";
            			}
            		}else{
            			// store offer not live
            			$scope.invaliddata = true;
            			$scope.alldatatrue = false;
            			$scope.defaultpage = false;
            			$scope.Reedeemfail = false;
						$scope.Reedeemsuccess = false;
						$scope.couponisused = false;
						$scope.couponInput = false;
            			console.log('store offer closed');
            			$scope.errorMsg = "This offer is closed for sale";
            		}
            	}else{
            		// no user atteched
            		$scope.invaliddata = true;
            		$scope.alldatatrue = false;
            		$scope.defaultpage = false;
            		$scope.Reedeemfail = false;
					$scope.Reedeemsuccess = false;
					$scope.couponisused = false;
					$scope.couponInput = false;
            		console.log('no user');
            		$scope.errorMsg = "This coupon code is Not valid";
            	}
            }else{
            	// code not exist
            	$scope.invaliddata = true;
            	$scope.alldatatrue = false;
            	$scope.defaultpage = false;
            	$scope.Reedeemfail = false;
				$scope.Reedeemsuccess = false;
				$scope.couponisused = false;
				$scope.couponInput = false;
            	console.log('wrong coupon code');
            	$scope.errorMsg = "This coupon code is Not valid";
            }
		});
		
	}

	$scope.Reedeemcoupon = function(){
		if($scope.Iagree){
			homeFact.Reedeemcoupon($scope.couponcode, function(response){
				$scope.reedeemed = response.data;
				if($scope.reedeemed.status == "OK"){
					console.log($scope.reedeemed.apiMessage);
					$scope.invaliddata = false;
	            	$scope.alldatatrue = false;
	            	$scope.defaultpage = false;
	            	$scope.Reedeemfail = false;
					$scope.Reedeemsuccess = true;
					$scope.Iagree = false;
					$scope.couponisused = false;
					$scope.couponInput = false;
				}else{
					console.log($scope.reedeemed.apiMessage);
					$scope.invaliddata = false;
	            	$scope.alldatatrue = false;
	            	$scope.defaultpage = false;
	            	$scope.Reedeemfail = true;
					$scope.Reedeemsuccess = false;
					$scope.Iagree = false;
					$scope.couponisused = false;
					$scope.couponInput = false;
					$scope.errorMsg = "Oops! somthing went wrong.";
				}
			})
		}
	}

	$scope.logout = function(){
		authFact.logout(function(){

		});
	}

}]); //end



app.factory('homeFact', ['$http','$q', function($http,$q){
	var homeFact = {};

	homeFact.getCodeData = function(code,callback){
		$http({
			method: 'POST',
			url: 'http://52.74.136.146/index.php/service/storeOffer/getCoupon',
			data: {
					sessionId:"GUEST",
					code:code
					}
		}).then(function (response) {
            callback(response);
          });
	}

	homeFact.Reedeemcoupon = function(code,callback){
		$http({
			method: 'POST',
			url: 'http://52.74.136.146/index.php/service/storeOffer/redeemCoupon',
			data: {
					sessionId:"GUEST",
					code:code
					}
		}).then(function (response) {
            callback(response);
        });
	}

	homeFact.getstatus = function(callback){
		$http({
			method: 'POST',
			url: 'http://52.74.136.146/index.php/service/storeOffer/list',
			data: {
					sessionId:"GUEST",
					type: "DINE-IN"
					}
		}).then(function (response) {
            callback(response);
        });
	}
	return homeFact;
}])