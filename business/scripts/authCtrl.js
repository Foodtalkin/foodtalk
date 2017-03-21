app.controller('authCtrl', ['$scope','authFact','$location','$state', function($scope,authFact,$location,$state){
	$scope.email = "";
	$scope.password = "";
	
	$scope.doLogin = function(){
		if($scope.email == "" || $scope.email == ""){
			alert('email cannot be empty');
		}else{
			if($scope.password == "" || $scope.password == ""){
				alert('password cannot be empty');
			}else{
				authFact.doLogin($scope.email, $scope.password, function(response){
					if(response){
						$state.go('offers');
					}else{
						$state.go('login');
					}
				})
			}
		}
	}
}]);


app.factory('authFact', ['$http', '$cookies','$location','$state','urlFact', function($http, $cookies,$location,$state,urlFact){
	var auth = {};
	auth.doLogin = function(email, pass, callback){
		$http({
			method :'POST',
			url: urlFact.login,
			data: {
				email:email, 
				password:pass
			}
		}).then(function(response) {
			if(response.data.code == "200"){
				$cookies.put("APISESSID",response.data.result.APISESSID);
				$cookies.put("email",response.data.result.email);
				$cookies.put("restaurantName",response.data.result.restaurantName);
				//console.log(response);
				callback(true);
			}else{
				callback(false);
				alert('Somthing went Wrong');
			}
			
		}, function(error){
			console.log(error);
			if(error.status == 401){
				callback(false);
				alert('Authentication error!');
			}
		})
	}


	auth.logout = function(callback){
	    $cookies.remove("email");
	    $cookies.remove("restaurantName");
	    $cookies.remove("APISESSID");
	    $state.go('login');
	    return true;
	}
	return auth;
}])