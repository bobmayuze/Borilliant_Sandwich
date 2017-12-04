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
  };
  // selected elements
  $scope.vSelect = [];
  $scope.bSelect = [];
  $scope.mSelect = [];
  $scope.cSelect = [];
  $scope.sSelect = [];
  $scope.vSelectId = [];
  $scope.bSelectId = [];
  $scope.mSelectId = [];
  $scope.cSelectId = [];
  $scope.sSelectId = [];
  
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
  
  $http.get("../api/ingredient/cheese.php")
    .then(function (response) {$scope.cheeseData = response.data.records;
		$scope.cheeseData.forEach(function(item) {
			item.name = item.name.replace(/_/g,' ');
			item.name = item.name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
		});
	});
  
  $http.get("../api/ingredient/meat.php")
    .then(function (response) {$scope.meatData = response.data.records;
		$scope.meatData.forEach(function(item) {
			item.name = item.name.replace(/_/g,' ');
			item.name = item.name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
		});
	});
  
  $http.get("../api/ingredient/vegetable.php")
    .then(function (response) {$scope.vegetableData = response.data.records;
		$scope.vegetableData.forEach(function(item) {
			item.name = item.name.replace(/_/g,' ');
			item.name = item.name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
		});
	});
  
  $http.get("../api/ingredient/sauce.php")
    .then(function (response) {
		$scope.sauceData = response.data.records;
		$scope.sauceData.forEach(function(item) {
			item.name = item.name.replace(/_/g,' ');
			item.name = item.name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
		});
	});
  
  $scope.data = {
    title : "Borilliant Sandwich",
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
          name: 'Login/Signup',
          message: 'Please Login first',
          completed: true,
          error: true
        }, {
          name: 'Action 2',
          message: 'Action 2',
          completed: false,
          error: false
        }, {
          name: 'Action 3',
          message: 'Action 3',
          completed: true,
          error: true
        }]
      }]
    }
  }
  
  $scope.solution = {
	bread_qty: "",
	meat_qty: [],
	cheese_qty: [],
	vegetable_qty: [],
	sauce_qty: [],
	bread_id: 0,
	meat_id: [],
	cheese_id: [],
	vegetable_id: [],
	sauce_id: []
	
  }
  
  // Works with allowing clicks to bread
  $scope.breadClicked = function($event, ingredient, id) {
	if ($scope.bSelect.indexOf(ingredient) == -1) {
	  $event.currentTarget.className = "md-card-image card clicked";
	  $scope.bSelect.push(ingredient);
	  $scope.bSelectId.push(parseInt(id));
	} else {
	  $event.currentTarget.className = "md-card-image card";
	  $scope.bSelect.splice($scope.bSelect.indexOf(ingredient)-1, 1);
	  $scope.bSelectId.splice($scope.bSelectId.indexOf(parseInt(id))-1, 1);
	}
	
  };
  
  // Works with allowing clicks veggies
  $scope.veggieClicked = function($event, ingredient, id) {
	if ($scope.vSelect.indexOf(ingredient) == -1) {
	  $event.currentTarget.className = "md-card-image card clicked";
	  $scope.vSelect.push(ingredient);
	  $scope.vSelectId.push(parseInt(id));
	} else {
	  $event.currentTarget.className = "md-card-image card";
	  $scope.vSelect.splice($scope.vSelect.indexOf(ingredient), 1);
	  $scope.vSelectId.splice($scope.vSelectId.indexOf(parseInt(id))-1, 1);
	}
	
  };
  
  // Works with allowing clicks meat
  $scope.meatClicked = function($event, ingredient, id) {
	if ($scope.mSelect.indexOf(ingredient) == -1) {
	  $event.currentTarget.className = "md-card-image card clicked";
	  $scope.mSelect.push(ingredient);
	  $scope.mSelectId.push(parseInt(id));
	} else {
	  $event.currentTarget.className = "md-card-image card";
	  $scope.mSelect.splice($scope.mSelect.indexOf(ingredient), 1);
	  $scope.vSelectId.splice($scope.mSelectId.indexOf(parseInt(id))-1, 1);
	}
	
  };
  
  // Works with allowing clicks cheese
  $scope.cheeseClicked = function($event, ingredient, id) {
	if ($scope.cSelect.indexOf(ingredient) == -1) {
	  $event.currentTarget.className = "md-card-image card clicked";
	  $scope.cSelect.push(ingredient);
	  $scope.cSelectId.push(parseInt(id));
	} else {
	  $event.currentTarget.className = "md-card-image card";
	  $scope.cSelect.splice($scope.cSelect.indexOf(ingredient), 1);
	  $scope.cSelectId.splice($scope.cSelectId.indexOf(parseInt(id))-1, 1);
	}
	
  };
  
  // Works with allowing clicks to sauce
  $scope.sauceClicked = function($event, ingredient, id) {
	if ($scope.sSelect.indexOf(ingredient) == -1) {
	  $event.currentTarget.className = "md-card-image card clicked";
	  $scope.sSelect.push(ingredient);
	  $scope.sSelectId.push(parseInt(id));
	} else {
	  $event.currentTarget.className = "md-card-image card";
	  $scope.sSelect.splice($scope.sSelect.indexOf(ingredient), 1);
	  $scope.sSelectId.splice($scope.sSelectId.indexOf(parseInt(id))-1, 1);
	}
	
  };
  
  var init = function() {
	document.getElementById('solution').className = "center ng-hide";
  }
  
  init();
  
  function getRandomInt(min, max) {
	if (max < min) {
		return 0;
	}
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  
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
	alert(decodeURI(dc.substring(begin + prefix.length, end)));
    return decodeURI(dc.substring(begin + prefix.length, end));
}
  
  // Getting result
  $scope.randomize = function() {
	$scope.solution.bread_qty = "";
	$scope.solution.meat_qty = [];
	$scope.solution.cheese_qty = [];
	$scope.solution.vegetable_qty = [];
	$scope.solution.sauce_qty = [];
	$scope.solution.bread_id = 0;
	$scope.solution.meat_id = [];
	$scope.solution.cheese_id = [];
	$scope.solution.vegetable_id = [];
	$scope.solution.sauce_id = [];
	
    var luck = getRandomInt(0, $scope.bSelect.length-1);;
	var repeat;
	var i;
	// Bread, only one
	if ($scope.bSelect.length == 0) {
	  //$scope.solution.bread_qty = "None?";
	  //$scope.solution.bread_id = 0;
	} else {
	  $scope.solution.bread_qty = $scope.bSelect[luck];
	  $scope.solution.bread_id = $scope.bSelectId[luck];
	}
	// Meat
	if ($scope.mSelect.length == 0) {
	  //$scope.solution.meat_qty.push("None?");
	  //$scope.solution.meat_id.push(0);
	} else {
	  repeat = getRandomInt(1, $scope.mSelect.length);
      for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(1, $scope.mSelect.length-1);
	    $scope.solution.meat_qty.push($scope.mSelect[luck]);
	    $scope.solution.meat_id.push($scope.mSelectId[luck]);
	  }
	}
	// Cheese
	if ($scope.cSelect.length == 0) {
	  //$scope.solution.cheese_qty.push("None?");
	  //$scope.solution.cheese_id.push(0);
	} else {
	  repeat = getRandomInt(1, $scope.cSelect.length);
    for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(1, $scope.cSelect.length-1);
	    $scope.solution.cheese_qty.push($scope.cSelect[luck]);
	    $scope.solution.cheese_id.push($scope.cSelectId[luck]);
	  }
	}
	// Veggies
	if ($scope.vSelect.length == 0) {
	  //$scope.solution.vegetable_qty.push("None?");
	  //$scope.solution.vegetable_id.push(0);
	} else {
	  repeat = getRandomInt(1, $scope.vSelect.length);
      for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(0, $scope.vSelect.length-1);
	    $scope.solution.vegetable_qty.push($scope.vSelect[luck]);
	    $scope.solution.vegetable_id.push($scope.vSelectId[luck]);
	  }
	}
	// Sauce
	if ($scope.sSelect.length == 0) {
	  //$scope.solution.sauce_qty.push("None?");
	  //$scope.solution.sauce_id.push(0);
	} else {
	  repeat = getRandomInt(1, $scope.sSelect.length);
      for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(0, $scope.sSelect.length-1);
	    $scope.solution.sauce_qty.push($scope.sSelect[luck]);
	    $scope.solution.sauce_id.push($scope.sSelectId[luck]);
	  }
	}
	
	
	var info = [$scope.solution, getCookie("usermail")];
	var data = {
		'info':info
	};
	$http.post('../add_sandwich.php', {'comboJSON':$scope.solution, 'username':getCookie("usermail")})
      .success(function(data, status, headers, config) {
        console.log(status + ' - ' + data);
      }).error(function(data, status, headers, config) {
        console.log('error');
      });
	  
	
	document.getElementById('solution').className = "center ng-show";	

  };
  
  
  
});


