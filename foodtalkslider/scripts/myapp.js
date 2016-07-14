var app = angular.module('myApp',['ui.router']);

app.run(function($rootScope){

});

app.config(function($stateProvider, $urlRouterProvider) {
  //
  // For any unmatched url, redirect to /state1
  $urlRouterProvider.otherwise("/login");
  //
  // Now set up the states
  $stateProvider
    .state('login', {
      url: "/login",
      templateUrl: "partials/login.html"
    })
    .state('setting', {
      url: "/list",
      templateUrl: "partials/setting.html",
      controller: 'settingCtrl'
    })
    .state('slideshow', {
      url: "/slideshow",
      templateUrl: "partials/slideshow.html"
    })
});

app.controller('settingCtrl', ['$scope', function($scope){

  $scope.fruits=['apple','mango','banana','strawberry','pineapple','pina colada','raspberry','cherry','peach','pear','apricot'];
  
}])