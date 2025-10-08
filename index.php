<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles_login.css">
    <link rel="stylesheet" href="autenticar.php">
</head>
<body>
    <div id="container">
        <div class="conteudo">
            <div class="texto">
                <p>Sistema</p>
            </div>
            <hr>
            <form action="autenticar.php" method="POST">
                <p>
                    <label for="usuario">Usuário</label>
                    <input type="text" name="usuario" id="usuario">
                </p>
                <p>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha">
                </p>
                <p>
                    <button type="submit">Login</button>
                </p>
            </form>
        </div>
    </div>
</body>
</html>