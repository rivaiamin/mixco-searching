var config = function($stateProvider, $httpProvider, $urlRouterProvider, $authProvider, $locationProvider) {
	$stateProvider.state('main', {
		url:'/', 
		templateUrl: 'views/main.html',
		controller: 'mainCtrl'
	}).state('login', {
		url:'/admin/login', 
		templateUrl: 'views/login.html',
		controller: 'authCtrl',
		resolve: {
			skipIfLoggedIn: skipIfLoggedIn
		}
	}).state('logout', {
        url: '/logout',
        template: null,
        controller: 'LogoutCtrl'
    }).state('admin', {
		url:'/admin',
		templateUrl: 'views/admin.html',
		controller: 'adminCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('mapping', {
		url:'/admin/mapping',
		templateUrl: 'views/mapping/index.html',
		controller: 'adminMappingCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('guest', {
		url:'/admin/guest',
		templateUrl: 'views/guest/index.html',
		controller: 'adminGuestCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('category', {
		url:'/admin/category',
		templateUrl: 'views/category/index.html',
		controller: 'adminCategoryCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('special', {
		url:'/admin/special',
		templateUrl: 'views/special/index.html',
		controller: 'adminSpecialCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('seasonality', {
		url:'/admin/seasonality',
		templateUrl: 'views/seasonality/index.html',
		controller: 'adminSeasonalityCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('budget', {
		url:'/admin/budget',
		templateUrl: 'views/budget/index.html',
		controller: 'adminBudgetCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('parties', {
		url:'/admin/parties',
		templateUrl: 'views/parties/index.html',
		controller: 'adminPartiesCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('food', {
		url:'/admin/food',
		templateUrl: 'views/food/index.html',
		controller: 'adminFoodCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	}).state('video', {
		url:'/admin/video',
		templateUrl: 'views/video/index.html',
		controller: 'adminVideoCtrl',
		resolve: {
			loginRequired: loginRequired
		}
	});

	$locationProvider.html5Mode(true);
	$urlRouterProvider.otherwise('/');
	
	$authProvider.loginUrl = '/api/login';

	function skipIfLoggedIn($q, $auth) {
      var deferred = $q.defer();
      if ($auth.isAuthenticated()) {
        deferred.reject();
      } else {
        deferred.resolve();
      }
      return deferred.promise;
    }

	function loginRequired($q, $location, $auth) {
      var deferred = $q.defer();
      if ($auth.isAuthenticated()) {
        deferred.resolve();
      } else {
        $location.path('/admin/login');
      }
      return deferred.promise;
    }
}