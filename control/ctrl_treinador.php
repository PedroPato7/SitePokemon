<?php
    require_once "../class/Treinador.class.php";

    require_once "../class/Pokemon.class.php";
    require_once "../class/TreinadorPokemon.class.php";

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $dataNascimento = isset($_POST["dataNascimento"]) ? $_POST["dataNascimento"] : "";
        $id_liga = isset($_POST["id_liga"]) ? $_POST["id_liga"] : 0;

        $vetorPokemons = array();
        $pokemons = Pokemon::listar();
        for($i = 1; $i <= $pokemons[count($pokemons) - 1]["id"]; $i++){
            if(isset($_POST["pokemon".$i]))
                array_push($vetorPokemons, $_POST["pokemon".$i]);
        }

        $treinador = new Treinador(0, $nome, $dataNascimento, $id_liga);

        $treinador->inserir();
        $treinadores = Treinador::listar($id_liga);
        foreach($vetorPokemons as $pokemon){
            $treinadorPokemon = new TreinadorPokemon($treinadores[count($treinadores) - 1]["id"], $pokemon);
            $treinadorPokemon->inserir();
        }
    }

    header("location:../liga.php?id=".$id_liga);
?>