var app = angular.module('myApp',['ui.router','ngCookies']);
app.config(function($stateProvider, $urlRouterProvider,$qProvider,$httpProvider){
        // $httpProvider.defaults.headers.common = {};
        // $httpProvider.defaults.headers.post = {};
        // $httpProvider.defaults.headers.put = {};
        // $httpProvider.defaults.headers.patch = {};
        // $httpProvider.defaults.headers.get = {};
        // delete $httpProvider.defaults.headers.common["X-Requested-With"];


	    $qProvider.errorOnUnhandledRejections(false);
        $httpProvider.interceptors.push('httpRequestInterceptor');
        
        $stateProvider
        
        // dashboard STATES AND NESTED VIEWS ========================================
        // .state('dashboard', {
        //     url: '/dashboard',
        //     views: {
        //     	'': { templateUrl: 'views/dashboard.html' },
        //     	'header@dashboard': { templateUrl: 'views/navs/header.html', controller:'headerCtrl' },
        //     	'sidebar@dashboard': { templateUrl: 'views/navs/sidebar.html', controller:'headerCtrl' },
        //     	'subnav@dashboard': { templateUrl: 'views/navs/subnav.html', controller:'headerCtrl' },
        //     	'couponcode@dashboard': { templateUrl: 'views/navs/couponcode.html', controller:'couponCtrl' }
        //     },
        //     resolve: {
        //             factory: checkRouting
        //         }
        // })

        .state('offers', {
            url: '/offers',
            views: {
            	'': { templateUrl: 'views/offers.html', controller:'offersCtrl' },
            	'header@offers': { templateUrl: 'views/navs/header.html', controller:'headerCtrl' },
            	'sidebar@offers': { templateUrl: 'views/navs/sidebar.html', controller:'headerCtrl' },
            	'subnav@offers': { templateUrl: 'views/navs/subnav.html', controller:'headerCtrl' },
            	'couponcode@offers': { templateUrl: 'views/navs/couponcode.html', controller:'couponCtrl' }
            },
            resolve: {
                    factory: checkRouting
                }
        })
        
        .state('login', {
            url: '/login',
            templateUrl: 'views/login.html',
            controller: 'authCtrl'
        });
        
        $urlRouterProvider.otherwise('/login');
});



//Login Check
var checkRouting = function ($location, $cookies, $state) {   
    if ($cookies.get("APISESSID")) {
        return true;
    } else {
        $state.go('login');
        return false;
    }
};

app.factory('httpRequestInterceptor', function ($cookies) {
  return {
    request: function (config) {
      //console.log(config.headers);
      var session = $cookies.get("APISESSID");
      if(session){
        config.headers['APISESSID'] = $cookies.get("APISESSID");
      }

      return config;
    }
  };
});


app.factory('urlFact', [function(){
    var url = {};
    var stg = "http://52.74.13.4/index.php/resto/";
    var main = "http://52.74.136.146/index.php/resto/";
    var baseurl = main;
    url.login = baseurl+"auth/login";
    url.getCoupon = baseurl+"storeOffer/getCoupon";
    url.redeemCoupon = baseurl+"storeOffer/redeemCoupon";
    url.offerList = baseurl+"storeOffer/list";
    url.RedeemHistory = baseurl+"storeOffer/RedeemHistory";
    return url;
}])
