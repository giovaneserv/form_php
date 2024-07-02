<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1 class="titulo">Fazer Login</h1>
    </body>
    
    <main class="contato">
        <div class="area-do-formulario">
            <div class="introducao">
            </div>

            <form class="formulario" method="POST" action="php/login.php">
                Email:<input type="text" name="email" id="email" placeholder="Email" class="info" required>


                Senha: <input type="password" name="senha" id="senha" placeholder="Senha">
                    <input type="submit" value="Login" placeholder="enviar" class="btn">
                </div>
            </form>
    </main>
</body>
</html>