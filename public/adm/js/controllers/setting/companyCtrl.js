angular.module('companyCtrl', [])
        .controller('companyController', function ($scope, $http, $location,companyFactory) {
            // object to hold all the data for the new comment form
            $scope.pageTitle = 'Company Info';
            $scope.isload = false;
            $scope.compData = {};
            //getting data
            //show data kategori
            companyFactory.show().success(function (data) {
                $scope.compData = data;
                $scope.isload = true;
            }).error(function (data) {
                alert('Pengambilan data gagal');
            });
            
            // SAVE COMPANY INFO ===================================================
            $scope.updateInfo = function(){
                companyFactory.save($scope.compData).success(function(data){
                    alert('Company info telah disimpan.');
                }).error(function(data){
                    alert('Gagal transfer data');
                });
            };
            
        });
	