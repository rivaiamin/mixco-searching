var adminSpecialCtrl = function($http, $scope) {
	$scope.currentPage = 1;
	$scope.limit = 10;

	$http.get('/api/special')
	.success(function (response) {
		$scope.special = response.special;
	})

	$scope.addSpecial = function(input) {
		$http.post('/api/special', input)
		.success(function (response) {
			UIkit.notify(response.message, response.status);
			if (response.status == 'success') {
				//console.log(response.special);
				$scope.special.push(response.special);
				$scope.input = {};
				$('#code').focus();
			}
		})
	}
	$scope.saveSpecial = function(data, id) {
		return $http.put('/api/special/'+id, data);
		/*.success(function (response) {
			UIkit.notify(response.message, response.status);
		})*/
	}
	$scope.deleteSpecial = function(id) {
		var index = $scope.indexSearch($scope.special, id);
		if (confirm('delete special interest?')) {
			$http.delete('/api/special/'+id)
			.success(function (response) {
				UIkit.notify(response.message, response.status);
				if (response.status == 'success') {
					//console.log(response.special);
					$scope.special.splice(index, 1);	
				}
			})
		}
	}
};