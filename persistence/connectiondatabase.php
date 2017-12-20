<?php
class ConnectionDataBase extends PDO{
   private static $connection=null;
	
   public function ConnectionDataBase($dsn,$usuario,$senha){
		//Construtor da classe pai PDO
		parent::__construct($dsn,$usuario,$senha);
   }
	
   public static function getConnection(){
   	if (!isset(self::$connection)){
		try{
			/* Cria e retorna uma nova conexão*/
			self::$connection = new ConnectionDataBase("mysql:dbname=refeicoes;host=localhost","root","root");
		}catch(Exception $ex){
			echo 'Erro ao tentar conectar-se ao banco de dados!';
		    exit();
		}
	}
	return self::$connection;
   }
}
?>