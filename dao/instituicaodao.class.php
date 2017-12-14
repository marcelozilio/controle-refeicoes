<?php
require '../persistence/connectiondatabase.php';
require '../interfaces/idao.class.php';
class InstituicaoDAO implements IDAO{

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
		}catch(PDOException $ex){
			echo 'Erro ao cadastrar Instituição!';
		}
	}

	public function find($cod){
		try{
			$stat = $this->connection->query("select * from instituicao where id = $cod");

		  	$instituicao = $stat->fetchObject('Instituicao');
		  	return $instituicao;	
		}catch(PDOException $ex){
			echo 'Erro ao buscar Instituição!';
		}
	}

	public function findAll(){
		try{
			$stat = $this->connection->query("select * from instituicao");

			$array = array();
			$array = $stat->fetchAll(PDO::FETCH_CLASS,'Instituicao');
			$this->connection = null;
			return $array;
		}catch(PDOException $ex){
			echo 'Erro ao buscar Instituições!';
		}
	}

	public function delete($cod){
		echo "TODO";
	}

	public function update($object){
		echo "TODO";
	}
}
?>