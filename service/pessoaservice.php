<?php
require '../repository/pessoarepository.php';
require '../interfaces/iservice.php';
class InstituicaoService implements IService{

	public function save($object){
		$pRepository = new PessoaRepository();
		$pRepository->save($object);
	}

	public function find($cod){
		$pRepository = new PessoaRepository();
		$array = $pRepository->find($cod);
		return $array;
	}

	public function findAll(){
		$pRepository = new PessoaRepository();
		$array = $pRepository->findAll();
		return $array;
	}

	public function delete($cod){

	}

	public function update($object){

	}
}
?>