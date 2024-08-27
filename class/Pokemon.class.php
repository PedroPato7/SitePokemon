<?php
    require_once "Conexao.class.php";

    class Pokemon{

        private $id;
        private $nome;
        private $tipo1;
        private $tipo2;

        public function __construct($id, $nome, $tipo1, $tipo2){
            $this->id = $id;
            $this->nome = $nome;
            $this->tipo1 = $tipo1;
            $this->tipo2 = $tipo2;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setTipo1($tipo1){
            $this->tipo1 = $tipo1;
        }

        public function setTipo2($tipo2){
            $this->tipo2 = $tipo2;
        }

        public function getId(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getTipo1(){
            return $this->tipo1;
        }

        public function getTipo2(){
            return $this->tipo2;
        }

        public function inserir(){
            try{
                $conexao = Conexao::getInstance();
                if($this->tipo2 == null)
                    $sql = "INSERT INTO pokemon (nome, tipo1) VALUES(:nome, :tipo1)";
                else
                    $sql = "INSERT INTO pokemon (nome, tipo1, tipo2) VALUES(:nome, :tipo1, :tipo2)";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":nome", $this->nome);
                $comando->bindValue(":tipo1", $this->tipo1);
                if($this->tipo2 != null)
                    $comando->bindValue(":tipo2", $this->tipo2);
                return $comando->execute();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public static function listar(){
            try{
                $conexao = Conexao::getInstance();
                $sql = "SELECT * FROM pokemon";
                $comando = $conexao->prepare($sql);
                $comando->execute();
                return $comando->fetchAll();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public static function pesquisarID($id){
            try{
                $conexao = Conexao::getInstance();
                $sql = "SELECT * FROM pokemon WHERE id = :id";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id", $id);
                $comando->execute();
                return $comando->fetch();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public function editar(){
            try{
                $conexao = Conexao::getInstance();
                $sql = "UPDATE pokemon SET nome = :nome, tipo1 = :tipo1, tipo2 = :tipo2 WHERE id = :id";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":nome", $this->nome);
                $comando->bindValue(":tipo1", $this->tipo1);
                $comando->bindValue(":tipo2", $this->tipo2);
                $comando->bindValue(":id", $this->id);
                return $comando->execute();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public static function excluir($id){
            try{
                $conexao = Conexao::getInstance();
                $sql = "DELETE FROM pokemon WHERE id = :id";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id", $id);
                return $comando->execute();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

    }
?>