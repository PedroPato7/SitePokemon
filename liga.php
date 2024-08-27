<!DOCTYPE html>
<?php
    require_once "class/Liga.class.php";

    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $liga = Liga::pesquisarId($id);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $liga["nome"]; ?> - Liga Pokémon</title>
    <link rel="stylesheet" href="css/printStyle.css">
    <script src="script/script.js"></script>
</head>
<body>
    <?php
        include_once "menu.html";

        require_once "class/Treinador.class.php";

        $treinadores = Treinador::listar($id);
    ?>
    <header>
        <h1><?php echo $liga["nome"]; ?></h1>
    </header>
    <h4>Sede: <?php echo $liga["sede"]; ?></h4>
    <br>
    <section>
        <h3>Treinadores inscritos:</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($treinadores as $treinador){
                        echo "<tr>
                            <td>".$treinador["id"]."</td>
                            <td>".$treinador["nome"]."</td>
                            <td>".$treinador["dataNascimento"]."</td>
                            <td><a href='treinador.php?id=".$treinador["id"]."'>Ver Pokémons</a></td>
                        </tr>";
                    }
                ?>
            <tbody>
        </table>
    </section>
</body>
</html>