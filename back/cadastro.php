<?php
require_once '../config/connect.php';

$nome = trim(ucfirst($_POST['nomeuser']));
$cpf = trim($_POST['cpfuser']);
$telefone = trim($_POST['telefoneuser']);
$email = trim(strtolower($_POST['emailuser']));
$senha = trim($_POST['passuser']);

if (strpos($email, " ") == true or strpos($senha, " ") == true) {
    echo "<script>alert('Os campos e-mail e senha não podem conter espaços em branco.')</script>";
    echo "<script>window.location.href = '../views/cadastro.html'</script>";
    exit();
}

if (!empty($nome) && !empty($cpf) && !empty($telefone) && !empty($email) && !empty($senha)) {
    $queryEmailETelefoneECpf = "SELECT * FROM usuario WHERE email = ? OR telefone = ? OR cpf = ?";
    $stmtEmailETelefoneECpf = $conn->prepare($queryEmailETelefoneECpf);
    $stmtEmailETelefoneECpf->bind_param("sss", $email, $telefone, $cpf);
    $stmtEmailETelefoneECpf->execute();
    $resultEmailETelefoneECpf = $stmtEmailETelefoneECpf->get_result();

    if ($resultEmailETelefoneECpf->num_rows > 0) {
        echo "<script>alert('E-mail/Telefone/CPF já cadastrado. Tente utilizar outro.')</script>";
        echo "<script>window.location.href = '../views/cadastro.html'</script>";
        exit();
    }

    $hash = password_hash($senha, PASSWORD_DEFAULT);

    $queryCadastro = "INSERT INTO usuario (nome, cpf, telefone, email, senha) VALUES (?, ?, ?, ?, ?)";
    $stmtCadastro = $conn->prepare($queryCadastro);
    $stmtCadastro->bind_param("sssss", $nome, $cpf, $telefone, $email, $hash);
    $stmtCadastro->execute();
    $stmtCadastro->close();

    echo "<script>alert('Cadastro realizado com sucesso!')</script>";
    echo "<script>window.location.href = '../views/login.html'</script>";
    exit();
} else {
    echo "<script>alert('É necessário que todos os campos estejam preenchidos.')</script>";
    echo "<script>window.location.href = '../views/cadastro.html'</script>";
    exit();
}