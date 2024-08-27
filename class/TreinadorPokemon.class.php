<?php
    require_once "Conexao.class.php";

    class TreinadorPokemon{

        private $id_treinador;
        private $id_pokemon;

        public function __construct($id_treinador, $id_pokemon){
            $this->id_treinador = $id_treinador;
            $this->id_pokemon = $id_pokemon;
        }

        public function setIdTreinador($id_treinador){
            $this->id_treinador = $id_treinador;
        }

        public function setIdPokemon($id_pokemon){
            $this->id_pokemon = $id_pokemon;
        }

        public function getIdTreinador(){
            return $this->id_treinador;
        }

        public function getIdPokemon(){
            return $this->id_pokemon;
        }

        public function inserir(){
            try{
                $conexao = Conexao::getInstance();
                $sql = "INSERT INTO treinador_pokemon VALUES(:id_treinador, :id_pokemon)";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id_treinador", $this->id_treinador);
                $comando->bindValue(":id_pokemon", $this->id_pokemon);
                return $comando->execute();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

        public static function pesquisarIdTreinador($id_treinador){
            try{
                $conexao = Conexao::getInstance();
                $sql = "SELECT * FROM treinador_pokemon WHERE id_treinador = :id_treinador";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id_treinador", $id_treinador);
                $comando->execute();
                return $comando->fetchAll();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

    }
?>