<?php
    require_once "../class/Pokemon.class.php";

    $acao = "";
    switch($_SERVER["REQUEST_METHOD"]){
        case "GET":
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
            break;
        case "POST":
            $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";
    }

    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "salvar"){
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $tipo1 = isset($_POST["tipo1"]) ? $_POST["tipo1"] : "";
        $tipo2 = isset($_POST["tipo2"]) ? $_POST["tipo2"] : null;

        $pokemon = new Pokemon($id, $nome, $tipo1, $tipo2);

        if($id == 0)
            $pokemon->inserir();
        else
            $pokemon->editar();
    } else if($acao == "excluir")
        Pokemon::excluir($id);

    // header("location:../pokemons.php");
?>