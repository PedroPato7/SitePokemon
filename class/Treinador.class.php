<?php
    require_once "Conexao.class.php";

    class Treinador{

        private $id;
        private $nome;
        private $dataNascimento;
        private $id_liga;

        public function __construct($id, $nome, $dataNascimento, $id_liga){
            $this->id = $id;
            $this->nome = $nome;
            $this->dataNascimento = $dataNascimento;
            $this->id_liga = $id_liga;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setDataNascimento($dataNascimento){
            $this->dataNascimento = $dataNascimento;
        }

        public function setIdLiga($id_liga){
            $this->id_liga = $id_liga;
        }

        public function getId(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getDataNascimento(){
            return $this->dataNascimento;
        }

        public function getIdLiga(){
            return $this->id_liga;
        }

        public function inserir(){
            try{
                $conexao = Conexao::getInstance();
                $sql = "INSERT INTO treinador (nome, dataNascimento, id_liga) VALUES(:nome, :dataNascimento, :id_liga)";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":nome", $this->nome);
                $comando->bindValue(":dataNascimento", $this->dataNascimento);
                $comando->bindValue(":id_liga", $this->id_liga);
                return $comando->execute();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public static function listar($idLiga){
            try{
                $conexao = Conexao::getInstance();
                $sql = "SELECT * FROM treinador WHERE id_liga = :id_liga";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id_liga", $idLiga);
                $comando->execute();
                return $comando->fetchAll();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public static function pesquisarID($id){
            try{
                $conexao = Conexao::getInstance();
                $sql = "SELECT * FROM treinador WHERE id = :id";
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
                $sql = "UPDATE treinador SET nome = :nome, dataNascimento = :dataNascimento, id_liga = :id_liga WHERE id = :id";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":nome", $this->nome);
                $comando->bindValue(":dataNascimento", $this->dataNascimento);
                $comando->bindValue(":id_liga", $this->id_liga);
                $comando->bindValue(":id", $this->id);
                return $comando->execute();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public static function excluir($id){
            try{
                $conexao = Conexao::getInstance();
                $sql = "DELETE FROM treinador WHERE id = :id";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id", $id);
                return $comando->execute();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

    }
?>