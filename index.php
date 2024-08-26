<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ligas - Liga Pokémon</title>
</head>
<body>
    <?php
        include "menu.html";

        require_once "class/Liga.class.php";

        $ligas = Liga::listar();
    ?>

    <h1>Ligas</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sede</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($ligas as $liga){
                    echo "<tr>
                        <td>".$liga["id"]."</td>
                        <td>".$liga["nome"]."</td>
                        <td>".$liga["sede"]."</td>
                        <td><a href='liga.php?id=".$liga["id"]."'>Ver Treinadores</a></td>
                        <td><a href='formLiga.php?id=".$liga["id"]."'>Editar</a></td>";
            ?>
                        <td>
                            <a href="javascript:excluirRegistro('control/ctrl_liga.php?id=<?php echo $liga["id"] ?>&acao=excluir')">
                                Excluir
                            </a>
                        </td>
                    </tr>
            <?php
                }
            ?>   
        <tbody>
    </table>
</body>
</html>
<script>
    function excluirRegistro(url){
        if(confirm("Tem certeza que quer excluir este registro?"))
            location.href = url;
    }
</script>