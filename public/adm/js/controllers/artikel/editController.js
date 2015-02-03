// public/js/controllers/artikelController.js
var ctrl = angular.module('artikelEditCtrl', [])
        .controller('artikelEditController', function ($scope, $http, $location, $routeParams, artikelFactory, kategoriFactory) {
            // object to hold all the data for the new comment form
            $scope.pageTitle = 'Edit Artikel';
            $scope.isload = false;
            $scope.artikelData = {};
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
            // function to open data
            // OPEN & SHOW DATA KATEGORI ======================================================
            var artikelId = $routeParams.id;
            //show data artikel
            artikelFactory.show(artikelId).success(function (data) {
                //get data kategori untuk select kategori
                kategoriFactory.get().success(function (data) {
                    $scope.kategoris = data;
                }).error(function (data) {
                    alert('Pengambilan data gagal');
                });
                //set form value
                $scope.artikelData = data;
                //handle image url and video url                
                $scope.artikelData.image_is_url = !data.image_is_url;
                $scope.artikelData.image_is_url = data.image_is_url;
                //close loader & show content
                $scope.isload = true;
            }).error(function (data) {
                alert('Pengambilan data gagal');
            });

            // function untuk kembali ke halaman list artikel
            // BACK TO LIST KATEGORI ======================================================
            $scope.back = function () {
                $location.path('/blogs/artikel.html');
            };

            // function to handle submitting the form
            // UPDATE A COMMENT ======================================================
            $scope.updateArtikel = function (item, event) {
                //$scope.loader = true;
                // save the comment. pass in comment data from the form
                // use the function we created in our service
                artikelFactory.update($scope.artikelData)
                        .success(function (data) {
                            alert('Data Artikel ' + $scope.artikelData.nama + ' telah diupdate.');
                        })
                        .error(function (data) {
                            alert('Update data gagal.');
                            console.log(data);
                        });
            };
            
            // Fungsi untuk menghapus image header
            // DELETE IMAGE HEADER =====================================================
            $scope.deleteImage = function(element){
                artikelFactory.deleteImage(artikelId).success(function(data){
                    
                }).error(function(data){
                    
                });
            }

        });
	