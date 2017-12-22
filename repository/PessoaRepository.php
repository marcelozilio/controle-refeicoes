<?php
require_once '../persistence/ConnectionDataBase.class.php';
require_once '../interfaces/IRepository.php';
require '../model/Pessoa.php';

class PessoaRepository implements IRepository{

	private $connection=null;

	public function __construct(){		
		$this->connection = ConnectionDataBase::getConnection();
	}

	public function save($object){
		try{
			$stat=$this->connection->prepare("insert into pessoa(id,idInstituicao,nome,email,celular)values(null,?,?,?,?)");		
			
			$stat->bindValue(1,$object->idInstituicao);
			$stat->bindValue(2,$object->nome);
			$stat->bindValue(3,$object->email);
			$stat->bindValue(4,$object->celular);

			$stat->execute();
			$this->connection = null;
			return 'Pessoa cadastrada!';
		}catch(Exception $ex){
			throw new Exception('Erro ao cadastrar Pessoa!');
		}
	}

	public function find($id){
		try{
			$stat = $this->connection->query("select * from pessoa where id = $id");
			$pessoa = $stat->fetchObject('Pessoa');
			return $pessoa;
		}catch(Exception $ex){
			throw new Exception('Erro ao buscar Pessoa!');			
		}
	}

	public function findAll(){
		try{
			$stat = $this->connection->query("SELECT * from pessoa");
			$array = array();
			$array = $stat->fetchAll(PDO::FETCH_OBJ);
			$this->connection = null;
			return $array;
		}catch(Exception $ex){
			throw new Exception('Erro ao buscar Pessoas!');					
		}
	}

	public function delete($id){
		try{
			$stat = $this->connection->prepare("delete from pessoa where id=?");
			$stat->bindValue(1,$id);		
			$stat->execute();			
			$this->connection = null;
			return 'Pessoa deletada com sucesso';
		}catch(Exception $e){
			throw new Exception('Erro ao deletar pessoa!');
		}
	}

	public function update($object){
		return 'todo';
	}
}
?>