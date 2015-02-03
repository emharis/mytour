// public/js/controllers/artikelController.js
var ctrl = angular.module('artikelCtrl', [])

// inject the Comment service into our controller
        .controller('artikelController', function ($scope, $http, $location, artikelFactory) {
            // object to hold all the data for the new comment form
            $scope.pageTitle = 'Artikel';
            $scope.artikelData = {};

            // loader variable to show the spinning loader icon
            $scope.isload = false;


            // get all the comments first and bind it to the $scope.comments object
            // use the function we created in our service
            // GET ALL COMMENTS ====================================================
            // Get data artikel
            $scope.showdata = function () {
                artikelFactory.get()
                        .success(function (data) {
                            $scope.artikels = data;
                            $scope.isload = true;
                        }).error(function (data) {
                    alert('Gagal koneksi ke server');
                });
            }
            $scope.showdata();
            
            $scope.retrieveData = function(){
                
            }

            //function menampilkan data artikel by id
            // SHOW A KATEGORI =====================================================
            $scope.showArtikel = function (id) {
                $location.path('/blogs/artikel/edit/' + id + '/index.html');
            }


            // function to handle deleting a comment
            // DELETE A COMMENT ====================================================
            $scope.deleteArtikel = function (id) {
                if (confirm('Anda akan menhapus data ini?')) {
                    // use the function we created in our service
                    artikelFactory.destroy(id)
                            .success(function (data) {
                                artikelFactory.get()
                                        .success(function (data) {
                                            $scope.artikels = data;
                                        }).error(function (data) {
                                    alert('Gagal koneksi ke server');
                                });
                            });
                }
            };

            // function untuk mendapatkan auto number di table row
            // GET TABLE ROW AUTONUMBER ====================================================
            $scope.getIndex = function (obj, key, value)
            {
                for (var i = 0; i < obj.length; i++) {
                    if (obj[i][key] == value) {
                        return i;
                    }
                }
                return null;
            };

            // fungsi untuk input data artikel baru
            // ADD NEW KATEGORI ====================================================
            $scope.addnew = function () {
                $location.path('/blogs/artikel/new.html');
            };


        });
	