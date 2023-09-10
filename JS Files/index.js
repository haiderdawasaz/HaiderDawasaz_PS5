var main = angular.module("mainApp", ['ngRoute']);

main.config(function($routeProvider){
    $routeProvider.when("/view", {
        templateUrl: '../views/view.php',
    })
    .when("/add", {
        templateUrl: '../views/add.html'
    })
    .when("/manage", {
        templateUrl: '../views/manage.php'
    })
    .when("/update", {
        templateUrl: '../views/update.php'
    })
    .otherwise({redirectTo: "/view"})
});