<?php
require_once '../config/connect.php';

$email = $_POST['emailuser'];
$senha = $_POST['passuser'];

if (!empty($email) && !empty($senha)) {

    $queryLogin = "SELECT senha FROM usuario WHERE email = ?";
    $stmtLogin = $conn->prepare($queryLogin);
    $stmtLogin->bind_param("s", $email);
    $stmtLogin->execute();
    $resultLogin = $stmtLogin->get_result();

    if ($resultLogin->num_rows > 0) {
        $hash = $resultLogin->fetch_assoc();
        $senhaHash = $hash['senha'];

        if (password_verify($senha, $senhaHash)) {
            session_start();
            $_SESSION['id'] = true;
            
            echo "<script>alert('Logado com sucesso!')</script>";
            echo "<script>window.location.href = '../views/home.php'</script>";
            exit();
        } else {
            echo "<script>alert('Usuário ou senha incorretos. Tente novamente.')</script>";
            echo "<script>window.location.href = '../views/login.html'</script>";
            exit();
        }
    } else {
        echo "<script>alert('Usuário ou senha incorretos. Tente novamente.')</script>";
        echo "<script>window.location.href = '../views/login.html'</script>";
        exit();
    }
}