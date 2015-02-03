// public/js/services/commentService.js
var ctrl = angular.module('artikelService', [])
        .factory('artikelFactory', function ($http, $location) {
            return {
                // get all the comments
                get: function () {
                    return $http.get('api/artikel');
                },
                // save a comment (pass in comment data)
                save: function (artikelData,imageFile) {
                    var frmData = new FormData();
                    angular.forEach(artikelData, function (value, key) {
                        alert(key + ' === ' + value);
                        frmData.append(key, value);
                    });
                    frmData.append('image','preketek');
                    //alert(JSON.stringify(artikelData));
                    return $http.post('api/artikel/save', frmData, {
                        headers: {
                            'Content-Type': undefined
                        },
                        transformRequest: angular.identity
                    });
//                    return $http({
//                        method: 'POST',
//                        url: 'api/artikel/save',
//                        headers: {
//                            'Content-Type': 'multipart/form-data'
//                        },
//                        transformRequest: frmData
//                    });
                },
                //show artikel by id
                show: function (id) {
                    return $http.get('api/artikel/show/' + id);
                },
                // save a comment (pass in comment data)
                update: function (artikelData) {
                    return $http.post('api/artikel/update', {
                        "id": artikelData.id,
                        "judul": artikelData.judul,
                        "konten": artikelData.konten,
                        "publish": artikelData.publish
                    });
                },
                // destroy a comment
                destroy: function (id) {
                    return $http.get('api/artikel/delete/' + id);
                },
                deleteImage:function(id){
                    return $http.post('api/artikel/delimage/'+id);
                }
            }

        });