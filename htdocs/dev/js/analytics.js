function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
} 

// Returns if a value is a string
function isString (value) {
  return typeof value === 'string' || value instanceof String;
};

var usermail = getCookie("usermail");
var userName = "XD";
var userLogedIn = false;

if (!usermail) { 
  userName = "tourist";
} else {
  userLogedIn = true;
  userName = decodeURIComponent(usermail);
}


angular.module('App', [
  'ngMaterial'
]);

angular.module('App').config(function($mdThemingProvider) {
  $mdThemingProvider.theme('default').primaryPalette('indigo');
})

angular.module('App').controller('AppCtrl', function(
    $scope,
    $mdToast,
    $http
  ){
  // toast message
  $scope.toast = function(message) {
    var toast = $mdToast.simple().content('You clicked ' + message).position('bottom right');
    $mdToast.show(toast);
    window.location.href=message;
  };
  // selected elements
  $scope.selected = [];
  $scope.toggle = function(record, list) {
    var idx = list.indexOf(record);
    if (idx > -1) list.splice(idx, 1);
    else list.push(record);
  };  

  $http.get("../api/ingredient/bread.php")
    .then(function (response) {$scope.breadData = response.data.records;
		$scope.breadData.forEach(function(item) {
			item.name = item.name.replace(/_/g,' ');
			item.name = item.name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
		});
	});

  $http.get("../api/allProducts.php")
    .then(function (response) {
      $scope.allProducts = response.data.records;
      $scope.allProducts.forEach(function(combo) {
        
        combo.meat_name = combo.meat_name.replace("[","").replace("]","").split(",");
        combo.meat_url = combo.meat_url.replace("[","").replace("]","").split(",");
        
        combo.cheese_name = combo.cheese_name.replace("[","").replace("]","").split(",");
        combo.cheese_url = combo.cheese_url.replace("[","").replace("]","").split(",");
        
        combo.vegetable_name = combo.vegetable_name.replace("[","").replace("]","").split(",");
        combo.vegetable_url = combo.vegetable_url.replace("[","").replace("]","").split(",");
        
        combo.sauce_name = combo.sauce_name.replace("[","").replace("]","").split(",");
        combo.sauce_url = combo.sauce_url.replace("[","").replace("]","").split(",");
        
        console.log(combo.meat_url);
      });
  });

  $http.get("../api/analytics.php")
    .then(function (response) {$scope.analyticsData = response.data.top3;
    // $scope.analyticsData.forEach(function(item) {
    //   item.name = item.name.replace(/_/g,' ');
    //   item.name = item.name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    // });
  });


  
  
  $scope.data = {
    title : "Borilliant Sandwich",
    userName : userName,
    toolbar: {
      buttons: [{
        name: 'Insight',
        icon: 'trending_up',
        link: 'analytics.html'
      }],
      menus: [{
        name: 'Menu',
        icon: 'account_circle',
        width: '4',
        actions: [{
          name: 'Login',
          message: '../user/logIn.html',
          completed: true,
          error: true
        }, {
          name: 'Sign Up',
          message: '../user/signUp.html',
          completed: true,
          error: true
        }, {
          name: 'Home Page',
          message: '../dev/main.html',
          completed: true,
          error: true
        }]
      }]
    }

  }


});


