<?php
class Refeicao {

	private $id;
	private $idInstituicao;
	private $idFoto;
	private $descricao;	
	private $dataCadastro;
	private $dataRefeicao;
	private $imagem;

	public function __construct(){
	}

	public function Refeicao(){
	}

	public function __get($atrib){
		return $this->$atrib;
	}	
	public function __set($atrib,$valor){
		$this->$atrib = $valor;
	}
	public function __toString(){
		return '<br />Codigo: '.$this->id.
		'<br />Id Instituicao: '.$this->idInstituicao.
		'<br />Id Foto: '.$this->idFoto.
		'<br />Descricao: '.$this->descricao.
		'<br />Data Cadastro: '.$this->dataCadastro.
		'<br />Data Refeicao: '.$this->dataRefeicao;
		'<br />Data Refeicao: '.$this->imagem;
	}
}
?>