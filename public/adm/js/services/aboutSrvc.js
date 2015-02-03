// public/js/services/commentService.js
var ctrl = angular.module('aboutService', [])
        .factory('aboutFactory', function ($http, $location) {
            return {
                // get data about
                get: function () {
                    return $http.get('api/static/about');
                },
//                // save a comment (pass in comment data)
//                save: function (aboutData) {
//                    return $http.post('api/company/save', aboutData);
//                },
//                //show artikel by id
//                show: function (id) {
//                    return $http.get('api/company');
//                },
                // update a comment (pass in comment data)
                update: function (aboutData) {
                    return $http.post('api/static/about/update', aboutData);
                }
            };
        });