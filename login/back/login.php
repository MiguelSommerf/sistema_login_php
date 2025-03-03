<?php
require_once './connect.php';
require_once '../classes/verificar_campos.php';

$verif = new verificarCampos($mysqli);
$email = $_POST['emailuser'];
$senha = $_POST['senhauser'];

$verif->verificarEmail($email);
$verif->verificarSenha($senha);

$consulta = "SELECT senha, id FROM usuario WHERE email = ?";
$stmt = $mysqli->prepare($consulta);
$stmt->bind_param("s", $email);
$stmt->execute();
//store_result armazena os dados da consulta anterior no banco.
$stmt->store_result();

//se o valor de linhas retornadas for igual a 1
if($stmt->num_rows == 1){
    //Vincula a senha criptografada e o id do usuário que está dentro do banco, com a variável $hash e $user_id.
    $stmt->bind_result($hash, $user_id);
    //fetch() é necessário para que a o valor vinculado seja atribuído, sem ele, o valor nunca será atribuído, pois a execução nunca será feita.
    $stmt->fetch();
    //a função password_verify verifica se a senha digitada pelo usuário é a mesma senha criptografada do banco de dados.

    if(password_verify($senha, $hash)){
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['id'] = $user_id;
        echo "<script>alert('Logado com sucesso!')</script>";
        header('Location: ../front/tela_principal.php');
        exit();
    }else{
        echo "<script>alert('Usuário ou senha incorretos.')</script>";
        echo "<script>window.history.back();</script>";
        exit();
    };
}else{
    echo "<script>alert('Usuário ou senha incorretos.')</script>";
    echo "<script>window.history.back();</script>";
    exit();
};

?>