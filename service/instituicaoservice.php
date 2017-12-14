<?php
require '../dao/instituicaodao.class.php';
require '../interfaces/iservice.class.php';
class InstituicaoService implements IService{

	public function save($object){
		$iDAO = new InstituicaoDAO();
		$iDAO->save($object);
	}

	public function find($cod){

	}

	public function findAll(){

	}

	public function delete($cod){

	}

	public function update($object){

	}
}
?>