var app = angular.module('obsan');
//var url = "http://obsan.app/";
var url = "http://obsan.eduagil.com/";
showMenu();


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
            $http.get(url+$scope.recurso,{
                    headers : {
                        'token' : localStorage.getItem('token')
                    }
                })
            .success(function(data, status, headers, config)
            {
                    switch ($scope.descripcion)
                    {
                        case "IntervencionxIntervenido":
                            $scope.registros = $scope.registros.concat(data.interventions);
                            break;
                            case "EvaluacionxIntervencion":
                            $scope.registros = $scope.registros.concat(data.evaluations);
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
            $http.get(url+recurso,{
                    headers : {
                        'token' : localStorage.getItem('token')
                    }
                })
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
            $http.delete(url+$scope.recurso+'/'+$scope.registroBorrar.id,{
                    headers : {
                        'token' : localStorage.getItem('token')
                    }
                })
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        },

        editar:function($scope){
            $http.put(url+$scope.recurso+'/'+$scope.registroEditar.id,$scope.registroEditar,{
                    headers : {
                        'token' : localStorage.getItem('token')
                    }
                })
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        },

        crear: function($scope,datos){
            $http.post(url+$scope.recurso,datos,{
                    headers : {
                        'token' : localStorage.getItem('token')
                    }
                })
            .success(function(data, status, headers, config)
            {
                $location.path($scope.url);
                $route.reload();
            });
        },

        customReport: function($scope,datos){
            $http.post(url+$scope.recurso,datos,{
                    headers : {
                        'token' : localStorage.getItem('token')
                    }
                })
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

        signin: function($scope,datos){
            $http.post(url+$scope.recurso,datos)
            .success(function(data, status, headers, config)
            {
                console.log(status);
                if(status === 400)
                {
                    //TODO : show message "Credenciales inválidas"
                }
                if(status === 200)
                {
                    if(data.error === 'invalid_credentials')
                    {
                        return;
                        //TODO : show message "Credenciales inválidas"
                    }else{
                        localStorage.setItem('token', data.token);
                        localStorage.setItem('role', data.role);
                        console.log(localStorage.getItem('role'));
                        $scope.signout=true;
                        $scope.signin=false;
                        showMenu();
                    }
                }
            });
        }


    };
    return service;
});

function showMenu(){
    if(localStorage.getItem('role') == null)
    {
        return;
    }
    switch (localStorage.getItem('role')){
        case 'Normal':
            break;
        case 'OBSAN':
            $('#divobsan').removeAttr('hidden');
            $('#btnSignin').attr('hidden',true);
            $('#btnSignout').removeAttr('hidden');
            break;
        case 'Admin':
            $('#btnSignin').attr('hidden',true);
            $('#btnSignout').removeAttr('hidden');
            $('#usersdiv').removeAttr('hidden');
            $('#usersdiv2').removeAttr('hidden');
            $('#divobsan').removeAttr('hidden');
            break;
    }
}