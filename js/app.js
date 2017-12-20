angular.module("Refeicoes", [])
.value('urlBase', 'http://localhost:8080/ControleRefeicoes/webresources/ws.php/')
.controller("InstituicaoController", function ($http, urlBase) {
    var self = this;
    self.instituicao = {};

    self.save = function () {        
        $http({                    
            url: urlBase + 'instituicao/save',
            data: self.instituicao,
            method: 'POST',
            headers : {'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'}               
        }).then(function succesCallBack (response) {                                        
            alert(response.data);
        }, function errorCallBack (erro) {            
        });
    };
})
.controller("ListInstituicaoController", function ($http, urlBase) {
    var self = this;
    self.instituicoes = [];

    self.findAll = function () {
        $http({
            method: 'GET',
            url: urlBase + 'instituicao/findAll'
        }).then(function succesCallBack (response) {
            self.instituicoes = response.data;
        }, function errorCallBack (erro) {           
        });
    };

    self.findAll();
})
.controller("PessoaController", function ($http, urlBase) {
    var self = this;
    self.pessoa = {};

    self.save = function () {        
        $http({                    
            url: urlBase + 'pessoa/save',
            data: self.pessoa,
            method: 'POST',
            headers : {'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'}               
        }).then(function succesCallBack (response) {                                        
            alert(response.data);
        }, function errorCallBack (erro) {            
        });
    };
})
.controller("ListPessoaController", function ($http, urlBase) {
    var self = this;
    self.pessoas = [];

    self.findAll = function () {
        $http({
            method: 'GET',
            url: urlBase + 'pessoa/findAll'
        }).then(function succesCallBack (response) {
            self.pessoas = response.data;
        }, function errorCallBack (erro) {           
        });
    };

    self.findAll();
});