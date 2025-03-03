<?php
require_once './back/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
<center>
    <h1>Cadastrar</h1>
    <form action="./back/cadastro.php" method="post">
        <label>E-mail:</label>
        <input type="text" name="emailuser" id="">
        <label>Senha:</label>
        <input type="password" name="senhauser" id="">
        <button type="submit">Entrar</button>
    </form>
    <a href="./front/tela_login.php">Já possui uma conta? clique aqui.</a>
</center>
</body>
</html>