<?php
require_once '../classes/logout.php';
$log = new logout;
$log->logout();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<center>
    <h1>Login</h1>
    <form action="../back/login.php" method="post">
        <label>E-mail:</label>
        <input type="text" name="emailuser" id="">
        <label>Senha:</label>
        <input type="password" name="senhauser" id="">
        <button type="submit">Entrar</button>
    </form>
    <a href="../index.php">Não possui uma conta? clique aqui.</a>
</center>
</body>
</html>