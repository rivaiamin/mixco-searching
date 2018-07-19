var adminGuestCtrl = function($http, $scope) {
	$scope.currentPage = 1;
	$scope.limit = 10;

	$http.get('/api/guest')
	.success(function (response) {
		$scope.guest = response.guest;
	})

	$scope.deleteGuest = function(id) {
		var index = $scope.indexSearch($scope.guest, id);
		if (confirm('delete guest?')) {
			$http.delete('/api/guest/'+id)
			.success(function (response) {
				UIkit.notify(response.message, response.status);
				if (response.status == 'success') {
					//console.log(response.guest);
					$scope.guest.splice(index, 1);	
				}
			})
		}
	}
};