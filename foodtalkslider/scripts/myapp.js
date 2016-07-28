var app = angular.module('myApp',['ui.router','ngAnimate','ui.bootstrap']);

app.run(function($rootScope){

});


app.config(function($stateProvider, $urlRouterProvider,$httpProvider) {
  $httpProvider.defaults.headers.common = {};
  $httpProvider.defaults.headers.post = {};
  $httpProvider.defaults.headers.put = {};
  $httpProvider.defaults.headers.patch = {};
  $httpProvider.defaults.headers.get = {};
  delete $httpProvider.defaults.headers.common["X-Requested-With"];


  //
  // For any unmatched url, redirect to /state1
  $urlRouterProvider.otherwise("/login");
  //
  // Now set up the states
  $stateProvider
    .state('login', {
      url: "/login",
      templateUrl: "partials/login.html",
      controller: 'authCtrl'
    })
    .state('setting', {
      url: "/settings",
      templateUrl: "partials/setting.html",
      controller: 'settingCtrl'
    })
    .state('slideshow', {
      url: "/slideshow",
      templateUrl: "partials/slideshow.html",
      controller: 'slidectrl',
      params: {
        'type': '1', 
        'id': '1', 
      }
    })
});
app.controller('authCtrl', ['$scope', '$state', function($scope,$state){
  $scope.authname = "foodtalk";
  $scope.authstring = "Dragon";
  $scope.loginerror = false;
  $scope.authCheck = function () {
     if($scope.user == $scope.authname){
        if($scope.pass == $scope.authstring){
          $state.go('setting');
        }else{
          $scope.loginerror = true;
        }
     }else{
      $scope.loginerror = true;
     }
  }
  
}])
app.controller('settingCtrl', ['$scope','dataFact','$rootScope','$state', function($scope, dataFact,$rootScope,$state){

  $scope.getdata = function () {
     /* body... */ 
     if($scope.apiType == '1'){
      $state.go('slideshow',{'type':$scope.apiType,'id':$scope.restroId});
     }else if ($scope.apiType == '2') {
      $state.go('slideshow',{'type':$scope.apiType,'id':$scope.restroId});
     }else{
      console.log('error');
     }
  }
  
  
  
}])
app.controller('slidectrl', ['$scope', 'timeFunctions','$rootScope','$stateParams','$state','dataFact', function($scope, timeFunctions, $rootScope,$stateParams,$state, dataFact){
  $scope.dataconfig = $stateParams;
  $scope.slides = [];

    mainfun();
    timeFunctions.$setInterval(mainfun, 300000, $scope);
  function mainfun () {
    $scope.slides = [];
    console.log('loading');
    if($scope.dataconfig.type == '2'){
     
      getlatestpost();
    }else if($scope.dataconfig.type == '1'){
      
      getrestropost($scope.dataconfig.id);
    }else{
      console.log('error');
    }
  }
   
  function getrestropost (id) {
     dataFact.getrestropost(id,function(response) {
          var data = response.data.images;
          // console.log(data);
          sort(data);
      });
  }
  function getlatestpost () {
     dataFact.getlatestpost(function(response) {
          var data = response.data.posts;
          sort(data);
    });
  }
  function sort (data) {
    var postid = 1;
     angular.forEach(data, function(index) {
      if(index.restaurantName == ''){
        var rest = '';
      }else{
        var rest = ' @ '+index.restaurantName;
      }
        
       var img = {
         id: postid,
         userimage: index.userImage,
         username: index.userName,
         restro: rest,
         image: index.postImage,
         rating: index.rating,
         dishname: index.dishName,
         actv:false
       }
       $scope.slides.push(img);
       postid = postid+1;
     });

     $scope.count = $scope.slides.length;
      $scope.i = 1;
     slider();
     timeFunctions.$setInterval(slider, 5000, $scope);
     function slider () {
        
      if($scope.i > $scope.count){
        $scope.i = 1;
       }else{
          angular.forEach($scope.slides, function(index, el) {
          if(index.id == $scope.i){
            index.actv = true;
          }else{
            index.actv = false;
          }
          
          });
          $scope.i = $scope.i+1;
       }
    }
  }

    
  
    
}]);

app.factory('dataFact', ['$http', function($http){
  var data = {};
  data.getrestropost = function (id, callback) {
     /* body... */ 
     $http({
      method: 'POST',
      url: 'http://52.74.136.146/index.php/service/restaurant/getImagePosts',
      data: { 
              "restaurantId": id,
              "recordCount":"20",
              "page":"1",
              "sessionId":"GUEST"
            }
     }).then(function (response) {
        /* body... */ 
        callback(response);
     })
  }
  data.getlatestpost = function (callback) {
     /* body... */ 
     $http({
      method: 'POST',
      url: 'http://52.74.136.146/index.php/service/post/list',
      data: { 
              "postUserId":"1",
              "includeCount":"1",
              "recordCount":"20",
              "page":1,
              "includeFollowed":"1",
              "sessionId":"GUEST"
            }
     }).then(function (response) {
        /* body... */ 
        callback(response);
     })
  }
  return data;
}])

app.factory('timeFunctions', [

  "$timeout",

  function timeFunctions($timeout) {
    var _intervals = {}, _intervalUID = 1;

    return {

      $setInterval: function(operation, interval, $scope) {
        var _internalId = _intervalUID++;

        _intervals[ _internalId ] = $timeout(function intervalOperation(){
            operation( $scope || undefined );
            _intervals[ _internalId ] = $timeout(intervalOperation, interval);
        }, interval);

        return _internalId;
      },

      $clearInterval: function(id) {
        return $timeout.cancel( _intervals[ id ] );
      }
    }
  }
]);

