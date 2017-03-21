app.controller('couponCtrl', ['$scope','couponFact','$window', '$rootScope',
 function($scope,couponFact,$window, $rootScope){
	$scope.details = {
		'coverImage' : "",
		'title' : "",
		'shortDescription' : ""
	}
	$scope.loading = false;
	$scope.cCode = "";
	$scope.iAgree = false;
	$scope.getCouponCode = function(){
		if($scope.cCode != ""){
			$scope.loading = true;
			couponFact.getCouponCode($scope.cCode, function(response) {
				console.log(response);
				if(response.data.message == "Error : Invalid Coupon code!"){
					swal('Oops...', 'Invalid Coupon code!', 'error');
					$scope.cCode = "";
					$scope.loading = false;
				}else{
					$scope.details = response.data.result;

					if($scope.details.isUsed == "1"){
						swal('Oops...', 'Coupon code Alredy Used!', 'error');
					$scope.cCode = "";
					$scope.loading = false;
					}else{
						jQuery('#modal-top').modal('show');
						$scope.loading = false;
					}
					
				}
			});	
		}else{
			alert('Coupon code Cannot be empty');
		}


        // Init SweetAlert
        // /sweetAlert();
	}

	$scope.reedeemCouponCode = function () {
		if($scope.iAgree){
			$scope.loading = true;
			couponFact.reedeemCouponCode($scope.cCode, function(response) {
				console.log(response);
				if(response.data.message == "Success"){
					$scope.details.coverImage = "";
					$scope.details.title = "";
					$scope.details.shortDescription = "";
					jQuery('#modal-top').modal('hide');
					swal('Success', 'Coupon reedeemed successfuly!', 'success');
					$scope.cCode = "";
					$scope.iAgree = false;
					//$rootScope.fetchHistory();
					$scope.loading = false;
				}else{
					$scope.details.coverImage = "";
					$scope.details.title = "";
					$scope.details.shortDescription = "";
					jQuery('#modal-top').modal('hide');
					swal('Oops...', 'Somthing Went Wrong! check history to see if coupon is reedeemed or not', 'error');
					$scope.cCode = "";
					$scope.iAgree = false;
					//$rootScope.fetchHistory();
					$scope.loading = false;
				}
			})
		}
	}
}]);

app.factory('couponFact', ['$http','urlFact', function($http,urlFact){
	var coupon = {};
	coupon.getCouponCode = function (code, callback) {
		$http({
			method : 'POST',
			url : urlFact.getCoupon,
			data : {
				code:code
			}
		}).then(function(response){
            callback(response);
		})
	}	

	coupon.reedeemCouponCode = function(code, callback) {
		$http({
			method : 'POST',
			url : urlFact.redeemCoupon,
			data : {
				code:code
			}
		}).then(function(response){
            callback(response);
		})
	}	
	return coupon;
}])