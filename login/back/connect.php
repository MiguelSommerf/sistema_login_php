<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'login';

$mysqli = new mysqli($hostname, $username, $password, $database);

if($mysqli->error){
    die("Falha na conexão com o banco de dados.");
    echo "$mysqli->error";
}else{
    //echo "Conectado ao banco.";
}
?>