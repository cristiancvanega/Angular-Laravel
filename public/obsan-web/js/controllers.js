var app = angular.module('obsan');

var btnShow=false;

app.controller('showsignin', ['$scope', 'serviceHttp', function($scope,serviceHttp) {
  $scope.recurso="auth/token";
  $scope.url="index.html";

  $scope.signin = function(){
    datos={
        email: $scope.email,
        password: $scope.password
    }
    serviceHttp.signin($scope,datos);
    $scope.email = '';
    $scope.password = '';
    $scope.userEmail = 'laslkslfdjnlds';
};
}]);

app.controller('signout', ['$scope','$location', function($scope,$location) {

  $scope.signout = function(){
    localStorage.setItem('token', null);
    localStorage.setItem('role', null);

    $location.path("/index.html");
    location.reload();
}
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
                role: $scope.registroCrear.role,
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
                phone: $scope.registroCrear.phone,
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

        $scope.tipoDocumento=[
            {id:'1',label:'Cédula de ciudadanía'},
            {id:'2',label:'Tarjeta de identidad'},
            {id:'3',label:'Registro civil de nacimiento'},
            {id:'4',label:'Cédula de extranjería'}
        ];

        $scope.escolaridad=[
            {id:'1',label:'Ninguna'},
            {id:'2',label:'Preescolar'},
            {id:'3',label:'Primaria'},
            {id:'4',label:'Bachillerato'},
            {id:'5',label:'Universidad'}
        ];

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
            for (var i = 0; i < $scope.tipoDocumento.length; i++) {
                if($scope.registroEditar.document_type==$scope.tipoDocumento[i].label){
                    $scope.registroEditar.document_type=$scope.tipoDocumento[i].id;
                }
            };
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
        $('.datepicker').datepicker();

        $scope.registros = [],$scope.total=0, $scope.registroEditar= {},$scope.AddIntervened_id,
        $scope.btnShow=false,$scope.registroBorrar ={},$scope.registroMunicipio =[],$scope.registroEntidad =[], 
        $scope.registroCrear={},$scope.recurso="",$scope.url="/intervencion",$scope.entidad
        $scope.registroIntervenidos =[],$scope.AddInt_intervention_id;

        $scope.listar = function()
        {
            $scope.recurso="intervention/with_em"
            serviceHttp.listar($scope);
            datosSelect("municipality");
            datosSelect("entity");
            datosSelect("intervened/id_names");
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

        $scope.showAddInt = function(registro)
        {
            $scope.AddInt_intervention_id = registro.id;
        };

        $scope.AddIntervened = function()
        {
            datos={
                interventions_id : $scope.AddInt_intervention_id,
                intervened_id : $scope.AddIntervened_id
            };

            $scope.recurso="intervention/add_intervened";
            serviceHttp.crear($scope,datos);
        };

    }]);


app.controller("GestionEvaluacion", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [],$scope.total=0, $scope.registroEditar= {},
        $scope.registroBorrar ={},$scope.registroIntervencion =[],$scope.registroUsuario =[], 
        $scope.registroCrear={},$scope.recurso="",$scope.url="/evaluacion",$scope.entidad;


        $scope.impacto=[
            {id:'1',label:'El impacto generado no presenta evidencias, el estado inicial es igual al estado final'},
            {id:'2',label:'El impacto generado no presenta evidencias, el estado inicial es menor  que el estado final'},
            {id:'3',label:'El impacto generado no presenta evidencias, el estado final es igual al estado ideal'},
            {id:'4',label:'El impacto generado presenta evidencias, el estado inicial es igual al estado final'},
            {id:'5',label:'El impacto generado presenta evidencias, el estado inicial es menor  que el estado final'},
            {id:'6',label:'El impacto generado presenta evidencias, el estado final es igual al estado ideal'},
            {id:'7',label:'El impacto generado presenta evidencias incompletas, el estado inicial es igual al estado final'},
            {id:'8',label:'El impacto generado presenta evidencias incompletas, el estado inicial es menor  que el estado final'},
            {id:'9',label:'El impacto generado presenta evidencias incompletas, el estado final es igual al estado ideal'}
        ];

        $scope.estado=[
            {id:'1',label:'bajo'},
            {id:'2',label:'medio'},
            {id:'3',label:'ideal'}
        ];

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
            serviceHttp.crear($scope,datos);
        };


        $scope.showEdit = function(registro)
        {
            $scope.registroEditar = registro;
        };

    }]);


