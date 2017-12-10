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
  userName = "Tourst";
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


  $http.get("../api/activeUsers.php")
    .then(function (response) {
      $scope.userData = response.data.results;
      console.log(response.data.results);
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
  
 $scope.deletePerson = function() {
    var oldPeople = angular.copy($scope.userData);
    var remove = [];
    
    angular.forEach(oldPeople, function(value, key) {
      if (value.delete) {
        remove.push(value.id);
      }
      
    });
    
	$http.post('../api/deleteUser.php', {'idList':remove})
      .success(function(data, status, headers, config) {
        console.log(status + ' - ' + data);
		window.location.reload(true);
      }).error(function(data, status, headers, config) {
        console.log('error');
		window.location.reload(true);
      });
	
  };

});


