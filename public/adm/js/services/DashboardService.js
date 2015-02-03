// public/js/services/commentService.js
var ctrl = angular.module('dashboardService', [])

	.factory('Dashboard', function ($http, $location) {

	    return {
	        // get all the comments
	        get: function () {
	            return $http.get('api/dashboard');
	        },

	        // save a comment (pass in comment data)
	        save: function (dashboardData) {
	            return $http({
	                method: 'POST',
	                url: 'api/dashboard/save',
	                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
	                data: $.param(dashboardData)
	            });
	        },

	        // destroy a comment
	        destroy: function (id) {
	            return $http.get('api/dashboard/delete/' + id);
	        }
	    }

	});