app.controller('loginCtrl', ['$scope','authFact','$location', function($scope, authFact, $location){
	

	$scope.username = "";
	$scope.password = "";

	$scope.Login = function(){
		if($scope.username == ""){
			alert("User Name can't be empty");
			return;
		}else{
			if($scope.password == ""){
				alert("password can't be empty");
				return;
			}else{
				// call api
				authFact.doLogin($scope.username, $scope.password, function(response){
					//console.log(response);
					if(response.data.login == '1'){
						//console.log(response);
						$location.path('/home');
					}else{
						alert("Wrong UserName Password please try again")
					}
				})
			}
		}
	}
}]);

app.factory('authFact', ['$http','$cookies','$location', function($http, $cookies, $location){
	var authFact = {};

		authFact.doLogin = function(user, pass, callback){
			$http({
			method: 'POST',
			url: 'API/auth.php',
			data: {
					user: user,
					pass: pass
					},
    		headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).then(function (response) {
				if(response.data.login == '1'){
					$cookies.put("bizzuser", response.data.username);
				}
	            callback(response);
	        });
		}

		authFact.logout = function(callback){
			$cookies.remove("bizzuser");
		    $location.path('/login');
		    return true;
		}
	return authFact;
}])