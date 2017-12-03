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
        link: 'Button 1'
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
	bread: "",
	meat: [],
	cheese: [],
	veggies: [],
	sauce: []
	
  }
  
  // Works with allowing clicks to bread
  $scope.breadClicked = function($event, ingredient) {
	if ($scope.bSelect.indexOf(ingredient) == -1) {
	  $event.currentTarget.className = "md-card-image card clicked";
	  $scope.bSelect.push(ingredient);
	} else {
	  $event.currentTarget.className = "md-card-image card";
	  $scope.bSelect.splice($scope.bSelect.indexOf(ingredient)-1, 1);
	}
	
  };
  
  // Works with allowing clicks veggies
  $scope.veggieClicked = function($event, ingredient) {
	if ($scope.vSelect.indexOf(ingredient) == -1) {
	  $event.currentTarget.className = "md-card-image card clicked";
	  $scope.vSelect.push(ingredient);
	} else {
	  $event.currentTarget.className = "md-card-image card";
	  $scope.vSelect.splice($scope.vSelect.indexOf(ingredient), 1);
	}
	
  };
  
  // Works with allowing clicks meat
  $scope.meatClicked = function($event, ingredient) {
	if ($scope.mSelect.indexOf(ingredient) == -1) {
	  $event.currentTarget.className = "md-card-image card clicked";
	  $scope.mSelect.push(ingredient);
	} else {
	  $event.currentTarget.className = "md-card-image card";
	  $scope.mSelect.splice($scope.mSelect.indexOf(ingredient), 1);
	}
	
  };
  
  // Works with allowing clicks cheese
  $scope.cheeseClicked = function($event, ingredient) {
	if ($scope.cSelect.indexOf(ingredient) == -1) {
	  $event.currentTarget.className = "md-card-image card clicked";
	  $scope.cSelect.push(ingredient);
	} else {
	  $event.currentTarget.className = "md-card-image card";
	  $scope.cSelect.splice($scope.cSelect.indexOf(ingredient), 1);
	}
	
  };
  
  // Works with allowing clicks to sauce
  $scope.sauceClicked = function($event, ingredient) {
	if ($scope.sSelect.indexOf(ingredient) == -1) {
	  $event.currentTarget.className = "md-card-image card clicked";
	  $scope.sSelect.push(ingredient);
	} else {
	  $event.currentTarget.className = "md-card-image card";
	  $scope.sSelect.splice($scope.sSelect.indexOf(ingredient), 1);
	}
	
  };
  
  var init = function() {
	var hiding = 
	document.getElementById('solution').className = "center ng-hide";
  }
  
  init();
  
  function getRandomInt(min, max) {
	if (max < min) {
		return 0;
	}
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  
  // Getting result
  $scope.randomize = function() {
	$scope.solution.bread = "";
	$scope.solution.meat = [];
	$scope.solution.cheese = [];
	$scope.solution.veggies = [];
	$scope.solution.sauce = [];
	
    var luck = getRandomInt(0, $scope.bSelect.length-1);;
	var repeat;
	var i;
	// Bread, only one
	if ($scope.bSelect.length == 0) {
	  $scope.solution.bread = "None?";
	} else {
	  $scope.solution.bread = $scope.bSelect[luck];
	}
	// Meat
	if ($scope.mSelect.length == 0) {
	  $scope.solution.meat.push("None?");
	} else {
	  repeat = getRandomInt(1, $scope.mSelect.length);
      for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(1, $scope.mSelect.length-1);
	    $scope.solution.meat.push($scope.mSelect[luck]);
	  }
	}
	// Cheese
	if ($scope.cSelect.length == 0) {
	  $scope.solution.cheese.push("None?");
	} else {
	  repeat = getRandomInt(1, $scope.cSelect.length);
    for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(1, $scope.cSelect.length-1);
	    $scope.solution.cheese.push($scope.cSelect[luck]);
	  }
	}
	// Veggies
	if ($scope.vSelect.length == 0) {
	  $scope.solution.veggies.push("None?");
	} else {
	  repeat = getRandomInt(1, $scope.vSelect.length);
      for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(0, $scope.vSelect.length-1);
	    $scope.solution.veggies.push($scope.vSelect[luck]);
	  }
	}
	// Sauce
	if ($scope.sSelect.length == 0) {
	  $scope.solution.sauce.push("None?");
	} else {
	  repeat = getRandomInt(1, $scope.sSelect.length);
      for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(0, $scope.sSelect.length-1);
	    $scope.solution.sauce.push($scope.sSelect[luck]);
	  }
	}
	document.getElementById('solution').className = "center ng-show";	

  };
  
  
  
});


