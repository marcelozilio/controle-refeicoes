<?php
require '../dao/instituicaodao.class.php';
require '../interfaces/iservice.class.php';
class InstituicaoService implements IService{

	public function save($object){
		$iDAO = new InstituicaoDAO();
		$iDAO->save($object);
	}

	public function find($cod){
		$iDAO = new InstituicaoDAO();
		$array = $iDAO->find($cod);
		return $array;
	}

	public function findAll(){
		$iDAO = new InstituicaoDAO();
		$array = $iDAO->findAll();
		return $array;
	}

	public function delete($cod){

	}

	public function update($object){

	}
}
?>