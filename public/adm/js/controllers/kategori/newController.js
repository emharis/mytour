// public/js/controllers/kategoriController.js
angular.module('kategoriNewCtrl', [])
        .controller('kategoriNewController', function ($scope, $http, $location, $interval, kategoriFactory) {
            // object to hold all the data for the new comment form
            $scope.pageTitle = 'New Kategori';
            $scope.isload = false;
            $scope.kategoriData = {};
            $scope.kategoriData.nama = "";
            $scope.kategoriData.publish = "N";
            $scope.buttonDisable = false;

            // loader variable to show the spinning loader icon
            $interval(function () {
                $scope.isload = true;
            }, 500);

            $scope.back = function () {
                $location.path('/blogs/kategori.html');
            };
//
//
            // function to handle submitting the form
            // SAVE A COMMENT ======================================================
            $scope.submitKategori = function (item, event) {
                //disable save button to prevent sencond click
                $scope.buttonDisable = true;
                //$scope.loader = true;
//                // save the comment. pass in comment data from the form
//                // use the function we created in our service
                kategoriFactory.save($scope.kategoriData)
                        .success(function (data) {
                            // if successful, we'll need to refresh the comment list
//                            kategoriFact.get()
//                                    .success(function (getData) {
//                                        $scope.kategori = getData;
//                                        $scope.loader = false;
//                                    }).error(function (data) {
//                                alert('gagal simpan');
//                            });
                            
                            alert('Data Kategori ' + $scope.kategoriData.nama + ' telah disimpan.');
                            //clear input
                            $scope.kategoriData.nama = "";
                            $scope.kategoriData.publish = "N";
                            //enable button
                            $scope.buttonDisable = false;
                        })
                        .error(function (data) {
                            alert('Simpan data gagal.');
                            console.log(data);
                            //enable button
                            $scope.buttonDisable = false;
                        });
            };

        });
	