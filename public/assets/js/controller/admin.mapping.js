var adminMappingCtrl = function($http, $scope) {
	$scope.currentPage = 1;
	$scope.limit = 10;
	//$scope.detailModal = false;

	$http.get('/api/mapping')
	.success(function (response) {
		$scope.mapping 		= response.mapping;
		$scope.budget 		= response.budget;
		$scope.category 	= response.category;
		$scope.food 		= response.foodInterest;
		$scope.parties 		= response.parties;
		$scope.province 	= response.province;
		$scope.seasonality 	= response.seasonality;
		$scope.special 		= response.specialInterest;
		$scope.video 		= response.video;
	})

	$scope.detailMapping = function(id) {
		$('.ui.modal').modal('show');
		$http.get('/api/mapping/'+id)
		//$scope.detailModal = true;
		.success(function(response) {
			$scope.detail = response.mapping[0];
			$scope.detail.videofile = '/upload/'+$scope.detail.video.filename;
		})
	}

	$scope.addMapping = function(input) {
		//console.log(input);
		$http.post('/api/mapping', input)
		.success(function (response) {
			UIkit.notify(response.message, response.status);
			if (response.status == 'success') {
				//console.log(response.mapping);
				$scope.mapping.push(response.mapping);
				$scope.input = {};
				$('#code').focus();
			}
		})
	}
	$scope.saveMapping = function(data, id) {
		return $http.put('/api/mapping/'+id, data)
		.success(function (response) {
			//UIkit.notify(response.message, response.status);
			$scope.detail = response.mapping[0];
			})
	}
	$scope.deleteMapping = function(id) {
		var index = $scope.indexSearch($scope.mapping, id);
		if (confirm('hapus kategori?')) {
			$http.delete('/api/mapping/'+id)
			.success(function (response) {
				UIkit.notify(response.message, response.status);
				if (response.status == 'success') {
					//console.log(response.mapping);
					$scope.mapping.splice(index, 1);	
				}
			})
		}
	}
};