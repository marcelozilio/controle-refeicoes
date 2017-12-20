<?php
require '../repository/instituicaorepository.php';
require '../interfaces/iservice.php';
class InstituicaoService implements IService{

	public function save($object){
		$iRepository = new InstituicaoRepository();
		return $iRepository->save($object);
	}

	public function find($cod){
		$iRepository = new InstituicaoRepository();
		$array = $iRepository->find($cod);
		return $array;
	}

	public function findAll(){
		$iRepository = new InstituicaoRepository();
		$array = $iRepository->findAll();
		return $array;
	}

	public function delete($cod){

	}

	public function update($object){

	}
}
?>