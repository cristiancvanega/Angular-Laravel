var app         = angular.module('obsan');
//var jwt         = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL29ic2FuLmFwcFwvYXV0aFwvdG9rZW4iLCJpYXQiOjE0NTUyNDk0ODYsImV4cCI6MTQ1NTI4NTQ4NiwibmJmIjoxNDU1MjQ5NDg2LCJqdGkiOiI0MTQ1YTQ1NTU4MWRmZmY3ZWE1ZjkwYWRkNTRiODQ1ZSJ9.f3lGK7g_7rRQdVAMhaGxpLhj5qGmapztIlUu_NS156E';
var jwt         = '';
//var prefixJWT   = '?token=';
var prefixJWT   = '';
//var url       = "http://obsan.app/";
var url         = "http://obsan.eduagil.com/";


app.service('TableService', function ($http, $filter) {

    function filterData(data, filter){
        return $filter('filter')(data, filter)
    }

    function orderData(data, params){
        return params.sorting() ? $filter('orderBy')(data, params.orderBy()) : filteredData;
    }

    function sliceData(data, params){
        return data.slice((params.page() - 1) * params.count(), params.page() * params.count())
    }

    function transformData(data,filter,params){
        return sliceData( orderData( filterData(data,filter), params ), params);
    }

    var service = {
        cachedData:[],
        getTable:function($defer, params, filter, data){

            if(service.cachedData.length>0){
                service.cachedData = data;
                var filteredData = filterData(service.cachedData,filter);
                var transformedData = sliceData(orderData(filteredData,params),params);
                params.total(filteredData.length)
                $defer.resolve(transformedData);
            }
            else
            {
                angular.copy(data,service.cachedData)
                params.total(data.length)
                var filteredData = $filter('filter')(data, filter);
                var transformedData = transformData(data,filter,params)
                $defer.resolve(transformedData);
            }
        }
    };
    return service;

});

app.service('serviceHttp', function ($http, $filter,$timeout,ngTableParams,$route,TableService,$location) {


    var service = {
        listar:function($scope){
            $http.get(url+$scope.recurso+prefixJWT+jwt)
            .success(function(data, status, headers, config)
            {
                    switch ($scope.descripcion) {
                    case "IntervencionxIntervenido":
                        $scope.registros = $scope.registros.concat(data.interventions);
                        break;
                        case "EvaluacionxIntervencion":
                        $scope.registros = $scope.registros.concat(data.evaluations);
                        //console.log(data);
                        break;
                    default:
                        $scope.registros = $scope.registros.concat(data);
                        break;
                };


                $scope.total=$scope.registros.length;
                $scope.tableParams = new ngTableParams({page:1, count:10, sorting: { name: 'asc'}}, {
                    total: $scope.registros.length,
                    getData: function($defer, params)
                    {
                        TableService.getTable($defer,params,$scope.filter, $scope.registros);
                    }
                });
                $scope.tableParams.reload();
                $scope.$watch("filter.$", function () {
                    $scope.tableParams.reload();
                });
            });

        },

        consultar:function($scope,recurso){
            $http.get(url+recurso+prefixJWT+jwt)
            .success(function(data, status, headers, config)
            {   
                switch (recurso) {
                    case "entity":
                        $scope.registroEntidad = data;
                        break;
                    case "municipality":
                         $scope.registroMunicipio = data;
                        break;
                    case "user":
                        $scope.registroUsuario = data;
                        break;
                    case "intervention":
                        $scope.registroIntervencion = data;
                        break;
                    default:
                        break;
                }
            });

        },

        eliminar:function($scope){
            $http.delete(url+$scope.recurso+'/'+$scope.registroBorrar.id+prefixJWT+jwt)
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        },

        editar:function($scope){
            $http.put(url+$scope.recurso+'/'+$scope.registroEditar.id+prefixJWT+jwt,$scope.registroEditar)
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        },

        crear: function($scope,datos){
            $http.post(url+$scope.recurso+prefixJWT+jwt,datos)
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        }


    };
    return service;

});
