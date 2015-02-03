// public/js/services/commentService.js
var ctrl = angular.module('kategoriService', [])
	.factory('kategoriFactory', function ($http, $location) {
	    return {
	        // get all the comments
	        get: function () {
	            return $http.get('api/kategori');
	        },

	        // save a comment (pass in comment data)
	        save: function (kategoriData) {
                    return $http.post('api/kategori/save',kategoriData);
	        },
                
                //show kategori by id
                show:function(id){
                    return $http.get('api/kategori/show/' + id);
                },
                
                // save a comment (pass in comment data)
	        update: function (kategoriData) {
                    return $http.post('api/kategori/update',kategoriData);
	        },

	        // destroy a comment
	        destroy: function (id) {
	            return $http.get('api/kategori/delete/' + id);
	        }
	    }

	});