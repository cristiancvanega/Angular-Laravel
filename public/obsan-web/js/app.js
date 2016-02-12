var app = angular.module('obsan', ["ngRoute","ngTable"]);


app.config(["$routeProvider", function($routeProvider)
{
    $routeProvider 
    .when("/usuarios", {
        controller: "GestionUsuarios",
        templateUrl: "views/listUsr.html"
    })
    .when("/entidades", {
        controller: "GestionEntidades",
        templateUrl: "views/listEnt.html"
    })
    .when("/municipios", {
        controller: "GestionMunicipios",
        templateUrl: "views/listMunicipio.html"
    })
    .when("/intervenidos", {
        controller: "GestionIntervenido",
        templateUrl: "views/intervenido.html"
    })
    .otherwise({
        redirectTo: 'index.html'
    });
}]);








