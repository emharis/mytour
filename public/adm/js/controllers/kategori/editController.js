// public/js/controllers/kategoriController.js
angular.module('kategoriEditCtrl', [])
        .controller('kategoriEditController', function ($scope, $http, $location, $routeParams, kategoriFactory) {
            // object to hold all the data for the new comment form
            $scope.pageTitle = 'Edit Kategori';
            $scope.isload = false;
            $scope.kategoriData = {};

            // function to open data
            // OPEN & SHOW DATA KATEGORI ======================================================
            var kategoriId = $routeParams.id;
            //show data kategori
            kategoriFactory.show(kategoriId).success(function (data) {
                $scope.kategoriData = data;
                $scope.isload = true;
            }).error(function (data) {
                alert('Pengambilan data gagal');
            });

            // function untuk kembali ke halaman list kategori
            // BACK TO LIST KATEGORI ======================================================
            $scope.back = function () {
                $location.path('/blogs/kategori.html');
            };

            // function to handle submitting the form
            // UPDATE A COMMENT ======================================================
            $scope.updateKategori = function (item, event) {
                //$scope.loader = true;
                // save the comment. pass in comment data from the form
                // use the function we created in our service
                kategoriFactory.update($scope.kategoriData)
                        .success(function (data) {
                            alert('Data Kategori ' + $scope.kategoriData.nama + ' telah diupdate.');
                        })
                        .error(function (data) {
                            alert('Update data gagal.');
                            console.log(data);
                        });
            };

        });
	