<?php

/**
 * Classe de conexão com o Banco de Dados.
 *
 * @author: Marcelo Zilio Correa
 * @since: 04/12/2017 - 13:30
 */
class ConnectionDataBase extends PDO
{
    private static $connection=null;
    
    public function ConnectionDataBase($dsn, $usuario, $senha)
    {
        parent::__construct($dsn, $usuario, $senha);
    }
    
    public static function getConnection()
    {
        if (!isset(self::$connection)) {
            try {
                self::$connection = new ConnectionDataBase("mysql:dbname=refeicoes;host=localhost", "root", "");
            } catch (Exception $ex) {
                echo 'Erro ao tentar conectar-se ao banco de dados!';
                exit();
            }
        }
        return self::$connection;
    }
}
