<?php
require '../repository/InstituicaoRepository.php';
require '../interfaces/IService.php';

class InstituicaoService implements IService{

	private $repository;

	public function __construct(){
		$this->repository = new InstituicaoRepository();
	}	

	public function save($object){
		try {
			return $this->repository->save($object);	
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function find($id){
		try {
			return $this->repository->find($cod);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}			
	}

	public function findAll(){
		try {
			return $this->repository->findAll();
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}			
	}

	public function delete($id){
		try {
			return $this->repository->delete($id);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function update($object){

	}
}