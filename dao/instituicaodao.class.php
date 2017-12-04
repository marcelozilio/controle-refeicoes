<?php
include '../persistence/connectiondatabase.class.php';
class instituicaodao implements IDAO{

	private $connection=null;
	
	public function __construct(){		
		$this->connection = ConnectionDataBase::getConnection();   
	}

	public function save(){

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