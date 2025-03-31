<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
       <div class="logo">
        <img src="dicasa_logo_175.png" alt=""> <br><br>

        <?php if (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
        <p style="color: red;">Usuário ou senha inválidos!</p>
        <?php endif; ?>

        <form action="login.php" method="post">
        <input type="text" id="input_usuario" name="input_usuario" placeholder="Email" > <br><br>
        <input type="password" placeholder="Senha" name="input_senha"  id="input_senha">
        <br><br>
        <button type="submit">Entrar</button>
       
        </form>
       </div>
    
</body>
</html>