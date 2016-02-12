var app = angular.module('obsan');

app.controller("GestionUsuarios", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [], $scope.total=0, $scope.registroEditar= {},
        $scope.registroBorrar ={}, $scope.registroCrear={},$scope.tabla="user"
        $scope.url="/usuarios";

        $scope.listar = function()
        {
            serviceHttp.listar($scope);
        };
        $scope.listar();

        $scope.eliminar= function()
        {
            serviceHttp.eliminar($scope);
        };

        $scope.editar= function()
        {
            serviceHttp.editar($scope);
        };

        $scope.crear= function()
        {
            datos={
                email: $scope.registroCrear.email,
                name: $scope.registroCrear.name,
                password: $scope.registroCrear.password
            }
            serviceHttp.crear($scope,datos);
        };


        $scope.showEdit = function(registro)
        {
            $scope.registroEditar = registro;

        };

        $scope.showDelete = function(registro)
        {
            $scope.registroBorrar = registro;
        };

    }]);


app.controller("GestionEntidades", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [], $scope.total=0, $scope.registroEditar= {},
        $scope.registroBorrar ={}, $scope.registroCrear={},$scope.tabla="entity",
        $scope.url="/entidades";

        $scope.listar = function()
        {
            serviceHttp.listar($scope);
        };
        $scope.listar();

        $scope.eliminar= function()
        {
            serviceHttp.eliminar($scope);
        };

        $scope.editar= function()
        {
            serviceHttp.editar($scope);
        };

        $scope.crear= function()
        {
            datos={
                name: $scope.registroCrear.name,
                email: $scope.registroCrear.email,
                phone: $scope.registroCrear.phone
            }
            serviceHttp.crear($scope,datos);
        };


        $scope.showEdit = function(registro)
        {
            $scope.registroEditar = registro;

        };

        $scope.showDelete = function(registro)
        {
            $scope.registroBorrar = registro;
        };

    }]);

app.controller("GestionMunicipios", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [], $scope.total=0, $scope.registroEditar= {},
        $scope.registroBorrar ={}, $scope.registroCrear={},$scope.tabla="municipality",
        $scope.url="/municipios";

        $scope.listar = function()
        {
            serviceHttp.listar($scope);
        };
        $scope.listar();

        $scope.eliminar= function()
        {
            serviceHttp.eliminar($scope);
        };

        $scope.editar= function()
        {
            serviceHttp.editar($scope);
        };

        $scope.crear= function()
        {
            datos={
                name: $scope.registroCrear.name,
            }
            serviceHttp.crear($scope,datos);
        };


        $scope.showEdit = function(registro)
        {
            $scope.registroEditar = registro;

        };

        $scope.showDelete = function(registro)
        {
            $scope.registroBorrar = registro;
        };

    }]);

app.controller("GestionIntervenido", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [], $scope.total=0, $scope.registroEditar= {},
        $scope.registroBorrar ={}, $scope.registroCrear={},$scope.tabla="intervened",
        $scope.url="/intervenidos";

        $scope.listar = function()
        {
            serviceHttp.listar($scope);
        };
        $scope.listar();


        $scope.eliminar= function()
        {
            serviceHttp.eliminar($scope);
        };

        $scope.editar= function()
        {
            console.log($scope.registroEditar);
            serviceHttp.editar($scope);
        };

        $scope.crear= function()
        {
            datos={
                name: $scope.registroCrear.name,
                document_type: $scope.registroCrear.document_type ,      
                document: $scope.registroCrear.document,
                address: $scope.registroCrear.address,
                phone: $scope.registroCrear.phone,
                email: $scope.registroCrear.email,
                pupilage: $scope.registroCrear.pupilage
            }
            console.log(datos);
            serviceHttp.crear($scope,datos);
        };


        $scope.showEdit = function(registro)
        {
            $scope.registroEditar = registro;

        };

        $scope.showDelete = function(registro)
        {
            $scope.registroBorrar = registro;
        };

    }]);


app.controller("GestionIntervencion", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [],$scope.copiaregistros=[],$scope.total=0, $scope.registroEditar= {},
        $scope.registroBorrar ={},$scope.registroMunicipio =[],$scope.registroEntidad =[], 
        $scope.municipality={},
        $scope.registroCrear={},$scope.tabla="intervention",$scope.url="/intervencion",$scope.entidad;

        $scope.listar = function()
        {
            serviceHttp.listar($scope);
            datosSelect("municipality");
            datosSelect("entity");
        };
        $scope.listar();
        
        function datosSelect(tabla){
            serviceHttp.consultar($scope,tabla);
        };

        $scope.eliminar= function()
        {
            serviceHttp.eliminar($scope);
        };

        $scope.editar= function()
        {
            serviceHttp.editar($scope);
        };

        $scope.crear= function()
        {
            datos={
                name: $scope.registroCrear.name,
                email: $scope.registroCrear.email,
                phone: $scope.registroCrear.phone
            }
            serviceHttp.crear($scope,datos);
        };


        $scope.showEdit = function(registro)
        {
            $scope.registroEditar = registro;

        };

        $scope.showDelete = function(registro)
        {
            $scope.registroBorrar = registro;
        };

    }]);

