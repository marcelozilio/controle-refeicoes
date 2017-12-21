var appName = 'RefeicoesApp';

angular
.module(appName, []);

angular
.module(appName)
.value('wsUrl', 'http://localhost:8080/ControleRefeicoes/webresources/ws.php/');

angular
.module(appName)
.factory('WSService', function($http, wsUrl) {
    var defaultHeaderVars = {
        'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'
    };

    var postRequest = function(urlPath, data) {
        return $http({
            method: 'POST',
            headers: defaultHeaderVars,
            url: wsUrl + urlPath,
            data: data || {}
        });
    };

    var getRequest = function(urlPath, data) {
        return $http({
            method: 'GET',
            headers: defaultHeaderVars,
            url: wsUrl + urlPath
        });
    };

    return {
        post: postRequest,
        get: getRequest
    }
});

angular
.module(appName)
.directive("fileread", function () {
    return {
        scope: {
            fileread: "="
        },
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                var reader = new FileReader();
                reader.onload = function (loadEvent) {
                    scope.$apply(function () {
                        scope.fileread = loadEvent.target.result;
                    });
                }
                reader.readAsDataURL(changeEvent.target.files[0]);
            });
        }
    }
});

angular
.module(appName)
.controller("InstituicaoController", function (WSService) {
    var vm = this;
    vm.instituicao = {};

    vm.save = function () {        
        WSService.post('instituicao/save', vm.instituicao)
        .then(function(response) {
            alert(response.data);
        }, function(error) {
            alert(error.data);
        });
    };
});

angular
.module(appName)
.controller("ListInstituicaoController", function (WSService) {
    var vm = this;
    vm.instituicoes = [];

    vm.findAll = function () {
        WSService.get('instituicao/findAll')
        .then(function(response) {
            vm.instituicoes = response.data;
        }, function(error) {
            alert(error.data);
        });
    };

    vm.$onInit = function () {
        vm.findAll();
    };
});

angular
.module(appName)
.controller("PessoaController", function (WSService) {
    var vm = this;
    vm.pessoa = {};

    vm.save = function () {        
        WSService.post('pessoa/save', vm.pessoa)
        .then(function(response) {
            alert(response.data);
        }, function(error) {
            alert(error.data);
        });
    };
});

angular
.module(appName)
.controller("ListPessoaController", function (WSService) {
    var vm = this;
    vm.pessoas = [];

    vm.findAll = function () {
        WSService.get('pessoa/findAll')
        .then(function(response) {
            vm.pessoas = response.data;
        }, function(error) {
            alert(error.data);
        });
    };

    vm.$onInit = function () {
        vm.findAll();
    };
});

angular
.module(appName)
.controller("RefeicaoController", function (WSService) {
    var vm = this;
    vm.refeicao = {};

    vm.save = function () { 
        vm.refeicao.dataCadastro = new Date();       

        WSService.post('refeicao/save', vm.refeicao)
        .then(function(response) {
            alert(response.data);
        }, function(error) {
            alert(error.data);
        });
    };
});

angular
.module(appName)
.controller("ListRefeicaoController", function (WSService) {
    var vm = this;
    vm.refeicoes = [];

    vm.findAll = function () {
        WSService.get('refeicao/findAll')
        .then(function(response) {
            vm.refeicoes = response.data;
        }, function(error) {
            alert(error.data);
        });
    };

    vm.$onInit = function () {
        vm.findAll();
    };
});