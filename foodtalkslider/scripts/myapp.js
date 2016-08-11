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
  $scope.colormain = {'background-color':'#946183'};
  $scope.ftisldnum = [];
    mainfun();
    timeFunctions.$setInterval(mainfun, 300000, $scope);
  function mainfun () {
    $scope.slides = [];
    // console.log('loading');

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
          // console.log(response);
          sort(data);
      });
  }
  function getlatestpost () {
     dataFact.getlatestpost(function(response) {
          var data = response.data.posts;
          // console.log(response);
          sort(data);
    });
  }
  function sort (data) {
    var len = data.length;

    if(len == 20){
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
         if(postid == 6){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
         if(postid == 12){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
         if(postid == 18){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
         if(postid == 24){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
      });
    }else if(len > 15){
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
         if(postid == 6){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
         if(postid == 12){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
         if(postid == 18){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
      });
      var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
      $scope.slides.push(img1);
      $scope.ftisldnum.push(postid);
    }else if(len == 15){
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
         if(postid == 6){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
         if(postid == 12){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
         if(postid == 18){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
      });
    }else if(len > 10 ){
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
         if(postid == 6){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
         if(postid == 12){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
      });
      var img1 = {
         id: postid,
         userimage: "",
         username: "",
         restro: "",
         image: "img/slide.png",
         rating: false,
         dishname: "",
         actv:false
      }
      $scope.slides.push(img1);
      $scope.ftisldnum.push(postid);
    }else if (len == 10) {
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
         if(postid == 6){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
         if(postid == 12){
            var img1 = {
               id: postid,
               userimage: "",
               username: "",
               restro: "",
               image: "img/slide.png",
               rating: false,
               dishname: "",
               actv:false
            }
            $scope.slides.push(img1);
            $scope.ftisldnum.push(postid);
            postid = postid+1;
         }
      });
      
    }else{
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
      var img1 = {
         id: postid,
         userimage: "",
         username: "",
         restro: "",
         image: "img/slide.png",
         rating: false,
         dishname: "",
         actv:false
      }
      $scope.slides.push(img1);
      $scope.ftisldnum.push(postid);
    }
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
            // console.log($scope.ftisldnum.length);
            // angular.forEach($scope.ftisldnum, function(element, index) {
            //   console.log(element);
            //   if(element == $scope.i){
            //     $scope.colormain = {'background-color':'#67c2be'}
            //   }else{
            //     $scope.colormain = {'background-color':'#6c7b8a'};
            //   }
            // });
            if($scope.ftisldnum.indexOf($scope.i) != -1){
                $scope.colormain = {'background-color':'#49274a'}
              }else{
                $scope.colormain = {'background-color':'#946183'};
              }
          }else{
            index.actv = false;
          }
          
          });
          $scope.i = $scope.i+1;
       }
       // colorchange($scope.i);
    }
    function colorchange (sldnum) {
       if(sldnum == 1 || sldnum == 6 || sldnum == 11 || sldnum == 16 || sldnum == 21 || sldnum == 26){
          $scope.colormain = {'background-color':'#6c7b8a'}
       }else if(sldnum == 2 || sldnum == 7 || sldnum == 12 || sldnum == 17 || sldnum == 22 || sldnum == 27){
          $scope.colormain = {'background-color':'#ffed00'}
       }else if (sldnum == 3 || sldnum == 8 || sldnum == 13 || sldnum == 18 || sldnum == 23 || sldnum == 28) {
          $scope.colormain = {'background-color':'#005b7f'}         
       }else if (sldnum == 4 || sldnum == 9 || sldnum == 14 || sldnum == 19 || sldnum == 24 || sldnum == 29) {
          $scope.colormain = {'background-color':'#e54d4a'}         
       }else if (sldnum == 5 || sldnum == 10 || sldnum == 15 || sldnum == 20 || sldnum == 26 || sldnum == 30) {
          $scope.colormain = {'background-color':'#67c2be'}         
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

