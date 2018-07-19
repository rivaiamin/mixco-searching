var adminFoodCtrl = function($http, $scope) {
	$scope.currentPage = 1;
	$scope.limit = 10;

	$http.get('/api/food')
	.success(function (response) {
		$scope.food = response.food;
	})

	$scope.addFood = function(input) {
		$http.post('/api/food', input)
		.success(function (response) {
			UIkit.notify(response.message, response.status);
			if (response.status == 'success') {
				//console.log(response.food);
				$scope.food.push(response.food);
				$scope.input = {};
				$('#code').focus();
			}
		})
	}
	$scope.saveFood = function(data, id) {
		return $http.put('/api/food/'+id, data);
		/*.success(function (response) {
			UIkit.notify(response.message, response.status);
		})*/
	}
	$scope.deleteFood = function(id) {
		var index = $scope.indexSearch($scope.food, id);
		if (confirm('delete food interest?')) {
			$http.delete('/api/food/'+id)
			.success(function (response) {
				UIkit.notify(response.message, response.status);
				if (response.status == 'success') {
					//console.log(response.food);
					$scope.food.splice(index, 1);	
				}
			})
		}
	}
};