<?php
class Foto {

	private $id;
	private $foto;	

	public function __construct(){
	}

	public function Foto(){
	}

	public function __get($atrib){
		return $this->$atrib;
	}	
	public function __set($atrib,$valor){
		$this->$atrib = $valor;
	}
	public function __toString(){
		return '<br />Id: '.$this->id;
	}
}
?>