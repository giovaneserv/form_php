<?php
session_start();
require "conecta.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $data_nascimento = $_POST['data_nascimento'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    $nivel = 2;

    /* ↓ verifica se email já foi cadastrado*/
    $emailCheck = "SELECT * FROM `usuarios` WHERE email = ?";
    $stmt_email = $conexao->prepare($emailCheck);
    $stmt_email->bind_param('s', $email);
    $stmt_email->execute();
    $result_check = $stmt_email->get_result();

    if ($result_check->num_rows > 0) {
        echo "email já cadastrado";
    } else {
        /* ↓ verifica se a string digitada é um email ↓ */
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "email inválido";
        } else {
            if ($senha === $confirmar_senha) {
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

                $sql = "INSERT INTO `usuarios`(`id_usuario`, `nome`, `sobrenome`, `email`, `endereco`, `senha`, `data_nascimento`, `nivel`) VALUES (DEFAULT,'$nome','$sobrenome','$email','$endereco','$senhaHash','$data_nascimento','$nivel')";

                $query = mysqli_query($conexao, $sql);

                if ($query) {
                    /*↓ isso garante que  que a sessão será inicializada apos o cadastro*/
                    $_SESSION['usuario'] = array(
                        'id_usuario' => $user_id,
                        'nome' => $nome,
                        'sobrenome' => $sobrenome,
                        'email' => $email,
                        'nivel' => $nivel
                    );
                    /* ↓depois disso, redirecionar para index.php */
                    header("location:../index.php");
                } else {
                    echo "Erro ao registrar usuário: " . mysqli_error($conexao);
                }
            } else {
                echo 'As senhas não correspondem.';
            }
        }
    }
}
$conexao->close();
