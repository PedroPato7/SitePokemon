<!DOCTYPE html>
<?php
    require_once "class/Liga.class.php";

    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $liga = Liga::pesquisarID($id);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de liga - Liga Pokémon</title>
</head>
<body>
    <?php include "menu.html"; ?>

    <header>
        <h1>Cadastro de Liga</h1>
    </header>
    <section>
        <form action="control/ctrl_liga.php?id=<?php echo $id; ?>" method="post">
            <p><label for="nome">
                <strong>Nome</strong>
            </label></p>
            <input type="text" name="nome" value="<?php if($id > 0) echo $liga["nome"]; ?>">

            <p><label for="sede">
                <strong>Sede</strong>
            </label></p>
            <input type="text" name="sede" value="<?php if($id > 0) echo $liga["sede"]; ?>">
            <br>
            <br>
            <button type="submit" name="acao" value="salvar"><?php if($id > 0) echo "Editar"; else echo "Cadastrar"; ?></button>
        </form>
    </section>
</body>
</html>