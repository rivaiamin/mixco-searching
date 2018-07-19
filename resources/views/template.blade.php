<!DOCTYPE html>
<html ng-app="mixApp">
<head>
	<title>Mix.co</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/semantic/dist/semantic.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/uikit/css/components/notify.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/angular-xeditable/dist/css/xeditable.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}">
  	
  	<script src="{{ base_path('bower_components/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/semantic/dist/semantic.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/uikit/js/uikit.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/uikit/js/components/notify.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/angular/angular.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/angular-ui-router/release/angular-ui-router.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/angular-resource/angular-resource.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/angular-superswipe/superswipe.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/angular-touch/angular-touch.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/angularUtils-pagination/dirPagination.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/satellizer/satellizer.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/angular-xeditable/dist/js/xeditable.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/ng-file-upload/ng-file-upload.min.js') }}" type="text/javascript"></script>
	
	<script src="{{ asset('assets/js/app.config.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/mix.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/auth.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/main.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/admin.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/admin.mapping.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/admin.guest.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/admin.category.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/admin.special.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/admin.seasonality.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/admin.budget.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/admin.parties.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/admin.food.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/controller/admin.video.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
	
  	<base href="/index.php">
</head>
<body ng-controller="mixCtrl">
	<div id="site" ng-class="{blur:blur}" class="ui bottom attached segment pushable grid bg">
  	  <div ng-if="isAuthenticated()" id="sidebar" class="ui vertical inverted sticky menu four wide column" ng-include="'views/sidebar.html'">
	  </div>
	  <div ng-class="[siteWide(), 'wide', 'column', scroll() ]" ui-view>
	  </div>
	</div>
</body>
</html>