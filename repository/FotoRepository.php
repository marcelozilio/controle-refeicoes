<?php
require_once '../persistence/ConnectionDataBase.class.php';
require_once '../interfaces/IRepository.php';
require '../model/Foto.php';

class FotoRepository implements IRepository{

	private $connection=null;

	public function __construct(){		
		$this->connection = ConnectionDataBase::getConnection();
	}

	public function save($object){
		try{
			$stat=$this->connection->prepare("insert into foto(id,foto)values(null,?)");		
					
			$stat->bindValue(1,$object->foto);			

			$stat->execute();
			$this->connection = null;
			return 'Refeicao cadastrada!';
		}catch(PDOException $ex){
			return 'Erro ao cadastrar Refeicao!';
		}
	}

	public function find($id){
		try{
			$stat = $this->connection->query("select * from foto where id = $id");
			$foto = $stat->fetchObject('Foto');
			return $foto;
		}catch(PDOException $ex){
			return 'Erro ao buscar Foto!';
		}
	}

	public function findAll(){
		try{
			$stat = $this->connection->query("SELECT * from foto");
			$array = array();
			$array = $stat->fetchAll(PDO::FETCH_OBJ);
			$this->connection = null;
			return $array;
		}catch(PDOException $ex){
			return 'Erro ao buscar Foto!';
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