app.controller("reportEvaluation", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [],$scope.total=0,$scope.recurso="",$scope.url="/reportEvaluation";

        $scope.listar = function()
        {
            $scope.recurso="report/evaluation";
            serviceHttp.listar($scope);
        };
        $scope.listar();
        $scope.downloadFiles = function()
        {
            serviceHttp.downloadFiles('report/evaluation/download', 'ReporteEvaluaciones.pdf');
        }
    }]);

app.controller("reportIntervention", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [],$scope.total=0,$scope.recurso="",$scope.url="/reportEvaluation";

        $scope.listar = function()
        {
            $scope.recurso="report/intervention";
            serviceHttp.listar($scope);
        };
        $scope.listar();
        $scope.downloadFiles = function()
        {
            serviceHttp.downloadFiles("report/intervention/download", 'ReporteIntervenciones.pdf');
        }
    }]);

app.controller("reportIntervened", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [],$scope.total=0,$scope.recurso="",$scope.url="/reportEvaluation";

        $scope.listar = function()
        {
            $scope.recurso="report/intervened";
            serviceHttp.listar($scope);
        };
        $scope.listar();
        $scope.downloadFiles = function()
        {
            serviceHttp.downloadFiles("report/intervened/download", 'ReporteIntervenidos.pdf');
        }
    }]);

app.controller("customReportIntervened", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [],$scope.total=0, $scope.registroConsultarIntervenido={},$scope.recurso=""
            ,$scope.registroInterventions = [],$scope.url="/reportEvaluation";

        $scope.getInterventions = function()
        {
            serviceHttp.consultar($scope, 'intervention');
        }

        $scope.getInterventions();

        $scope.customReport = function()
        {
            datos = {
                intervention_id : $scope.registroConsultarIntervenido.id,
            };
            console.log(datos.intervention_id);
            $scope.recurso="report/custom_report/intervened";
            serviceHttp.customReport($scope, datos);
        };
        $scope.downloadFiles = function()
        {
            serviceHttp.downloadFiles("report/custom_report/download/intervened", 'ReportePersonalizadoIntervenidos');
        }
    }]);

