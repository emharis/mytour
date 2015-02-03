// public/js/services/commentService.js
var ctrl = angular.module('serviceService', [])
        .factory('serviceFactory', function ($http, $location) {
            return {
                // get data service
                get: function () {
                    return $http.get('api/static/service');
                },
                // save a comment (pass in comment data)
                update: function (serviceData) {
                    return $http.post('api/static/service/update', serviceData);
                }
//                //show artikel by id
//                show: function (id) {
//                    return $http.get('api/company');
//                },
//                // save a comment (pass in comment data)
//                update: function (compData) {
//                    return $http.post('api/company/save', compData);
//                }
            };
        });