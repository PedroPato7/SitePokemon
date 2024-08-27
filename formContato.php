<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato - Liga Pokémon</title>
    <link rel="stylesheet" href="css/contatoStyle.css">
    <link rel="shortcut icon" href="fav/ligaLogo.ico">
</head>
<body>
    <?php include_once "menu.html"; ?>
    <section>
        <h2> Contato </h2>
        <form action="https://api.staticforms.xyz/submit" method="post">
            <div>
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Digite seu nome" required>

                <label>Email</label>
                <input type="email" name="email" placeholder="Digite seu email" required>

                <label>Mensagem</label>
                <textarea name="message" cols="30" rows="10" placeholder="Digite sua mensagem"></textarea>
                <button type="submit">Enviar</button>

                <input type="hidden" name="accessKey" value="e90359a3-8bba-4767-8be0-bfe7d9b36a60"> 
                <input type="hidden" name="redirectTo" value="http://localhost/ligaPokemon/agradecimentos.php">
            </div>
        </form>
    </section>
</body>
</html>