app.controller("customReportEvaluation", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        $scope.registros = [],$scope.total=0, $scope.resgistrosUsuariosIntervenciones = [],
            $scope.registroConsultarEvaluacion={},$scope.recurso="",$scope.url="/CustomReportEvaluation";

        $scope.getRegistroUI = function()
        {
            serviceHttp.consultar($scope, "evaluation/user_intervention");
        }

        $scope.getRegistroUI();

        $scope.customReport = function()
        {
            datos = {
                intervention_id         : $scope.registroConsultarEvaluacion.intervention_id,
                user_id                 : $scope.registroConsultarEvaluacion.user_id,
                impacto                 : $scope.registroConsultarEvaluacion.impacto,
                estado_inicial          : $scope.registroConsultarEvaluacion.estado_inicial,
                estado_final            : $scope.registroConsultarEvaluacion.estado_final
            };
            $scope.recurso="report/custom_report/evaluation";
            serviceHttp.customReport($scope, datos);
        };

        $scope.downloadFiles = function()
        {
            serviceHttp.downloadFiles('report/custom_report/download/evaluation', 'ReportePersonalizadoEvaluaciones');
        }
}]);
app.controller("customReportIntervention", [
    '$scope','serviceHttp',
    function($scope,serviceHttp)
    {
        changeDatepicker = function(value)
        {
            if(value == 2)
            {
                $('#dateYear').removeAttr('hidden');
                $('#dateYear').show();
                $('#dateFull').hide();
            }
            if(value == 1)
            {
                $('#dateYear').hide();
                $('#dateFull').removeAttr('hidden');
                $('#dateFull').show();
            }
            console.log(value);
        }
        $('.datepicker').datepicker();
        $('.datepickerYear').datepicker({
            format: " yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
        $scope.registros = [],$scope.total=0, $scope.registroConsultarIntervencion={},$scope.recurso="",
            $scope.registroEntidadesMunicipios = [], $scope.url="/reportEvaluation";

        $scope.getRegistroEM = function()
        {
            serviceHttp.consultar($scope, 'intervention/fields_custom_report');
        }

        $scope.getRegistroEM();
        $scope.customReport = function()
        {
            datos = {
                entity_id               : $scope.registroConsultarIntervencion.entity_id,
                municipality_id         : $scope.registroConsultarIntervencion.municipality_id,
                name                    : $scope.registroConsultarIntervencion.name,
                start_date              : $scope.registroConsultarIntervencion.start_date,
                end_date                : $scope.registroConsultarIntervencion.end_date,
                description             : $scope.registroConsultarIntervencion.description,
                evidencias_planeadas    : $scope.registroConsultarIntervencion.evidencias_planeadas,
                date                    : $scope.registroConsultarIntervencion.date,
                forDate                 : $scope.registroConsultarIntervencion.type_date
            };
            $scope.registroConsultarIntervencion = null;
            console.log(datos);
            $scope.recurso="report/custom_report/intervention";
            serviceHttp.customReport($scope, datos);
        };

        $scope.downloadFiles = function()
        {
            serviceHttp.downloadFiles('report/custom_report/download/intervention', 'ReportePerzonalizadoIntervencion.pdf');
        }
    }]);


app.controller("IntervencionxIntervenido", [
    '$scope','serviceHttp','$routeParams','$location',
    function($scope,serviceHttp,$routeParams,$location)
    {
        $scope.registros = [],$scope.total=0, $scope.registroEditar= {},$scope.btnShow=btnShow,
        $scope.registroBorrar ={},$scope.registroMunicipio =[],$scope.registroEntidad =[], 
        $scope.registroCrear={},$scope.recurso="",$scope.url="",$scope.entidad,
        $scope.descripcion="IntervencionxIntervenido";
        
        $('.datepicker').datepicker();

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
                start_date: $scope.registroCrear.start_date,
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


        $scope.impacto=[
            {id:1,label:'El impacto generado no presenta evidencias, el estado inicial es igual al estado final'},
            {id:2,label:'El impacto generado no presenta evidencias, el estado inicial es menor  que el estado final'},
            {id:3,label:'El impacto generado no presenta evidencias, el estado final es igual al estado ideal'},
            {id:4,label:'El impacto generado presenta evidencias, el estado inicial es igual al estado final'},
            {id:5,label:'El impacto generado presenta evidencias, el estado inicial es menor  que el estado final'},
            {id:6,label:'El impacto generado presenta evidencias, el estado final es igual al estado ideal'},
            {id:7,label:'El impacto generado presenta evidencias incompletas, el estado inicial es igual al estado final'},
            {id:8,label:'El impacto generado presenta evidencias incompletas, el estado inicial es menor  que el estado final'},
            {id:9,label:'El impacto generado presenta evidencias incompletas, el estado final es igual al estado ideal'}
        ];

        $scope.estado=[
            {id:'1',label:'bajo'},
            {id:'2',label:'medio'},
            {id:'3',label:'ideal'}
        ];

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
            for (var i = 0; i < $scope.impacto.length; i++) {
                if ($scope.registroCrear.impacto==$scope.impacto[i].label){
                    $scope.registroCrear.impacto=$scope.impacto[i].id;
                }
            };

            console.log($scope.registroCrear.impacto);

            datos={
                intervention_id: $routeParams.id,
                user_email: localStorage.getItem('email'),
                impacto: $scope.registroCrear.impacto,
                description: $scope.registroCrear.description,
                estado_inicial: $scope.registroCrear.estado_inicial,
                estado_final: $scope.registroCrear.estado_final,
                recomendaciones: $scope.registroCrear.recomendaciones
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
