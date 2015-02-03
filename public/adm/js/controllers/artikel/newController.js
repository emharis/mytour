// public/js/controllers/artikelController.js
var ctrl = angular.module('artikelNewCtrl', [])
        .controller('artikelNewController', function ($scope, $http, $location, $interval, artikelFactory, kategoriFactory) {
            // object to hold all the data for the new comment form
            $scope.pageTitle = 'New Artikel';
            $scope.isload = false;
            $scope.buttonDisable = false;
            $scope.imageFile;
            $scope.artikelData = {};
            var baseurl = $location.absUrl().replace("admin#" + $location.url(), "");
            $scope.currentUrl = $location.absUrl();
            $scope.formPostUrl = baseurl + "api/artikel/save";
            //get data kategori untuk select kategori
            kategoriFactory.get().success(function (data) {
                $scope.kategoris = data;
            }).error(function (data) {
                alert('Gagal sambungan ke server');
            });

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

            // loader variable to show the spinning loader icon
            $interval(function () {
                $scope.isload = true;
            }, 500);

            $scope.back = function () {
                $location.path('/blogs/artikel.html');
            };

            //add file to artikelData
            $scope.addFile = function (element) {
                $scope.imageFile = element.file[0];
                alert(element);
            };

            // function to handle submitting the form
            // SAVE A COMMENT ======================================================
            $scope.submitArtikel = function (item, event) {
                

//                var frmData = new FormData();
//                frmData.append('file', $scope.imageFile);
//                $scope.artikelData.image = $scope.imageFile;
//                $http.post('api/artikel/save', frmData, {
//                    headers: {
//                        'Content-Type': false
//                    },
//                    transformRequest: angular.identity
//                }).success(function (data) {
//                    alert('bershil');
//                    $scope.data_res = data;
//                }).error(function (data) {
//                    alert('gagal');
//                    $scope.data_res = data;
//                });

//                //disable button save to prevent second clieck
//                $scope.buttonDisable = true;
//                // save the comment. pass in comment data from the form
//                // use the function we created in our service
//
//                //fileUpload.uploadFileToUrl(file, uploadUrl);
//                artikelFactory.save($scope.artikelData,$scope.imageFile)
//                        .success(function (data) {
//                            alert('Data Artikel ' + $scope.artikelData.judul + ' telah disimpan.');
////                            //clear data
////                            $scope.artikelData.kategori_id = 0;
////                            $scope.artikelData.judul = "";
////                            $scope.artikelData.konten = "";
////                            $scope.artikelData.image = "";
////                            $scope.artikelData.imageurl = "";
////                            $scope.artikelData.image_is_url = false;
////                            $scope.artikelData.video_instead_image = false;
////                            $scope.artikelData.videourl = "";
////                            $scope.artikelData.publish = 0;
//                            //enable button
//                            $scope.buttonDisable = false;
//                            $scope.data_res = data;
//                        })
//                        .error(function (data) {
//                            $scope.data_res = data;
//                            alert('Simpan data gagal.');
//                            console.log(data);
//                            //enable button
//                            $scope.buttonDisable = false;
//                        });
            };

        });

