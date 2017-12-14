angular.module("Refeicoes", [])
.value('urlBase', 'http://localhost:8080/ControleRefeicoes/webresources/ws.php/')
.controller("InstituicaoController", function ($http, urlBase) {
    var self = this;
    self.intituicao = {};
    self.instituicoes = [];

    self.save = function () {
        $http({                    
            url: urlBase + 'intituicao/save',
            data: self.intituicao,
            method: 'POST',
            headers : {'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'}               
        }).then(function succesCallBack (response) {                                        
            alert(response.data);
        }, function errorCallBack (erro) {
            alert(response.data);
        });
    };

    
});