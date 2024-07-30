<?php

$host = "127.0.0.1";
$user = "root"; // substitua pelo seu usuário
$senha = ""; // substitua pela sua senha
$bd = "sql_testes";

// Conectando ao banco de dados
$conexao = mysqli_connect($host, $user, $senha, $bd);

if (mysqli_connect_errno()) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

?>
