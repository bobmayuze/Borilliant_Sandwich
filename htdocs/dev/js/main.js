// This function gets the username from the cookie
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

var usermail = getCookie("usermail");
var userName = "XD";
var userLogedIn = false;

// If no one is logged in show generic name
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

  // The following gets pull the data for the page
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
          message: '../main.html',
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
  
  $scope.printsol = {
	bread_qty: "",
	meat_qty: [],
	cheese_qty: [],
	vegetable_qty: [],
	sauce_qty: []
	
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
  
  // Hides the solution area initially
  var init = function() {
	document.getElementById('solution').className = "center ng-hide";
  }
  
  init();
  
  // random Integer return
  function getRandomInt(min, max) {
	if (max < min) {
		return 0;
	}
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  
  // Gets the username from the cookie
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

  // Arrays for random name generation
  var adjectives = ["adamant", "adroit", "amatory", "animistic", "antic", "arcadian", "baleful", "bellicose", "bilious", "boorish", "calamitous", "caustic", "cerulean", "comely", "concomitant", "contumacious", "corpulent", "crapulous", "defamatory", "didactic", "dilatory", "dowdy", "efficacious", "effulgent", "egregious", "endemic", "equanimous", "execrable", "fastidious", "feckless", "fecund", "friable", "fulsome", "garrulous", "guileless", "gustatory", "heuristic", "histrionic", "hubristic", "incendiary", "insidious", "insolent", "intransigent", "inveterate", "invidious", "irksome", "jejune", "jocular", "judicious", "lachrymose", "limpid", "loquacious", "luminous", "mannered", "mendacious", "meretricious", "minatory", "mordant", "munificent", "nefarious", "noxious", "obtuse", "parsimonious", "pendulous", "pernicious", "pervasive", "petulant", "platitudinous", "precipitate", "propitious", "puckish", "querulous", "quiescent", "rebarbative", "recalcitant", "redolent", "rhadamanthine", "risible", "ruminative", "sagacious", "salubrious", "sartorial", "sclerotic", "serpentine", "spasmodic", "strident", "taciturn", "tenacious", "tremulous", "trenchant", "turbulent", "turgid", "ubiquitous", "uxorious", "verdant", "voluble", "voracious", "wheedling", "withering", "zealous"];
  var nouns = ["ninja", "chair", "pancake", "statue", "unicorn", "rainbows", "laser", "senor", "bunny", "captain", "nibblets", "cupcake", "carrot", "gnomes", "glitter", "potato", "salad", "toejam", "curtains", "beets", "toilet", "exorcism", "stick figures", "mermaid eggs", "sea barnacles", "dragons", "jellybeans", "snakes", "dolls", "bushes", "cookies", "apples", "ice cream", "ukulele", "kazoo", "banjo", "opera singer", "circus", "trampoline", "carousel", "carnival", "locomotive", "hot air balloon", "praying mantis", "animator", "artisan", "artist", "colorist", "inker", "coppersmith", "director", "designer", "flatter", "stylist", "leadman", "limner", "make-up artist", "model", "musician", "penciller", "producer", "scenographer", "set decorator", "silversmith", "teacher", "auto mechanic", "beader", "bobbin boy", "clerk of the chapel", "filling station attendant", "foreman", "maintenance engineering", "mechanic", "miller", "moldmaker", "panel beater", "patternmaker", "plant operator", "plumber", "sawfiler", "shop foreman", "soaper", "stationary engineer", "wheelwright", "woodworkers"];

  // random name generation for single word
  function randomEl(list) {
    var i = Math.floor(Math.random() * list.length);
    return list[i];
  }
  
  // creates full random name
  function selectElementContents(el) {
    var range = document.createRange();
    range.selectNodeContents(el);
    var sel = window.getSelection();
    sel.removeAllRanges();
    sel.addRange(range);
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
	$scope.printsol.bread_qty = "";
	$scope.printsol.meat_qty = [];
	$scope.printsol.cheese_qty = [];
	$scope.printsol.vegetable_qty = [];
	$scope.printsol.sauce_qty = [];
	
    var luck = getRandomInt(0, $scope.bSelect.length-1);;
	var repeat;
	var i;
	var currid;
	// Bread, only one
	if ($scope.bSelect.length == 0) {
	} else {
	  $scope.solution.bread_qty = $scope.bSelect[luck];
	  $scope.solution.bread_id = $scope.bSelectId[luck];
	}
	// Meat
	if ($scope.mSelect.length == 0) {
	  
	} else {
	  repeat = getRandomInt(1, $scope.mSelect.length);
      for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(1, $scope.mSelect.length-1);
	    $scope.printsol.meat_qty.push($scope.mSelect[luck]);
		currid = parseInt($scope.mSelectId[luck]);
	    if ($scope.solution.meat_id.indexOf(currid) == -1) {
	      $scope.solution.meat_id.push(currid);
	      $scope.solution.meat_qty.push(1);
	    } else {
	      $scope.solution.meat_qty[$scope.solution.meat_id.indexOf(currid)] += 1; 
	    }
	  }
	}
	// Cheese
	if ($scope.cSelect.length == 0) {
	  
	} else {
	  repeat = getRandomInt(1, $scope.cSelect.length);
    for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(1, $scope.cSelect.length-1);
	    $scope.printsol.cheese_qty.push($scope.cSelect[luck]);
		currid = parseInt($scope.cSelectId[luck]);
	    if ($scope.solution.cheese_id.indexOf(currid) == -1) {
	      $scope.solution.cheese_id.push(currid);
	      $scope.solution.cheese_qty.push(1);
	    } else {
	      $scope.solution.cheese_qty[$scope.solution.cheese_id.indexOf(currid)] += 1; 
	    }
	  }
	}
	// Veggies
	if ($scope.vSelect.length == 0) {
	  
	} else {
	  repeat = getRandomInt(1, $scope.vSelect.length);
      for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(0, $scope.vSelect.length-1);
	    $scope.printsol.vegetable_qty.push($scope.vSelect[luck]);
		currid = parseInt($scope.vSelectId[luck]);
	    if ($scope.solution.vegetable_id.indexOf(currid) == -1) {
	      $scope.solution.vegetable_id.push(currid);
	      $scope.solution.vegetable_qty.push(1);
	    } else {
	      $scope.solution.vegetable_qty[$scope.solution.vegetable_id.indexOf(currid)] += 1; 
	    }
	  }
	}
	// Sauce
	if ($scope.sSelect.length == 0) {
	  
	} else {
	  repeat = getRandomInt(1, $scope.sSelect.length);
      for (i = 0; i < repeat; ++i) {
		luck = getRandomInt(0, $scope.sSelect.length-1);
	    $scope.printsol.sauce_qty.push($scope.sSelect[luck]);
		currid = parseInt($scope.sSelectId[luck]);
	    if ($scope.solution.sauce_id.indexOf(currid) == -1) {
	      $scope.solution.sauce_id.push(currid);
	      $scope.solution.sauce_qty.push(1);
	    } else {
	      $scope.solution.sauce_qty[$scope.solution.sauce_id.indexOf(currid)] += 1; 
	    }
	  }
	}
	
	// Stringify in here to make it easier
	$scope.solution.meat_qty = $scope.solution.meat_qty.toString();
	$scope.solution.cheese_qty = $scope.solution.cheese_qty.toString();
	$scope.solution.vegetable_qty = $scope.solution.vegetable_qty.toString();
	$scope.solution.sauce_qty = $scope.solution.sauce_qty.toString();
	$scope.solution.meat_id = $scope.solution.meat_id.toString();
	$scope.solution.cheese_id = $scope.solution.cheese_id.toString();
	$scope.solution.vegetable_id = $scope.solution.vegetable_id.toString();
	$scope.solution.sauce_id = $scope.solution.sauce_id.toString();
	
	var info = [$scope.solution, getCookie("usermail")];
	var data = {
		'info':info
	};
	document.getElementById('name').innerHTML = randomEl(adjectives)+' '+randomEl(nouns);
	selectElementContents(document.getElementById('name'));
	
	// Posts to the db the completed sandwich
	$http.post('../add_sandwich.php', {'comboJSON':$scope.solution, 'username':getCookie("usermail")})
      .success(function(data, status, headers, config) {
        console.log(status + ' - ' + data);
      }).error(function(data, status, headers, config) {
        console.log('error');
      });
	
	document.getElementById('solution').className = "center ng-show";	

  };
  

  
});


