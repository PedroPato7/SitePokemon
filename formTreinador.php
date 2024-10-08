<!DOCTYPE html>
<?php
    require_once "class/Treinador.class.php";

    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $treinador = Treinador::pesquisarID($id);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Treinador - Liga Pokémon</title>
    <link rel="shortcut icon" href="fav/ligaLogo.ico">
    <script src="script/script.js"></script>
</head>
<body>
    <?php
        include "menu.html";

        require_once "class/Liga.class.php";
        require_once "class/Pokemon.class.php";

        $ligas = Liga::listar();
        $pokemons = Pokemon::listar();
    ?>

    <header>
        <h1>Cadastro de Treinador</h1>
    </header>
    <section>
        <form action="control/ctrl_treinador.php?id=<?php echo $id; ?>" method="post">
            <p><label for="nome">
                <strong>Nome</strong>
            </label></p>
            <input type="text" name="nome" value="<?php if($id > 0) echo $treinador["nome"]; ?>">

            <p><label for="dataNascimento">
                <strong>Data de Nascimento</strong>
            </label></p>
            <input type="date" name="dataNascimento" value="<?php if($id > 0) echo $treinador["dataNascimento"]; ?>">

            <p><label for="id_liga">
                <strong>Liga Pokémon</strong>
            </label></p>
            <select name="id_liga">
                <option value="">Escolha a liga</option>
                <?php
                    foreach($ligas as $liga){
                ?>
                <option value="<?php echo $liga["id"]; ?>" <?php if($id > 0 && $treinador["id_liga"] == $liga["id"]) echo "selected"; ?>>
                    <?php echo $liga["nome"]; ?>
                </option>
                <?php
                    }
                ?>
            </select>

            <p><label for="pokemon">
                <strong>Pokémons</strong>
            </label></p>
            <select id="pokemon">
                <option value="">Escolha seu Pokémon</option>
                <?php
                    foreach($pokemons as $pokemon){
                ?>
                <option id="pokemon<?php echo $pokemon["id"]; ?>" value="<?php echo $pokemon["id"]; ?>">
                    <?php echo $pokemon["nome"]; ?>
                </option>
                <?php
                    }
                ?>
            </select>
            <a href="#" onclick="addPokemon()">Adicionar</a>
            <br><br>
            <table id="tabelaPokemons">
                <tbody></tbody>
            </table>
            <br>
            <button type="submit" name="acao" value="salvar"><?php if($id > 0) echo "Editar"; else echo "Cadastrar"; ?></button>
        </form>
    </section>
</body>
</html>