<?php
require '../repository/PessoaRepository.php';
require_once '../interfaces/IService.php';

class PessoaService implements IService{

	private $repository;

	public function __construct(){
		$this->repository = new PessoaRepository();
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