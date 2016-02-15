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
    .when("/intervencion", {
        controller: "GestionIntervencion",
        templateUrl: "views/intervencion.html"
    })
    .when("/evaluacion", {
        controller: "GestionEvaluacion",
        templateUrl: "views/evaluacion.html"
    }).
    when("/intervenido/intervencion/:id", {
        controller: "IntervencionxIntervenido",
        templateUrl: "views/intervencion.html"
    }).
    when("/intervencion/evaluacion/:id", {
        controller: "EvaluacionxIntervencion",
        templateUrl: "views/evaluacion.html"
    }).
    when("obsan", {
        templateUrl: "index_uso.html"
    }).
    when("admin", {
        templateUrl: "index_usa.html"
    })
    .otherwise({
        redirectTo: 'index.html'
    });
}]);








