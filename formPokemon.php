<!DOCTYPE html>
<?php
    require_once "class/Pokemon.class.php";

    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $pokemon = Pokemon::pesquisarID($id);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pokémon - Liga Pokémon</title>
    <link rel="shortcut icon" href="fav/ligaLogo.ico">
</head>
<body>
    <?php
        include "menu.html";

        require_once "class/TipoPokemon.class.php";

        $tipos = TipoPokemon::listar();
    ?>

    <header>
        <h1>Cadastro de Pokémon</h1>
    </header>
    <section>
        <form action="control/ctrl_pokemon.php?id=<?php echo $id; ?>" method="post">
            <p><label for="nome">
                <strong>Nome</strong>
            </label></p>
            <input type="text" name="nome" value="<?php if($id > 0) echo $pokemon["nome"]; ?>">

            <p><label for="tipo1">
                <strong>Tipo Primário</strong>
            </label></p>
            <select name="tipo1">
                <option value="">Escolha o tipo primário</option>
                <?php
                    foreach($tipos as $tipo){
                ?>
                <option value="<?php echo $tipo["id"]; ?>" <?php if($id > 0 && $pokemon["tipo1"] == $tipo["id"]) echo "selected"; ?>>
                    <?php echo $tipo["nome"]; ?>
                </option>
                <?php
                    }
                ?>
            </select>

            <p><label for="tipo2">
                <strong>Tipo Secundário</strong>
            </label></p>
            <select name="tipo2">
                <option value="">Escolha o tipo secundário</option>
                <option value="">Nenhum</option>
                <?php
                    foreach($tipos as $tipo){
                ?>
                <option value="<?php echo $tipo["id"]; ?>" <?php if($id > 0 && $pokemon["tipo2"] == $tipo["id"]) echo "selected"; ?>>
                    <?php echo $tipo["nome"]; ?>
                </option>
                <?php
                    }
                ?>
            </select>
            <br>
            <br>
            <button type="submit" name="acao" value="salvar"><?php if($id > 0) echo "Editar"; else echo "Cadastrar"; ?></button>
        </form>
    </section>
</body>
</html>