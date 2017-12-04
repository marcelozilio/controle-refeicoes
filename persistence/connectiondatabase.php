<?php
class ConnecitonDataBase extends PDO{
   private static $connection=null;
	
   public function ConnecitonDataBase($dsn,$usuario,$senha){
		//Construtor da classe pai PDO
		parent::__construct($dsn,$usuario,$senha);
   }
	
   public static function getConnection(){
   	if (!isset(self::$connection)){
		try{
			/* Cria e retorna uma nova conexão*/
			self::$connection = new ConnecitonDataBase("mysql:dbname=refeicao;host=localhost","root","");
		}catch(Exception $ex){
			echo 'Erro ao tentar conectar-se ao banco de dados.';
		    exit();
		}
	}
	return self::$connection;
   }
}
?>