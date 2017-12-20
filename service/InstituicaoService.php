<?php
require '../repository/InstituicaoRepository.php';
require '../interfaces/IService.php';
class InstituicaoService implements IService{

	private $repository;

	public function __construct(){
		$this->repository = new InstituicaoRepository();
	}	

	public function save($object){		
		return $this->repository->save($object);
	}

	public function find($id){
		return $this->repository->find($cod);		
	}

	public function findAll(){		
		return $this->repository->findAll();		
	}

	public function delete($id){

	}

	public function update($object){

	}
}
?>