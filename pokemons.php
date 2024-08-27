<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémons - Liga Pokémon</title>
    <link rel="stylesheet" href="css/printStyle.css">
    <script src="script/script.js"></script>
</head>
<body>
    <?php
        include_once "menu.html";

        require_once "class/Pokemon.class.php";

        $pokemons = Pokemon::listar();
    ?>
    <header>
        <h1>Pokémons</h1>
    </header>
    <br>
    <section>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo Primário</th>
                    <th>Tipo Secundário</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once "class/TipoPokemon.class.php";

                    foreach($pokemons as $pokemon){
                        $tipo1 = TipoPokemon::pesquisarID($pokemon["tipo1"]);
                        $tipo2 = TipoPokemon::pesquisarID($pokemon["tipo2"]);
                        echo "<tr>
                            <td>".$pokemon["id"]."</td>
                            <td>".$pokemon["nome"]."</td>
                            <td>".$tipo1["nome"]."</td>
                            <td>";
                        if($tipo2 != null)
                            echo $tipo2["nome"];
                        echo "</td>
                            <td><a href='formPokemon.php?id=".$pokemon["id"]."'>Editar</a></td>";
                ?>
                            <td>
                                <a href="javascript:excluirRegistro('control/ctrl_pokemon.php?id=<?php
                                    echo $pokemon["id"];
                                ?>&acao=excluir')">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                ?>
            <tbody>
        </table>
    </section>
</body>
</html>