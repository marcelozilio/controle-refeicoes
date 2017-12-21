<?php
require_once '../persistence/ConnectionDataBase.class.php';
require_once '../interfaces/IRepository.php';
require '../model/Refeicao.php';

class RefeicaoRepository implements IRepository{

	private $connection=null;

	public function __construct(){		
		$this->connection = ConnectionDataBase::getConnection();
	}

	public function save($object){
		try{
			$stat=$this->connection->prepare("insert into refeicao(id,idInstituicao,descricao,dataCadastro,dataRefeicao,imagem)values(null,?,?,?,?,?)");
			$stat->bindValue(1,$object->idInstituicao);			
			$stat->bindValue(2,$object->descricao);
			$stat->bindValue(3,$object->dataCadastro);
			$stat->bindValue(4,$object->dataRefeicao);
			$stat->bindValue(5,$object->imagem);

			$stat->execute();
			$this->connection = null;
			return 'Refeicao cadastrada!';
		}catch(PDOException $ex){
			return 'Erro ao cadastrar Refeicao!';
		}
	}

	public function find($id){
		try{
			$stat = $this->connection->query("SELECT * FROM refeicao WHERE id = $id");
			$refeicao = $stat->fetchAll(PDO::FETCH_OBJ);			
			return $refeicao;			
		}catch(PDOException $ex){
			return 'Erro ao buscar Refeicao!';
		}
	}

	public function findAll(){
		try{
			$stat = $this->connection->query("SELECT * FROM refeicao");
			$array = array();
			$array = $stat->fetchAll(PDO::FETCH_OBJ);
			$this->connection = null;
			return $array;
		}catch(PDOException $ex){
			return 'Erro ao buscar Refeicoes!';
		}
	}

	public function delete($id){
		return "TODO";
	}

	public function update($object){
		return "TODO";
	}
}
?>