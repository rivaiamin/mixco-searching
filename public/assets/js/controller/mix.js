var mixCtrl = function($scope,$auth,$state) {
	$scope.isAuthenticated = function() {
	  return $auth.isAuthenticated();
	};
	$scope.siteWide = function() {
		if ($scope.isAuthenticated()) return 'twelve';
		else return 'sixteen';
	}
	$scope.scroll = function() {
		if ($scope.isAuthenticated()) return 'scrolly';
		else return 'visibley';
	}
	$scope.logout = function() {
		$auth.logout();
		$state.go('login');
	}
	$scope.indexSearch = function(array, id) {	
		return array.map(function(el) {
		  return el.id;
		}).indexOf(id);
    }
};