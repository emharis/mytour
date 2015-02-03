angular.module('messageShowCtrl', [])
        .controller('messageShowController', function ($scope, $http, $location, $routeParams,messageFactory) {
            // object to hold all the data for the new comment form
            $scope.pageTitle = 'Message From : ';
            $scope.isload = false;
            $scope.msgData = {};
            $scope.replyData = {};
            //getting data
            //show data message
            var kategoriId = $routeParams.id;
            messageFactory.show(kategoriId).success(function (data) {
                $scope.msgData = data;
                $scope.isload = true;
            }).error(function (data) {
                alert('Pengambilan data gagal');
            });
            
            // function untuk kembali ke halaman list kategori
            // BACK TO LIST message ======================================================
            $scope.back = function () {
                $location.path('/message.html');
            };
            
            // SEND REPLY MESSAGE =======================================================
            $scope.reply = function(){
                messageFactory.reply($scope.replyData).success(function (data) {
                alert('send reply...');
            }).error(function (data) {
                alert('Pengambilan data gagal');
            });
            };
        });
	