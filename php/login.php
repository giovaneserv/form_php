<?php
session_start();
require_once "conecta.php";
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
        /* ↓ consulta SQL no DB para logar */
    $sql = "SELECT id_usuario, nome, email, senha, nivel FROM `usuarios` WHERE email = ? ";
        /* ↑ dessa forma, retorna os dados do usuario quando for feito login e cadastro */

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $query = $stmt->get_result();

    if ($query === false) {
        return "erro na consulta";
        exit();
    }
    /* ↓ retorna número de linhas da consulta */
    if ($query->num_rows>0) {
        $row = $query->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            /* se o login for inicializado */
            $_SESSION['usuario'] = [
                'id_usuario' => $row['id_usuario'],
                'nome' => $row['nome'],
                'nivel' => $row['nivel']
            ];
            /* redirecionar para index.php */
            header("location:../index.php");
        } else {
            echo "senha incorreta";
        }
    } else {
        echo "email nao cadastrado";
    }
} else {
    echo "metodo invalido";
}


$conexao->close();
