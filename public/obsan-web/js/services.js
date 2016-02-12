var app = angular.module('obsan');
var jwt = '';
var url = "http://obsan.app/";
//var url = "http://obsan.eduagil.com/"; 


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
            $http.get(url+$scope.tabla+'?token='+jwt)
            .success(function(data, status, headers, config)
            {
                $scope.registros = $scope.registros.concat(data);
                $scope.total=$scope.registros.length;
                $scope.tableParams = new ngTableParams({page:1, count:10, sorting: { id: 'asc'}}, {
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

        eliminar:function($scope){
            $http.delete(url+$scope.tabla+'/'+$scope.registroBorrar.id+'?token='+jwt)
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        },

        editar:function($scope){
            $http.put(url+$scope.tabla+'/'+$scope.registroEditar.id,$scope.registroEditar+'?token='+jwt)
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        },

        crear: function($scope,datos){
            $http.post(url+$scope.tabla,datos+'?token='+jwt)
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        }


    };
    return service;

});
