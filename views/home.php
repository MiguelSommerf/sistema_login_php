<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo "<script>alert('Você não possui permissão para acessar essa tela.')</script>";
    echo "<script>window.location.href = '../views/login.html'</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Home</title>
</head>
<body>
    <div class="video">
        <h1>Bem-vindo(a)!</h1>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/kI_610DtihA?si=MCOEZh_gscKp_wEo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</body>
</html>