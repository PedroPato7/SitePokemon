<?php
    require_once "Conexao.class.php";

    class TipoPokemon{

        public static function listar(){
            try{
                $conexao = Conexao::getInstance();
                $sql = "SELECT * FROM tipopokemon";
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
                $sql = "SELECT * FROM tipopokemon WHERE id = :id";
                $comando = $conexao->prepare($sql);
                $comando->bindValue(":id", $id);
                $comando->execute();
                return $comando->fetch();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }

    }
?>