var app = angular.module('obsan', ["ngRoute","ngTable"]);


app.config(["$routeProvider", function($routeProvider)
{
    $routeProvider 
    .when("/usuarios", {
        controller: "GestionUsuarios",
        templateUrl: "views/listUsr.html"
    })
    .otherwise({
        redirectTo: 'index.html'
    });
}]);








