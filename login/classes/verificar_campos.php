<?php
require_once '../back/connect.php';
class verificarCampos{
    private $mysqli;

    public function __construct($mysqli){
        $this->mysqli = $mysqli;
    }

    public function verificarEmail($email){
        if(isset($email)){
            if(strlen($email) == 0){
                echo "<script>alert('É necessário que o campo e-mail seja preenchido.')</script>";
                echo "<script>window.history.back();</script>";
                exit();
            }
        }
    }

    public function verificarSenha($senha){
        if(isset($senha)){
            if(strlen($senha) == 0){
                echo "<script>alert('É necessário que o campo senha seja preenchido.')</script>";
                echo "<script>window.history.back();</script>";
                exit();
            }
        }
    }

    public function verificarEmailExistente($email){
       $sql_query = "SELECT email FROM usuario WHERE email = ?";
       $stmt = $this->mysqli->prepare($sql_query);
       $stmt->bind_param("s", $email);
       $stmt->execute();
       $result = $stmt->get_result();

       if($result->num_rows > 0){
        echo "<script>alert('O endereço de e-mail digitado já foi cadastrado. Tente utilizar outro endereço de e-mail.')</script>";
        echo "<script>window.history.back();</script>";
        exit();
       }
    }
}
?>