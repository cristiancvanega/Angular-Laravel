var app = angular.module('obsan');

app.controller("GestionUsuarios", [
    '$scope', '$http', '$filter', 'ngTableParams', 'TableService','$timeout', function($scope, $http, $filter, ngTableParams, TableService,$timeout)
{
    $scope.usuarios = [], $scope.total=0, $scope.usuarioEditar= {},
     $scope.usuarioBorrar ={}, $scope.usuarioCrear={};

    $scope.listar = function(page)
    {
        $http.get('http://obsan.eduagil.com/user')
            .success(function(data, status, headers, config)
            {
                $scope.usuarios = $scope.usuarios.concat(data);
                $scope.total=$scope.usuarios.length;
                $scope.tableParams = new ngTableParams({page:1, count:10, sorting: { id: 'asc'}}, {
                    total: $scope.usuarios.length,
                    getData: function($defer, params)
                    {
                        TableService.getTable($defer,params,$scope.filter, $scope.usuarios);
                    }
                });
                $scope.tableParams.reload();
                $scope.$watch("filter.$", function () {
                    $scope.tableParams.reload();
                });
            });
    };
    $scope.listar();

    $scope.eliminar= function()
    {
        $http.delete('http://obsan.eduagil.com/user/'+$scope.usuarioBorrar.id)
        .success(function(data, status, headers, config)
        {
            window.location.reload();
        });
    };

    $scope.editar= function()
    {
        $http.put('http://obsan.eduagil.com/user/'+$scope.usuarioEditar.id,{
            email: $scope.usuarioEditar.email,
            name: $scope.usuarioEditar.name
        })
            .success(function(data, status, headers, config)
        {
        });
    };

    $scope.crear= function()
    {
        $http.post('http://obsan.eduagil.com/user',{
            email: $scope.usuarioCrear.email,
            name: $scope.usuarioCrear.name,
            password: $scope.usuarioCrear.password
        })
            .success(function(data, status, headers, config)
        {
        });
    };


    $scope.showEdit = function(usuario)
    {
        $scope.usuarioEditar = usuario;

        $http.get('http://obsan.eduagil.com/user/'+$scope.usuarioEditar.id)
            .success(function(data, status, headers, config)
            {
            });
    };

    $scope.showDelete = function(usuario)
    {
        $scope.usuarioBorrar = usuario;
    };

}]);
