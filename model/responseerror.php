<?php
class ResponseError {

	private $erro;	

	public function __construct(){
	}

	public function ResponseError(){
	}

	public function __get($atrib){
		return $this->$atrib;
	}	
	public function __set($atrib,$valor){
		$this->$atrib = $valor;
	}
	public function __toString(){
		return '<br />Erro: '.$this->erro;
	}
}
?>