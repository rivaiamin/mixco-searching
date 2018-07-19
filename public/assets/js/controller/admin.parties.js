var adminPartiesCtrl = function($http, $scope) {
	$scope.currentPage = 1;
	$scope.limit = 10;

	$http.get('/api/parties')
	.success(function (response) {
		$scope.parties = response.parties;
	})

	$scope.addParties = function(input) {
		$http.post('/api/parties', input)
		.success(function (response) {
			UIkit.notify(response.message, response.status);
			if (response.status == 'success') {
				//console.log(response.parties);
				$scope.parties.push(response.parties);
				$scope.input = {};
				$('#code').focus();
			}
		})
	}
	$scope.saveParties = function(data, id) {
		return $http.put('/api/parties/'+id, data);
		/*.success(function (response) {
			UIkit.notify(response.message, response.status);
		})*/
	}
	$scope.deleteParties = function(id) {
		var index = $scope.indexSearch($scope.parties, id);
		if (confirm('hapus kategori?')) {
			$http.delete('/api/parties/'+id)
			.success(function (response) {
				UIkit.notify(response.message, response.status);
				if (response.status == 'success') {
					//console.log(response.parties);
					$scope.parties.splice(index, 1);	
				}
			})
		}
	}
};