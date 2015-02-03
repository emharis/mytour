angular.module('messageCtrl', [])
        .controller('messageController', function ($scope, $http, $location, messageFactory,kategoriFactory) {
            // object to hold all the data for the new comment form
            $scope.pageTitle = 'Messages';
            $scope.isload = false;
            $scope.msgData = {};
            //getting data
//            kategoriFactory.get().success(function(data){
//                $scope.msgData = data;
//                 $scope.isload = true;
//            }).error(function(data){
//                alert('gagal');
//            });
            //show data message
            messageFactory.get().success(function (data) {
                $scope.msgData = data;
                $scope.isload = true;
            }).error(function (data) {
                alert('Pengambilan data gagal');
                alert(data);
            });
            
            //SHOW DETIL MESSAGE ========================================
            $scope.show = function(id){
                $location.path('message/show/'+id+'/index.html');
            }
            
            
        });
	