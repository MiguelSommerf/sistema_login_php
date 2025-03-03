<?php
if(!isset($_SESSION)){
    session_start();
}

if(!$_SESSION['id']){
    echo "<script>alert('Você precisa estar logado para votar.')</script>";
    die("Você precisa efetuar o login para votar.<br><a href='./tela_login.php'>Voltar para a tela de login</a>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<center>
    <h1>LOGADO! Seja bem-vindo <?=$_SESSION['id']?>!</h1>
    <img src="../img/bob2.jpg" alt="">
    <a href="./tela_login.php">Sair</a>
</center>
</body>
</html>