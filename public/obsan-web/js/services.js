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
            $http.get(url+$scope.tabla+prefixJWT+jwt)
            .success(function(data, status, headers, config)
            {
                $scope.registros = $scope.registros.concat(data);
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

        consultar:function($scope,tabla){
            $http.get(url+tabla+prefixJWT+jwt)
            .success(function(data, status, headers, config)
            {   
                if(tabla=="entity"){
                    $scope.registroEntidad = data;
                }

                if(tabla=="municipality"){
                    $scope.registroMunicipio = data;
                }
            });

        },

        eliminar:function($scope){
            $http.delete(url+$scope.tabla+'/'+$scope.registroBorrar.id+prefixJWT+jwt)
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        },

        editar:function($scope){
            $http.put(url+$scope.tabla+'/'+$scope.registroEditar.id,$scope.registroEditar+prefixJWT+jwt)
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        },

        crear: function($scope,datos){
            $http.post(url+$scope.tabla,datos+prefixJWT+jwt)
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        }


    };
    return service;

});
