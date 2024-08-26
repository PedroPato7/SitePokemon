<?php
    define('USUARIO', 'root');  
    define('SENHA', 'Sobaoeim123#');
    
    class Conexao{

        private static $pdo;

        private function __construct(){
        }

        public static function getInstance(){
            if(!(isset(self::$pdo))){
                try{
                    $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
                                    PDO::ATTR_PERSISTENT => TRUE,
                                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                    
                    self::$pdo = new PDO("mysql:host=localhost:3306; dbname=ligaPokemon; charset=utf8;", USUARIO, SENHA, $opcoes);
                } catch(PDOException $e){
                    echo "Erro: ".$e->getMessage();
                }
            }
            return self::$pdo;
        }

    }
?>