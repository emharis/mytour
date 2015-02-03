// public/js/app.js
//var webMgr = angular.module('webMgr', ['dashboardCtrl','kategoriCtrl', 'kategoriService', 'ngRoute']);
var webMgr = angular.module('webMgr', ['ngRoute',
    'dashboardCtrl',
    'kategoriCtrl',
    'kategoriNewCtrl',
    'kategoriEditCtrl',
    'kategoriService',
    'artikelCtrl',
    'artikelNewCtrl',
    'artikelEditCtrl',
    'artikelService',
    'ui.tinymce',
    'companyCtrl',
    'companyService',
    'messageCtrl',
    'messageService',
    'messageShowCtrl',
    'aboutCtrl',
    'aboutService',
    'serviceCtrl',
    'serviceService'
]);

webMgr.config(['$routeProvider', function ($routeProvider) {
        $routeProvider.when('/', {
            templateUrl: 'views/admin/partials/dashboard.html',
            controller: 'dashboardController'
        }).when('/dashboard.html', {
            templateUrl: 'views/admin/partials/dashboard.html',
            controller: 'dashboardController'
        }).when('/blogs/kategori.html', {
            templateUrl: 'views/admin/partials/kategori/kategori.html',
            controller: 'kategoriController'
        }).when('/blogs/kategori/new.html', {
            templateUrl: 'views/admin/partials/kategori/new.html',
            controller: 'kategoriNewController'
        }).when('/blogs/kategori/edit/:id/:any', {
            templateUrl: 'views/admin/partials/kategori/edit.html',
            controller: 'kategoriEditController'
        }).when('/blogs/artikel.html', {
            templateUrl: 'views/admin/partials/artikel/index.html',
            controller: 'artikelController'
        }).when('/blogs/artikel/new.html', {
            templateUrl: 'views/admin/partials/artikel/new.html',
            controller: 'artikelNewController'
        }).when('/blogs/artikel/edit/:id/:any', {
            templateUrl: 'views/admin/partials/artikel/edit.html',
            controller: 'artikelEditController'
        }).when('/setting/company.html', {
            templateUrl: 'views/admin/partials/setting/index.html',
            controller: 'companyController'
        }).when('/message.html', {
            templateUrl: 'views/admin/partials/message/index.html',
            controller: 'messageController'
        }).when('/message/show/:id/:any', {
            templateUrl: 'views/admin/partials/message/show.html',
            controller: 'messageShowController'
        }).when('/static/about.html', {
            templateUrl: 'views/admin/partials/static/about/about.html',
            controller: 'aboutController'
        }).when('/static/service.html', {
            templateUrl: 'views/admin/partials/static/service/service.html',
            controller: 'serviceController'
        }).otherwise({
            template: '<div class="error-container"><div class="well"><h1 class="grey lighter smaller"><span class="blue bigger-125"><i class="ace-icon fa fa-sitemap"></i>404</span>Page Not Found</h1><hr><h3 class="lighter smaller">We looked everywhere but we couldn"t find it!</h3><div><div class="space"></div><h4 class="smaller">Try one of the following:</h4><ul class="list-unstyled spaced inline bigger-110 margin-15"><li><i class="ace-icon fa fa-hand-o-right blue"></i>Re-check the url for typos</li><li><i class="ace-icon fa fa-hand-o-right blue"></i>Read the faq</li><li><i class="ace-icon fa fa-hand-o-right blue"></i>Tell us service it</li></ul></div><hr><div class="space"></div><div class="center"><a href="javascript:history.back()" class="btn btn-grey"><i class="ace-icon fa fa-arrow-left"></i>Go Back</a><a href="#/dashboard.html" class="btn btn-primary"><i class="ace-icon fa fa-tachometer"></i>Dashboard</a></div></div></div>'
        });
        ;
    }]);

webMgr.controller('navCtrl', ['$scope', '$location', function ($scope, $location) {

        $scope.getClass = function (path) {
            if ($location.path().substr(0, path.length) == path) {
                return "active open hover";
            } else {
                return "hover";
            }
            ;
        };
    }]);

webMgr.filter('dateToISO', function () {
    return function (input) {
        input = new Date(input).toISOString();
        return input;
    };
});

webMgr.directive('fileModel', [function () {
        return {
            restrict: "E",
            template: "<input type=\"file\" />",
            replace: true,
            require: "ngModel",
            link: function (scope, element, attr, ctrl) {
                var listener;
                listener = function () {
                    return scope.$apply(function () {
                        if (attr.multiple) {
                            return ctrl.$setViewValue(element[0].files);
                        } else {
                            return ctrl.$setViewValue(element[0].files[0]);
                        }
                    });
                };
                return element.bind("change", listener);
            }
        };
    }]);

//webMgr.config(['$routeProvider', function ($routeProvider) {
//        $routeProvider.when('/', {
//            templateUrl: 'views/admin/partials/dashboard.html',
//            controller: 'dashboardController'
//        }).when('/dashboard.html', {
//            templateUrl: 'views/admin/partials/dashboard.html',
//            controller: 'dashboardController'
//        }).when('/blogs/kategori.html', {
//            templateUrl: 'views/admin/partials/kategori/kategori.html',
//            controller: 'kategoriController'
//        }).when('/blogs/kategori/new.html', {
//            templateUrl: 'views/admin/partials/kategori/new.html',
//            controller: 'kategoriNewController'
//        }).when('/blogs/kategori/edit/:id/:any', {
//            templateUrl: 'views/admin/partials/kategori/edit.html',
//            controller: 'kategoriEditController'
//        }).when('/blogs/artikel.html', {
//            templateUrl: 'views/admin/partials/artikel/index.html',
//            controller: 'artikelController'
//        }).when('/blogs/artikel/new.html', {
//            templateUrl: 'views/admin/partials/artikel/new.html',
//            controller: 'artikelNewController'
//        }).when('/blogs/artikel/edit/:id/:any', {
//            templateUrl: 'views/admin/partials/artikel/edit.html',
//            controller: 'artikelEditController'
//        }).otherwise({
//            template: '<div class="error-container"><div class="well"><h1 class="grey lighter smaller"><span class="blue bigger-125"><i class="ace-icon fa fa-sitemap"></i>404</span>Page Not Found</h1><hr><h3 class="lighter smaller">We looked everywhere but we couldn"t find it!</h3><div><div class="space"></div><h4 class="smaller">Try one of the following:</h4><ul class="list-unstyled spaced inline bigger-110 margin-15"><li><i class="ace-icon fa fa-hand-o-right blue"></i>Re-check the url for typos</li><li><i class="ace-icon fa fa-hand-o-right blue"></i>Read the faq</li><li><i class="ace-icon fa fa-hand-o-right blue"></i>Tell us service it</li></ul></div><hr><div class="space"></div><div class="center"><a href="javascript:history.back()" class="btn btn-grey"><i class="ace-icon fa fa-arrow-left"></i>Go Back</a><a href="#/dashboard.html" class="btn btn-primary"><i class="ace-icon fa fa-tachometer"></i>Dashboard</a></div></div></div>'
//        });
//    }]);
//
//webMgr.controller('navCtrl', ['$scope', '$location', function ($scope, $location) {
//
//        $scope.getClass = function (path) {
//            if ($location.path().substr(0, path.length) == path) {
//                return "active open hover";
//            } else {
//                return "hover";
//            }
//            ;
//        };
//    }]);

