var mainCtrl = function($http, $scope, $rootScope) {
	$scope.currentPage = 1;
	$scope.limit = 8;
	$scope.isHide = true;
	
	$('.selection.dropdown').dropdown();
	$('#detailModal').modal({
		onHide: function() {
			$scope.isHide = true;
		}
	});
	$('#guestModal')
		.modal({
			onShow: function() {
				$rootScope.blur = true;
			},
			onHide: function() {
				$rootScope.blur = false;
			}
		})
		.modal('setting', 'closable', false)
		.modal('show');

	$http.get('/api/main')
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
	});
	
	$scope.reset = function(f) {
		//if (f == 'province') delete $scope.input.province_id;
		alert('hapus aku');
	}

	$scope.detailMapping = function(id) {
		$http.get('/api/mapping/'+id)
		//$scope.detailModal = true;
		.success(function(response) {
			$scope.detail = response.mapping[0];
			$scope.isHide = false;
			$scope.detail.videofile = '/upload/'+$scope.detail.video.filename;
			$('.ui.large.modal').modal('show');
		})
	};

	$scope.guestSend = function(form) {
		var data = { gender: $('#gender').val(), nationality: $('#nationality').val() };
		form.gender = $('#gender').val();
		form.nationality = $('#nationality').val();
		$http.post('/api/guest', form)
		.success(function (response) {
			UIkit.notify(response.message, response.status);
			if (response.status == 'success') {
				//console.log(response.food);
				$scope.form = {};
				$('#guestModal').modal('hide');
			}
		})
	}
	
};