// public/js/controllers/kategoriController.js
angular.module('kategoriCtrl', [])
// inject the Comment service into our controller
        .controller('kategoriController', function ($scope, $http, $location, kategoriFactory) {
            // object to hold all the data for the new comment form
            $scope.pageTitle = 'Kategori';
            $scope.kategoriData = {};

            // loader variable to show the spinning loader icon
            $scope.isload = false;


            // get all the comments first and bind it to the $scope.comments object
            // use the function we created in our service
            // GET ALL COMMENTS ====================================================
            // Get data kategori
            $scope.showdata = function () {
                kategoriFactory.get()
                        .success(function (data) {
                            $scope.kategoris = data;
                            $scope.isload = true;
                        }).error(function(data){
                            alert('Gagal koneksi ke server');
                        });
            }
            $scope.showdata();
            
            //function menampilkan data kategori by id
            // SHOW A KATEGORI =====================================================
            $scope.showKategori = function(id){
                $location.path('/blogs/kategori/edit/'+id+'/index.html');
            }


            // function to handle deleting a comment
            // DELETE A COMMENT ====================================================
            $scope.deleteKategori = function (id) {
                if (confirm('Anda akan menhapus data ini?')) {
                    // use the function we created in our service
                    kategoriFactory.destroy(id)
                            .success(function (data) {
                                // if successful, we'll need to refresh the comment list
                                $scope.isload = false;
                                $scope.showdata();
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

            // fungsi untuk input data kategori baru
            // ADD NEW KATEGORI ====================================================
            $scope.addnew = function () {
                $location.path('/blogs/kategori/new.html');
            };


        });
	