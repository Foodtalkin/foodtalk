var app = angular.module('myApp',['ui.router'])

.config(['$stateProvider', '$urlRouterProvider','$httpProvider',function($stateProvider, $urlRouterProvider, $httpProvider) {
	$urlRouterProvider
        .otherwise('/app');

    $stateProvider
        .state('app', {
            url: "/app/:sessionid",
            templateUrl: "tpl/index.html",
            controller: "mainCtrl"
        })
        .state('open', {
            url: "/open/:id/:sessionid",
            templateUrl: "tpl/open.html",
            controller: "openCtrl"
        });

}])

.controller('mainCtrl', ['$scope', 'appFact', '$location','$state', '$stateParams', function($scope, appFact, $location, $state, $stateParams){
	$scope.eventList = {};
	$scope.sessionid = $stateParams.sessionid;
	appFact.getList(function(response){
		$scope.eventList = response.data.data.list;
		console.log($scope.eventList);
	});	
}])
.controller('openCtrl', ['$scope', 'appFact', '$location','$state', '$stateParams', function($scope, appFact, $location, $state, $stateParams){
	$scope.eventDetails = {};
	$scope.inviteButtonText = "Request Invite";
	$scope.inviteButtonColordefault = true;
	var myId = $stateParams.id;
	$scope.sessionid = $stateParams.sessionid;
	appFact.getList(function(response){
		
		angular.forEach(response.data.data.details, function(value, key) {
		  if(key == myId){
		  	$scope.eventDetails = value;
			console.log($scope.eventDetails);
		  }
		});
	});
	$scope.requestInvite = function(){
		appFact.requestInvite($scope.eventDetails.name, $scope.sessionid, function(response){
			console.log(response);
			if(response == true){
				$scope.inviteButtonText = "We have received your request";
				$scope.inviteButtonColordefault = false;
			}else{
				alert('Request cannot be completed due to network issues pleae try again')
			}
		})
	}
	
}])
.factory('appFact', ['$http', function($http){
	var appFact = {}
	appFact.getList = function(callback){
		$http.get('assets/js/EventList.json').then(function (response){
			callback(response);
		   },function (error){
		   	console.log(error);
		   })
	}
	appFact.requestInvite = function(e_name, sessid, callback){
		$http({
		      method: 'POST',
		      url: 'http://api.foodtalk.in/user/event?sessionid='+sessid,
		      data : {
		        'event_name' : e_name
		    }
	    }).then(function (response){
	    	if(response.data.code == "200"){
	    		callback(true);
	    	}else{
	    		callback(false);
	    	}
		},function (error){
		   	console.log(error);
		})
	}
	return appFact;
}])