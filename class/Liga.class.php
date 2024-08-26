<?php
    require_once "Conexao.class.php";

    class Liga{

        private $id;
        private $nome;
        private $sede;

        public function __construct($id, $nome, $sede){
            $this->id = $id;
            $this->nome = $nome;
            $this->sede = $sede;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setSede($sede){
            $this->sede = $sede;
        }

        public function getId(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getSede(){
            return $this->sede;
        }

        public function inserir(){
            try{
                $conexao = Conexao::getInstance();
                $sql = "INSERT INTO liga (nome, sede) VALUES(:nome, :sede)";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":nome", $this->nome);
                $comando->bindValue(":sede", $this->sede);
                return $comando->execute();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public static function listar(){
            try{
                $conexao = Conexao::getInstance();
                $sql = "SELECT * FROM liga";
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
                $sql = "SELECT * FROM liga WHERE id = :id";
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
                $sql = "UPDATE liga SET nome = :nome, sede = :sede WHERE id = :id";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":nome", $this->nome);
                $comando->bindValue(":sede", $this->sede);
                $comando->bindValue(":id", $this->id);
                return $comando->execute();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public static function excluir($id){
            try{
                $conexao = Conexao::getInstance();
                $sql = "DELETE FROM liga WHERE id = :id";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id", $id);
                return $comando->execute();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

    }
?>