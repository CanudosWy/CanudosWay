var app = angular.module("app");
app.controller('lista', function($scope) {
	
	$scope.professores = [
    {id: 1, text: 'guest'},
    {id: 2, text: 'user'},
    {id: 3, text: 'customer'},
    {id: 4, text: 'admin'}
  ];

});