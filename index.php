<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$usuario_log = false;
$nome;

if (isset($_SESSION['usuario']) && is_array($_SESSION['usuario'])) {
    $usuario_log = true;
    /* chave `usuario` do BD e 'nome' segunda coluna de tabela usuario no  DB */
    $nome = $_SESSION['usuario']['nome'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<body>
    <h1 class="titulo">Cadastre-se</h1>
    <?php if ($usuario_log) : ?>
    <a href="php/logout.php" class="logout-link">Logout</a>
<?php endif; ?>
    <main class="contato">
        <div class="area-do-formulario">
            <div class="introducao">
            </div>
            <form class="formulario" method="POST" action="php/cadastra.php">
                <div class="area-nome-completo">
                    Nome:<input type="text" name="nome" id="nome" placeholder="Nome" class="area info" required>
                    Sobrenome:<input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" class="area info">
                </div>

                Email:<input type="text" name="email" id="email" placeholder="Email" class="info" required>

                Endereço: <input type="text" name="endereco" id="endereco" placeholder="Endereço">

                Senha: <input type="password" name="senha" id="senha" placeholder="Senha">
                Confirmar Senha: <input type="password" name="confirmar_senha" id="confirmar-senha" placeholder="Confirmar Senha">
                <br>

                
                    Data de Nascimento: <br>
                    <input type="date" name="data_nascimento" class="data_nascimento" id="">

                <div class="area-botao">
                    <input type="submit" value="Cadastre-se" placeholder="enviar" class="btn">
                </div>
                <p>Já tem cadastro? <a href="login.php">Fazer login</a></p>
                <div class="termos">
                    <p>Ao clicar em Cadastre-se, você concorda com nossos Termos, <strong><a href="#">Política de Privacidade</a></strong> e <strong><a href="#">Política de Cookies</a></strong>. Você poderá receber notificações por SMS e cancelar isso quando quiser.</p>
                </div>
            </form>
    </main>
</body>
</body>
</html>