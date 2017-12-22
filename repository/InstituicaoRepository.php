<?php
require_once '../persistence/ConnectionDataBase.class.php';
require_once '../interfaces/IRepository.php';
require '../model/Instituicao.php';

class InstituicaoRepository implements IRepository{

	private $connection=null;
	
	public function __construct(){
		$this->connection = ConnectionDataBase::getConnection();   
	}

	public function save($object){
		try{
			$stat=$this->connection->prepare("insert into instituicao(id,nome,endereco,email,telefone)values(null,?,?,?,?)");
			$stat->bindValue(1,$object->nome);
			$stat->bindValue(2,$object->endereco);
			$stat->bindValue(3,$object->email);
			$stat->bindValue(4,$object->telefone);		
		
			$stat->execute();
			$this->connection = null;
			return 'Instituição cadastrada!';
		}catch(Exception $ex){
			throw new Exception('Erro ao cadastrar Instituição!');
		}
	}

	public function find($id){
		try{
			$stat = $this->connection->query("select * from instituicao where id = $id");
		  	$instituicao = $stat->fetchObject('Instituicao');
		  	return $instituicao;
		}catch(Exception $ex){
			throw new Exception('Erro ao buscar Instituição!');
		}
	}

	public function findAll(){
		try{
			$stat = $this->connection->query("SELECT * from instituicao");
			$array = array();
			$array = $stat->fetchAll(PDO::FETCH_OBJ);
			$this->connection = null;
			return $array;
		}catch(Exception $ex){
			throw new Exception('Erro ao buscar Instituições!');
		}
	}

	public function delete($id){
		try{
			$stat = $this->connection->prepare("delete from instituicao where id=?");
			$stat->bindValue(1,$id);		
			$stat->execute();			
			$this->connection = null;
			return 'Instituição deletada com sucesso';
		}catch(Exception $e){
			throw new Exception('Erro ao deletar Instituição!');
		}
	}

	public function update($object){
		return 'todo';
	}
}
?>