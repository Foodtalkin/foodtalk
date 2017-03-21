app.controller('headerCtrl', ['$scope','authFact','$cookies', function($scope,authFact,$cookies){
	$scope.logout = function(){
		authFact.logout(function(response){
			
		});
	}
	$scope.username = $cookies.get('restaurantName');
}])