angular.module('App', [
  'ngMaterial'
]);

angular.module('App').config(function($mdThemingProvider) {
  $mdThemingProvider.theme('default').primaryPalette('indigo');
})

angular.module('App').controller('AppCtrl', function($scope,$http) {
  
  $scope.selected = [];
  $scope.toggle = function(record, list) {

    var idx = list.indexOf(record);
    if (idx > -1) list.splice(idx, 1);
    else list.push(record);
  };  

  // $http.get("../api/readTable.php")
  // .then(function (response) {$scope.data = response.data.records;});
  // $http.get("../api/readTable.php")
  // .then(function (response) {$scope.bata = response.data.records;});

  $scope.testData = {
    "records": [
      {
        "name": "wheat_bread",
        "calories": "69",
        "pictureURL": "http://img.allw.mn/content/2013/11/24210219_6761.jpg"
      },
      {
        "name": "white_bread",
        "calories": "79",
        "pictureURL": "http://urbanwired.com/health/wp-content/uploads/sites/2/2017/01/e30eb4f2d73f1a3cc3614ba54f17b5e6.jpg"
      },
      {
        "name": "potato_bread",
        "calories": "85",
        "pictureURL": "https://cdn2.tmbi.com/TOH/Images/Photos/37/300x300/exps15220_RDS1338202D53A.jpg"
      },
      {
        "name": "rye_bread",
        "calories": "65",
        "pictureURL": "https://assets.marthastewart.com/styles/wmax-1500/d18/rye-bread-mblb2009/rye-bread-mblb2009_horiz.jpg?itok=gR0VGBrQ"
      },
      {
        "name": "gluten_free_bread",
        "calories": "70",
        "pictureURL": "https://img.aws.livestrongcdn.com/ls-article-image-673/ds-photo/getty/article/19/23/497687954.jpg"
      },
      {
        "name": "white_wrap",
        "calories": "70",
        "pictureURL": "http://img.taste.com.au/xzkCGkYB/w643-h428-cfill-q90/taste/2016/11/barbecue-beef-wraps-59449-1.jpeg"
      },
      {
        "name": "wheat_wrap",
        "calories": "100",
        "pictureURL": "http://images.media-allrecipes.com/userphotos/960x960/3758666.jpg"
      },
      {
        "name": "spinach_wrap",
        "calories": "130",
        "pictureURL": "http://images.appehtite.ca/images/5287_ml%20canned%20flakes%20ham%20cheese%20spinach%20wrap.jpg"
      },
      {
        "name": "tomato_wrap",
        "calories": "160",
        "pictureURL": "http://www.missionmenus.com/images/recipes/57/misn_wrap_sundriedtomatobasilpestochickenwrap__medium.jpg"
      },
      {
        "name": "gluten_free_wrap",
        "calories": "75",
        "pictureURL": "http://beyondmeat-uploads.s3.amazonaws.com/recipes/buffalo-gluten-free-chicken-wrap/Buffalo-Gluten-Free-Wrap.jpg"
      }
    ]
  }
});