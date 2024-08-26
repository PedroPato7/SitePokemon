<?php
    require_once "../class/Liga.class.php";

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
        $sede = isset($_POST["sede"]) ? $_POST["sede"] : "";

        $liga = new Liga($id, $nome, $sede);

        if($id == 0)
            $liga->inserir();
        else
            $liga->editar();
    } else if($acao == "excluir")
        Liga::excluir($id);

    header("location:../index.php");
?>