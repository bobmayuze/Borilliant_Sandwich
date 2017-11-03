angular.module('App', [
  'ngMaterial'
]);

angular.module('App').config(function($mdThemingProvider) {
  $mdThemingProvider.theme('default').primaryPalette('indigo');
})

angular.module('App').controller('AppCtrl', function($scope,$http) {
  $http.get("../api/readTable.php")
   .then(function (response) {$scope.data = response.data.records;});
});