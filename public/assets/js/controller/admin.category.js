var adminCategoryCtrl = function($http, $scope) {
	$scope.currentPage = 1;
	$scope.limit = 10;

	$http.get('/api/category')
	.success(function (response) {
		$scope.category = response.category;
	})

	$scope.addCategory = function(input) {
		$http.post('/api/category', input)
		.success(function (response) {
			UIkit.notify(response.message, response.status);
			if (response.status == 'success') {
				//console.log(response.category);
				$scope.category.push(response.category);
				$scope.input = {};
				$('#code').focus();
			}
		})
	}
	$scope.saveCategory = function(data, id) {
		return $http.put('/api/category/'+id, data);
		/*.success(function (response) {
			UIkit.notify(response.message, response.status);
		})*/
	}
	$scope.deleteCategory = function(id) {
		var index = $scope.indexSearch($scope.category, id);
		if (confirm('delete category?')) {
			$http.delete('/api/category/'+id)
			.success(function (response) {
				UIkit.notify(response.message, response.status);
				if (response.status == 'success') {
					//console.log(response.category);
					$scope.category.splice(index, 1);	
				}
			})
		}
	}
};