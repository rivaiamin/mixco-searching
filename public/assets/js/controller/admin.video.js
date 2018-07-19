var adminVideoCtrl = function($http, $scope, Upload) {
	$scope.currentPage = 1;
	$scope.limit = 10;

	$scope.progress = 0;
	$scope.onProgress = false;
	
	$('.ui.progress').progress();
	$http.get('/api/video')
	.success(function (response) {
		$scope.video = response.video;
	})
	
	$scope.addVideo = function(input) {
		if ($scope.videoForm.filevideo.$valid && $scope.filevideo) {
		  $scope.onProgress = true;
	
	      Upload.upload({
	            url: 'api/video/upload',
	            method: 'POST',
			    data: {
			    	video: $scope.filevideo,
			    } 
			    /*sendFieldsAs: 'form',
			    fields: {
			        filename: $scope.file.name, 
			        title: input.title
			    }*/
	        }).then(function (resp) {
	            $http.post('/api/video', {
	            	title: input.title,
	            	filename: $scope.filevideo.name
	            })
				.success(function (response) {
					//UIkit.notify(response.message, response.status);
					if (response.status == 'success') {
						$scope.onProgress = false;
						$scope.video.push(response.video);
						UIkit.notify(response.message, response.status);
						$scope.input = {};
						$scope.filevideo = {};
						$('#title').focus();
					}
				})
	        }, function (resp) {
				UIkit.notify(resp.data.message, resp.data.status);
	        }, function (evt) {
	            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
	            $('.ui.progress').progress({ percent: progressPercentage });
	        	$scope.progress = progressPercentage;
	        });
	    }
	}
	$scope.saveVideo = function(data, id) {
		return $http.put('/api/video/'+id, data);
		/*.success(function (response) {
			UIkit.notify(response.message, response.status);
		})*/
	}
	$scope.deleteVideo = function(id) {
		var index = $scope.indexSearch($scope.video, id);
		if (confirm('hapus kategori?')) {
			$http.delete('/api/video/'+id)
			.success(function (response) {
				UIkit.notify(response.message, response.status);
				if (response.status == 'success') {
					//console.log(response.video);
					$scope.video.splice(index, 1);	
				}
			})
		}
	}
};