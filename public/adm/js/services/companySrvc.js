// public/js/services/commentService.js
var ctrl = angular.module('companyService', [])
        .factory('companyFactory', function ($http, $location) {
            return {
                // save a comment (pass in comment data)
                save: function (compData) {
                    return $http.post('api/company/save', compData);
                },
                //show artikel by id
                show: function (id) {
                    return $http.get('api/company');
                },
                // save a comment (pass in comment data)
                update: function (compData) {
                    return $http.post('api/company/save', compData);
                }
            };
        });