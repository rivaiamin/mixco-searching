var adminSeasonalityCtrl = function($http, $scope) {
	$scope.currentPage = 1;
	$scope.limit = 10;

	$http.get('/api/seasonality')
	.success(function (response) {
		$scope.seasonality = response.seasonality;
	})

	$scope.addSeasonality = function(input) {
		$http.post('/api/seasonality', input)
		.success(function (response) {
			UIkit.notify(response.message, response.status);
			if (response.status == 'success') {
				//console.log(response.seasonality);
				$scope.seasonality.push(response.seasonality);
				$scope.input = {};
				$('#seasonality').focus();
			}
		})
	}

	$scope.saveSeasonality = function(data, id) {
		return $http.put('/api/seasonality/'+id, data);
		/*.success(function (response) {
			UIkit.notify(response.message, response.status);
		})*/
	}

	$scope.deleteSeasonality = function(id) {
		var index = $scope.indexSearch($scope.seasonality, id);
		if (confirm('delete seasonality?')) {
			$http.delete('/api/seasonality/'+id)
			.success(function (response) {
				UIkit.notify(response.message, response.status);
				if (response.status == 'success') {
					//console.log(response.seasonality);
					$scope.seasonality.splice(index, 1);	
				}
			})
		}
	}
};