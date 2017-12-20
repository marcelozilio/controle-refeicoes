<?php
require '../persistence/connectiondatabase.php';
require '../interfaces/irepository.php';
require '../model/pessoa.php';
class PessoaRepository implements IRepository{

	private $connection=null;

	public function __construct(){
		$this->connection = ConnectionDataBase::getConnection();
	}

	public function save($object){
		try{
			$stat=$this->connection->prepare("insert into instituicao(id,idInstituicao,nome,endereco,email,celular)values(null,?,?,?,?,?)");

			$stat->bindValue(1,$object->idInstituicao);
			$stat->bindValue(2,$object->nome);
			$stat->bindValue(3,$object->endereco);
			$stat->bindValue(4,$object->email);
			$stat->bindValue(5,$object->celular);

			$stat->execute();
			$this->connection = null;
			return 'Pessoa cadastrada!';
		}catch(PDOException $ex){
			return 'Erro ao cadastrar Pessoa!';
		}
	}

	public function find($cod){
		try{
			$stat = $this->connection->query("select * from pessoa where id = $cod");
			$pessoa = $stat->fetchObject('Pessoa');
			return $pessoa;
		}catch(PDOException $ex){
			return 'Erro ao buscar Pessoa!';
		}
	}

	public function findAll(){
		try{
			$stat = $this->connection->query("SELECT * from pessoa");
			$array = array();
			$array = $stat->fetchAll(PDO::FETCH_OBJ);
			$this->connection = null;
			return $array;
		}catch(PDOException $ex){
			return 'Erro ao buscar Pessoas!';
		}
	}

	public function delete($cod){
		return "TODO";
	}

	public function update($object){
		return "TODO";
	}
}
?>