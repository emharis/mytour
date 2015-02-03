// public/js/controllers/dashboardController.js
angular.module('dashboardCtrl', [])
// inject the Comment service into our controller
        .controller('dashboardController', function ($scope, $http, $location) {
            $scope.pageTitle = 'Dashboard';
            $scope.isload = false;
            //if path == / update url
            if($location.path() == '/'){
                $location.path('/dashboard.html');
            }
        });
	