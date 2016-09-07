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
app.controller('slidectrl', ['$scope', 'timeFunctions','$rootScope','$stateParams','$state','dataFact','$q','$timeout','$interval', 
                    function($scope, timeFunctions, $rootScope,$stateParams,$state, dataFact, $q, $timeout,$interval){
  var dataconfig = $stateParams;
  $rootScope.configration = dataconfig;
  $scope.promisemain = {};
  $scope.sorteddata = getData(dataconfig);
  init($rootScope.configration);
  // $interval(init($rootScope.configration),60000);
  $interval(function() {
     getData( $rootScope.configration).then(function (response) {
        console.log('calling');
        var imgdata = convert(response);        
        var finalslides = insertAds (imgdata, imgdata.length);
        $interval.cancel($scope.promisemain);
        displaySlides(finalslides);
      }, function (err) {
         // console.log(err);
         init($rootScope.configration);
         $scope.sorteddata.then(function (response) {
            var imgdata = convert(response);        
            var finalslides = insertAds (imgdata, imgdata.length);
            $interval.cancel($scope.promisemain);
            displaySlides(finalslides);
         }, function (err) {
            /* body... */ 
         })
      });
  },60000);
  //Main function wrapper - this does everything
  function init (config) {
    getData(config).then(function (response) {
        console.log($scope.promisemain);
        var imgdata = convert(response);        
        var finalslides = insertAds (imgdata, imgdata.length);
        // $interval.cancel($scope.promisemain);
        displaySlides(finalslides);
      }, function (err) {
         // console.log(err);
         init($rootScope.configration);
         $scope.sorteddata.then(function (response) {
            var imgdata = convert(response);        
            var finalslides = insertAds (imgdata, imgdata.length);
            $interval.cancel($scope.promisemain);
            displaySlides(finalslides);
         }, function (err) {
            /* body... */ 
         })
      });
    
  }

  // getting data from server

  function getData(config) {
    if(config.type == 1){
      
      return dataFact.getrestropost(config.id)
      .then(function (response) {

         return response.images;
      }, function (err) {
         console.log(err);
      })
    }else {
      return dataFact.getlatestpost()
      .then(function (response) {
        
         return response.posts;
      }, function (err) {
         /* body... */ 
      })
    }
    
  }

  // converting data from server
  function convert (jsonData) {
    var imgobj = [];
      angular.forEach(jsonData, function(element,index) {
        if(element.restaurantName == ''){
          var rest = '';
        }else{
          var rest = ' @ '+element.restaurantName;
        }
        var temp = {
            id: element.id,
            userimage: element.userImage,
            username: element.userName,
            restro: rest,
            image: element.postImage,
            rating: element.rating,
            dishname: element.dishName,
            actv:false
          };
        imgobj.push(temp);
      });
      return imgobj;
  }
  
  // insert ads
  function insertAds (slidearray, count) {
    
    var slide = [];
    var ind = 1;
    var adpoint = [];
    var ads = {
               id: ind,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
    if(count == 20){
      adpoint = [0,6,12,18];
    }else if (count == 15 || count > 15) {
      adpoint = [0,6,12];
    }else if (count == 10 || count > 10) {
      adpoint = [0,6];
    }else if (count == 5 || count > 5) {
      adpoint = [0];
    }

    angular.forEach(adpoint, function(element, index) {
      // console.log(adpoint);
      ind = element;
      
      if(adpoint.indexOf(ind) != -1){
        slidearray.splice(ind, 0, ads);
      }
      
      });
    return slidearray;
  }


  // display function
  function displaySlides (slidearray) {
      var i = 0;
      var last = slidearray.length;
      $scope.slide = slidearray[i];
      $scope.promisemain = $interval(function () {
         i++;
         if(i == last){
          i = 0;
         }
         $scope.slide = slidearray[i];
      },5000);

  }
    
}]);

app.factory('dataFact', ['$http','$q', function($http,$q){
  var data = this;
  data.posts = {};
  data.getrestropost = function (id) {
     /* body... */ 
     var defer = $q.defer();
     $http({
      method: 'POST',
      url: 'http://52.74.136.146/index.php/service/restaurant/getImagePosts',
      data: { 
              "restaurantId": id,
              "recordCount":"20",
              "page":"1",
              "sessionId":"GUEST"
            }
     }).success(function (response) {
         data.posts = response;
         defer.resolve(response);
     }).error(function(err, status) {
       // defer.reject(err);
       throw err;
     })

     return defer.promise;
  }
  data.getlatestpost = function () {
     /* body... */ 
     var defer = $q.defer();
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
     }).success(function (response) {
         data.posts = response;
         defer.resolve(response);
     }).error(function(err, status) {
       // defer.reject(err);
       throw err;
     })
     return defer.promise;
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

