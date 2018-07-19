var adminCtrl = function($scope, $http) {
	$http.get('/api/dashboard')
	.success(function (response) {
		$scope.total 		= response;
	})
}