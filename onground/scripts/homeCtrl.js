app.controller('homeCtrl', ['$scope','homeFact', 'authFact', function($scope,homeFact,authFact){
	$scope.couponcode = "";
	$scope.Iagree = false;
	$scope.couponDetails = {};
	$scope.alldatatrue = false;
	$scope.defaultpage = true;
	$scope.invaliddata = false;
	$scope.Reedeemfail = false;
	$scope.Reedeemsuccess = false;
	$scope.reedeemed = {};
	$scope.getCodeData = function(){
		if($scope.couponcode == ""){
			alert("Coupon code Can't be empty");
			return;
		}
		homeFact.getCodeData($scope.couponcode,function(response){
            if(response.data.code){
            	if(response.data.user){
            		if(response.data.storeOffer){
            			if(response.data.isUsed == false){
            				$scope.couponDetails = response.data;
            				$scope.defaultpage = false;
            				$scope.alldatatrue = true;
            				$scope.invaliddata = false;
            				$scope.Reedeemfail = false;
							$scope.Reedeemsuccess = false;
            				console.log($scope.couponDetails);
            			}else{
            				$scope.invaliddata = true;
            				$scope.alldatatrue = false;
            				$scope.defaultpage = false;
            				$scope.Reedeemfail = false;
							$scope.Reedeemsuccess = false;
            				console.log('isUsed');
            			}
            		}else{
            			$scope.invaliddata = true;
            			$scope.alldatatrue = false;
            			$scope.defaultpage = false;
            			$scope.Reedeemfail = false;
						$scope.Reedeemsuccess = false;
            			console.log('store offer closed');
            		}
            	}else{
            		$scope.invaliddata = true;
            		$scope.alldatatrue = false;
            		$scope.defaultpage = false;
            		$scope.Reedeemfail = false;
					$scope.Reedeemsuccess = false;
            		console.log('no user');
            	}
            }else{
            	$scope.invaliddata = true;
            	$scope.alldatatrue = false;
            	$scope.defaultpage = false;
            	$scope.Reedeemfail = false;
				$scope.Reedeemsuccess = false;
            	console.log('wrong coupon code');
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
				}else{
					console.log($scope.reedeemed.apiMessage);
					$scope.invaliddata = false;
	            	$scope.alldatatrue = false;
	            	$scope.defaultpage = false;
	            	$scope.Reedeemfail = true;
					$scope.Reedeemsuccess = false;
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
	return homeFact;
}])