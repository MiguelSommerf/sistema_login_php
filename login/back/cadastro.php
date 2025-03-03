<?php
//Codado por Miguel Luiz Sommerfeld - 3°F Turma B
require_once './connect.php';
require_once '../classes/verificar_campos.php';

$verif = new verificarCampos($mysqli);

if(isset($_POST['emailuser']) || ($_POST['senhauser'])){
    $verif->verificarEmail($_POST['emailuser']);
    $verif->verificarSenha($_POST['senhauser']);

    if(!empty($_POST['emailuser']) && !empty($_POST['senhauser'])){
        $verif->verificarEmailExistente($_POST['emailuser']);
        $email = $_POST['emailuser'];
        $senha = password_hash($_POST['senhauser'], PASSWORD_DEFAULT);
        //aqui eu basicamente criei um 'template' de quais campos serão preenchidos, cada um desses '?', serão preenchidos com dados de forma segura depois.
        $sql_query = "INSERT INTO usuario (email, senha) VALUES (?,?)";
        //$$mysqli->prepare($slq) ----> prepara a query fazendo com que os '?' fiquem aguardando para receberem os dados digitados, evitando MySQL injection porque os dados serão tratados pelo MySQL ANTES da execução.
        $stmt = $mysqli->prepare($sql_query);
        //bind_param ----> vincula os dados digitados aos '?'. os 'ss' dizem que $email e $senha são dois valores do tipo string (s = string)
        $stmt->bind_param("ss", $email, $senha,);
        //execute() ---> o comando foi executado e os dados foram inseridos na tabela usuario
        $stmt->execute();
        //close() fecha a consulta e apaga os dados
        $stmt->close();
        //fecha a conexão com o banco para liberar memória
        $mysqli->close();
        header('Location: ../front/tela_login.php');
        exit();
    };
}
?>