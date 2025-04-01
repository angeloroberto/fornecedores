<?php
session_start();
include "nav.php";

// Verifica se está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

// Verifica se o nível é 'usuario'
if ($_SESSION['nivel'] !== 'usuario') {
    echo "<div style='padding: 20px; color: red;'>Acesso restrito! Esta área é apenas para usuários comuns.</div>";
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento - Usuário</title>
    <link rel="stylesheet" href="agendamento.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">

    <h2>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h2>
    <p>Nível de acesso: <?php echo $_SESSION['nivel']; ?></p>

    <!-- Exibe conteúdo do Metabase ou outro conteúdo -->
    <iframe src="https://metabase.dicasaweb.com.br/public/question/32bf7d95-9c08-4342-8d20-0b3e312e596f" 
            frameborder="0" width="100%" height="600" allowfullscreen></iframe>

    <iframe    src="https://metabase.dicasaweb.com.br/public/question/cdd80c5d-cb44-447a-b2b7-9cb48ea532d5"    frameborder="0"    width="800"    height="600"    allowtransparency></iframe>
</div>

</body>
</html>
