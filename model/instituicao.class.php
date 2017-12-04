<?php
class Instituicao {
	
	private $id;
	private $nome;
	private $endereco;
	private $email;
	private $telefone;
		
	public function __construct(){
	}

	public function Usuario(){
	}
	
	public function __get($atrib){
		return $this->$atrib;
	}	
	public function __set($atrib,$valor){
		$this->$atrib = $valor;
	}
	public function __toString(){
		return '<br />Codigo: '.$this->id.
			   '<br />Nome: '.$this->nome.
		  	   '<br />Endereco: '.$this->endereco.
		  	   '<br />E-mail: '.$this->email.
        	   '<br />Telefone: '.$this->telefone;
	}
}
?>