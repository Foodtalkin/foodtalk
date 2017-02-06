var app = angular.module('OnGroundOffers',['ngRoute','ngCookies']);

app.run(function($rootScope){
	
});
app.config(['$routeProvider','$httpProvider',function($routeProvider, $httpProvider) {
	$httpProvider.defaults.headers.common = {};
	$httpProvider.defaults.headers.post = {};
	$httpProvider.defaults.headers.put = {};
	$httpProvider.defaults.headers.patch = {};
	$httpProvider.defaults.headers.get = {};
	delete $httpProvider.defaults.headers.common["X-Requested-With"];

	$routeProvider.
	when('/login',{
		templateUrl: 'views/login.html',
        controller: 'loginCtrl',
        resolve: {
                    factory: checkRouting
                }
	}).
	when('/home',{
		templateUrl: 'views/home.html',
        controller: 'homeCtrl',
        resolve: {
                    factory: checkRouting
                }
	}).
	when('/recoverPassword',{
		templateUrl: 'views/recoverpw.html',
        controller: 'rePwCtrl'
	}).
	otherwise({
	    redirectTo: '/login'
	});
}]);


var checkRouting = function ($location, $cookies) {    
    if ($cookies.get("bizzuser")) {
        return true;
    } else {
        $location.path("/login");
    }
};