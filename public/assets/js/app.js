app = angular.module('mixApp',['ui.router', 'satellizer', 'ngTouch', 'superswipe', 
	'angularUtils.directives.dirPagination', 'xeditable', 'ngFileUpload' ]);

app
.run(function(editableOptions, editableThemes) {
  editableThemes.bs3.inputClass = 'ui input';
  editableThemes.bs3.buttonsClass = 'ui button';
  editableOptions.theme = 'bs3';
})
.config(config)
.controller('mixCtrl', mixCtrl)
.controller('mainCtrl', mainCtrl)
.controller('authCtrl', authCtrl)
.controller('adminCtrl', adminCtrl)
.controller('adminMappingCtrl', adminMappingCtrl)
.controller('adminGuestCtrl', adminGuestCtrl)
.controller('adminCategoryCtrl', adminCategoryCtrl)
.controller('adminSpecialCtrl', adminSpecialCtrl)
.controller('adminSeasonalityCtrl', adminSeasonalityCtrl)
.controller('adminBudgetCtrl', adminBudgetCtrl)
.controller('adminPartiesCtrl', adminPartiesCtrl)
.controller('adminFoodCtrl', adminFoodCtrl)
.controller('adminVideoCtrl', adminVideoCtrl)

.directive('sidebar', function() {
	return function (scope, element) {
		element.sidebar('toggle');
    };
})
.directive('sticky', function() {
	return function (scope, element) {
		element.sticky();
		element.visibility({
	      type: 'fixed'
	    });
    };
})
.directive('progress', function() {
	return function (scope, element, attr) {
		element.progress();
    };
})
