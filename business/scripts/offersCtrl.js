app.controller('offersCtrl', ['$scope','offersfact','$rootScope','$cookies', '$state',
 function($scope,offersfact, $rootScope, $cookies, $state){

  $scope.offerList = {};

	$rootScope.fetchHistory = function(){
		offersfact.getOfferList(function(response){
			$scope.offerList = response.data.result;
			//console.log(response);
			if($scope.offerList.length == 0){
				$scope.nodata = true;
			}
		});
	}
	$rootScope.fetchHistory();
	$scope.getHistory = function(id){
		offersfact.getHistory(id, function(response){
			console.log(response);
			$scope.history = response.data.result.redeemUsers;
			if($scope.history.length == 0){
				swal('Oops...', 'No Data to show!', 'error');
			}else{
				jQuery('#modal-history').modal('show');
			}

		})
	}
}]);


app.factory('offersfact', ['$http','urlFact', function($http,urlFact){
	var offer = {};
	offer.getOfferList = function(callback){
		$http({
			method :'POST',
			url: urlFact.offerList,
			data:{status : "active"}
		}).then(function(response){
			callback(response);
		},function(error){
			if(error.status == 401){
				console.log('Authentication error!');
			}
		})
	}

	offer.getHistory = function(id, callback){
		$http({
			method :'POST',
			url: urlFact.RedeemHistory,
			data:{storeItemId : id}
		}).then(function(response){
			callback(response);
		})
	}
	return offer;
}])
