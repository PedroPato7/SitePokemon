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
    <title><?php echo $treinador["nome"]; ?> - Liga Pokémon</title>
    <link rel="stylesheet" href="css/printStyle.css">
</head>
<body>
    <?php
        include_once "menu.html";

        require_once "class/Liga.class.php";
        require_once "class/TreinadorPokemon.class.php";

        $liga = Liga::pesquisarID($treinador["id_liga"]);
        $tps = TreinadorPokemon::pesquisarIdTreinador($id);
    ?>
    <header>
        <h1><?php echo $treinador["nome"]; ?></h1>
    </header>
    <p>Data de Nascimento: <?php echo $treinador["dataNascimento"]; ?></p>
    <p>Liga Pokémon: <?php echo $liga["nome"]; ?></p>
    <br>
    <section>
        <h3>Pokémons:</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo Primário</th>
                    <th>Tipo Secundário</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once "class/Pokemon.class.php";
                    require_once "class/TipoPokemon.class.php";

                    foreach($tps as $tp){
                        $pokemon = Pokemon::pesquisarID($tp["id_pokemon"]);

                        $tipo1 = TipoPokemon::pesquisarID($pokemon["tipo1"]);
                        $tipo2 = TipoPokemon::pesquisarID($pokemon["tipo2"]);
                        echo "<tr>
                            <td>".$pokemon["nome"]."</td>
                            <td>".$tipo1["nome"]."</td>
                            <td>";
                        if($tipo2 != null)
                            echo $tipo2["nome"];
                        echo "</td>";
                    }
                ?>
            <tbody>
        </table>
    </section>
</body>
</html>