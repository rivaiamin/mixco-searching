var adminBudgetCtrl = function($http, $scope) {
	$scope.currentPage = 1;
	$scope.limit = 10;

	$http.get('/api/budget')
	.success(function (response) {
		$scope.budget = response.budget;
	})

	$scope.addBudget = function(input) {
		$http.post('/api/budget', input)
		.success(function (response) {
			UIkit.notify(response.message, response.status);
			if (response.status == 'success') {
				//console.log(response.budget);
				$scope.budget.push(response.budget);
				$scope.input = {};
				$('#budget').focus();
			}
		})
	}
	$scope.saveBudget = function(data, id) {
		return $http.put('/api/budget/'+id, data);
		/*.success(function (response) {
			UIkit.notify(response.message, response.status);
		})*/
	}
	$scope.deleteBudget = function(id) {
		var index = $scope.indexSearch($scope.budget, id);
		if (confirm('hapus kategori?')) {
			$http.delete('/api/budget/'+id)
			.success(function (response) {
				UIkit.notify(response.message, response.status);
				if (response.status == 'success') {
					//console.log(response.budget);
					$scope.budget.splice(index, 1);	
				}
			})
		}
	}
};