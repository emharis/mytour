// public/js/services/commentService.js
var ctrl = angular.module('messageService', [])
        .factory('messageFactory', function ($http, $location) {
            return {
                // get data message
                get: function () {
                    return $http.get('api/message');
                },
                // save a comment (pass in comment data)
                save: function (msgData) {
                    return $http.post('api/message/save', msgData);
                },
                //show artikel by id
                show: function (id) {
                    return $http.get('api/message/show/'+id);
                },
                // save a comment (pass in comment data)
                update: function (msgData) {
                    return $http.post('api/message/save', msgData);
                },
                // reply message
                reply: function(msgData){
                    return $http.post('api/message/reply', msgData);
                }
            };
        });