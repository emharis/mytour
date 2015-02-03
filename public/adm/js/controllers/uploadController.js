
webMgr.module('uploadModule', [])
        .controller('uploadController', [
            '$scope',
            '$upload',
            function ($scope, $upload) {
                $scope.pageTitle = 'Upload Demo';
                $scope.isload = false;

                $scope.model = {};
                $scope.selectedFile = [];
                $scope.uploadProgress = 0;

                $scope.uploadFile = function () {
                    var file = $scope.selectedFile[0];
                    $scope.upload = $upload.upload({
                        url: 'api/upload',
                        method: 'POST',
                        data: angular.toJson($scope.model),
                        file: file
                    }).progress(function (evt) {
                        $scope.uploadProgress = parseInt(100.0 * evt.loaded / evt.total, 10);
                    }).success(function (data) {
                        //do something
                    });
                };

                $scope.onFileSelect = function ($files) {
                    $scope.uploadProgress = 0;
                    $scope.selectedFile = $files;
                };
            }
        ])
        .directive('progressBar', [
            function () {
                return {
                    link: function ($scope, el, attrs) {
                        $scope.$watch(attrs.progressBar, function (newValue) {
                            el.css('width', newValue.toString() + '%');
                        });
                    }
                };
            }
        ]);