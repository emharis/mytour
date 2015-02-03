// public/js/controllers/kategoriController.js
angular.module('serviceCtrl', [])
// inject the Comment service into our controller
        .controller('serviceController', function ($scope, $http, $location, serviceFactory) {
            // object to hold all the data for the new comment form
            $scope.pageTitle = 'Service Page';
            $scope.serviceData = {};
            // loader variable to show the spinning loader icon
            $scope.isload = false;
            //tiny mce setting option
            // fungsi setting tinymce
            // TINY MCE OPTION ======================================================
            $scope.tinymceOptions = {
                height: 250,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons | fullscreen"

            };

            // get all the comments first and bind it to the $scope.comments object
            // use the function we created in our service
            // GET ALL ABOUT PAGE CONTENTS ====================================================
            // Get data Service
            serviceFactory.get()
                    .success(function (data) {
                        $scope.serviceData = data;
                        $scope.isload = true;
                    }).error(function (data) {
                alert('Gagal koneksi ke server');
            });

            // UPDATE CONTENT
            // Update data sercice ===========================================================
            $scope.update = function () {
                serviceFactory.update($scope.serviceData).success(function (data) {
                    alert("Data telah disimpan");
                }).error(function (data) {
                    alert("Gagal koneksi ke server");
                });
            };

//            //function menampilkan data kategori by id
//            // SHOW A KATEGORI =====================================================
//            $scope.showKategori = function(id){
//                $location.path('/blogs/kategori/edit/'+id+'/index.html');
//            }
//
//
//            // function to handle deleting a comment
//            // DELETE A COMMENT ====================================================
//            $scope.deleteKategori = function (id) {
//                if (confirm('Anda akan menhapus data ini?')) {
//                    // use the function we created in our service
//                    kategoriFactory.destroy(id)
//                            .success(function (data) {
//                                // if successful, we'll need to refresh the comment list
//                                $scope.isload = false;
//                                $scope.showdata();
//                            });
//                }
//            };
//
//            // function untuk mendapatkan auto number di table row
//            // GET TABLE ROW AUTONUMBER ====================================================
//            $scope.getIndex = function (obj, key, value)
//            {
//                for (var i = 0; i < obj.length; i++) {
//                    if (obj[i][key] == value) {
//                        return i;
//                    }
//                }
//                return null;
//            };
//
//            // fungsi untuk input data kategori baru
//            // ADD NEW KATEGORI ====================================================
//            $scope.addnew = function () {
//                $location.path('/blogs/kategori/new.html');
//            };


        });
	