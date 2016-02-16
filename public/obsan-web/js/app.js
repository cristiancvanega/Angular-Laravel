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
    when("/reportIntervened", {
        controller:  "reportIntervened",
        templateUrl: "views/reportIntervened.html"
    }).
    when("/reportEvaluation", {
        controller:  "reportEvaluation",
        templateUrl: "views/reportEvaluation.html"
    }).
    when("/reportIntervention", {
        controller:  "reportIntervention",
        templateUrl: "views/reportIntervention.html"
    })
    .otherwise({
        redirectTo: 'index.html'
    });
}]);








