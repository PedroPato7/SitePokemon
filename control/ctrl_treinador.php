<?php
    require_once "../class/Treinador.class.php";

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
        $dataNascimento = isset($_POST["dataNascimento"]) ? $_POST["dataNascimento"] : "";
        $id_liga = isset($_POST["id_liga"]) ? $_POST["id_liga"] : 0;

        $treinador = new Treinador($id, $nome, $dataNascimento, $id_liga);

        if($id == 0)
            $treinador->inserir();
        else
            $treinador->editar();
    } else if($acao == "excluir")
        Treinador::excluir($id);

    header("location:../liga.php?id=".$id_liga);
?>