var app = angular.module('obsan');

var btnShow=false;

app.controller('showsignin', ['$scope', function($scope) {
  $scope.signout = false;
  $scope.signin = true;
}]);


app.controller("GestionUsuarios", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [], $scope.total=0, $scope.registroEditar= {},
        $scope.registroBorrar ={}, $scope.registroCrear={},$scope.recurso="user"
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
        $scope.registroBorrar ={}, $scope.registroCrear={},$scope.recurso="entity",
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
        $scope.registroBorrar ={}, $scope.registroCrear={},$scope.recurso="municipality",
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
    '$scope','serviceHttp','$location',
    function($scope,serviceHttp,$location)
    {
        $scope.registros = [], $scope.total=0, $scope.registroEditar= {},
        $scope.registroBorrar ={}, $scope.registroCrear={},$scope.recurso="intervened",
        $scope.url="/intervenidos",$scope.btnShow=btnShow;

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

        $scope.showIntervention = function(registro){
            btnShow=true;
            $location.path("/intervenido/intervencion/"+registro.id);
        };

    }]);


app.controller("GestionIntervencion", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [],$scope.total=0, $scope.registroEditar= {},$scope.btnShow=false,
        $scope.registroBorrar ={},$scope.registroMunicipio =[],$scope.registroEntidad =[], 
        $scope.registroCrear={},$scope.recurso="",$scope.url="/intervencion",$scope.entidad;

        $scope.listar = function()
        {
            $scope.recurso="intervention/with_em"
            serviceHttp.listar($scope);
            datosSelect("municipality");
            datosSelect("entity");
            $scope.recurso="intervention"
        };
        $scope.listar();
        
        function datosSelect(recurso){
            serviceHttp.consultar($scope,recurso);
        };

        $scope.editar= function()
        {   
            $scope.registroEditar.entity_id=$scope.registroEditar.entity.id;
            $scope.registroEditar.municipality_id=$scope.registroEditar.municipality.id;
            serviceHttp.editar($scope);
        };

        $scope.showEdit = function(registro)
        {
            $scope.registroEditar = registro;
        };

    }]);


app.controller("GestionEvaluacion", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [],$scope.total=0, $scope.registroEditar= {},
        $scope.registroBorrar ={},$scope.registroIntervencion =[],$scope.registroUsuario =[], 
        $scope.registroCrear={},$scope.recurso="",$scope.url="/evaluacion",$scope.entidad;

        $scope.listar = function()
        {
            $scope.recurso="evaluation/with_iu";
            serviceHttp.listar($scope);
            datosSelect("user");
            datosSelect("intervention");
            $scope.recurso="evaluation";
        };
        $scope.listar();
        
        function datosSelect(recurso){
            serviceHttp.consultar($scope,recurso);
        };


        $scope.editar= function()
        {   
            $scope.registroEditar.intervention_id=$scope.registroEditar.intervention.id;
            $scope.registroEditar.user_id=$scope.registroEditar.user.id;
            serviceHttp.editar($scope);
        };

        $scope.crear= function()
        {
            datos={
                
            }
            serviceHttp.crear($scope,datos);
        };


        $scope.showEdit = function(registro)
        {
            $scope.registroEditar = registro;
        };

    }]);


app.controller("IntervencionxIntervenido", [
    '$scope','serviceHttp','$routeParams','$location',
    function($scope,serviceHttp,$routeParams,$location)
    {
        $scope.registros = [],$scope.total=0, $scope.registroEditar= {},$scope.btnShow=btnShow,
        $scope.registroBorrar ={},$scope.registroMunicipio =[],$scope.registroEntidad =[], 
        $scope.registroCrear={},$scope.recurso="",$scope.url="",$scope.entidad,
        $scope.descripcion="IntervencionxIntervenido";


        $scope.listar = function()
        {
            $scope.recurso="/intervened/intervention/"+$routeParams.id;
            $scope.url="/intervenido/intervencion/"+$routeParams.id;
            serviceHttp.listar($scope);
            datosSelect("municipality");
            datosSelect("entity");
            $scope.recurso="intervention"
        };
        $scope.listar();
        
        function datosSelect(recurso){
            serviceHttp.consultar($scope,recurso);
        };

        $scope.eliminar= function()
        {
            serviceHttp.eliminar($scope);
        };

        $scope.editar= function()
        {   
            $scope.registroEditar.entity_id=$scope.registroEditar.entity.id;
            $scope.registroEditar.municipality_id=$scope.registroEditar.municipality.id;
            serviceHttp.editar($scope);
        };

        $scope.crear= function()
        {
            datos={
                name: $scope.registroCrear.name,
                entity_id: $scope.registroCrear.entity_id ,      
                municipality_id: $scope.registroCrear.municipality_id,
                description: $scope.registroCrear.description,
                evidencias_planeadas: $scope.registroCrear.evidencias_planeadas,
                intervened_id: $routeParams.id
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

        $scope.showEvaluation = function(registro){
            btnShow=true;
            $location.path("/intervencion/evaluacion/"+registro.id);
        };

    }]);


app.controller("EvaluacionxIntervencion", [
    '$scope','serviceHttp','$routeParams',
    function($scope,serviceHttp,$routeParams)
    {
        $scope.registros = [],$scope.total=0, $scope.registroEditar= {},$scope.btnShow=btnShow,
        $scope.registroBorrar ={},$scope.registroIntervencion =[],$scope.registroUsuario =[], 
        $scope.registroCrear={},$scope.recurso="",$scope.url="",$scope.entidad,
        $scope.descripcion="EvaluacionxIntervencion";


        $scope.listar = function()
        {
            $scope.recurso="/intervention/evaluation/"+$routeParams.id;
            $scope.url="/intervencion/evaluacion/"+$routeParams.id;
            serviceHttp.listar($scope);
            datosSelect("user");
            datosSelect("intervention");
            $scope.recurso="evaluation";
        };
        $scope.listar();
        
        function datosSelect(recurso){
            serviceHttp.consultar($scope,recurso);
        };

        $scope.eliminar= function()
        {
            serviceHttp.eliminar($scope);
        };

        $scope.editar= function()
        {   
            //$scope.registroEditar.intervention_id=$scope.registroEditar.intervention.id;
            $scope.registroEditar.user_id=$scope.registroEditar.user.id;
            serviceHttp.editar($scope);
        };

        $scope.crear= function()
        {
            datos={
                
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

