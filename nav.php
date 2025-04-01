<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
   
</head>

<body>
    <div class="header">
        <div class="logo_header">
            <img src="dicasa_logo_175.png" class="img_nav" alt="">
        </div>
        <div class="navigation_header">
            <?php if (isset($_SESSION['nivel']) && $_SESSION['nivel'] === 'admin'): ?>
                <i class="fa-regular fa-calendar-days"><a href="cadastro_usuario.php"> Cadastro</a></i>
            <?php endif; ?>

            <i class="fa-sharp fa-solid fa-circle-xmark"> <a href="logout.php"> Sair</a></i>
        </div>
    </div>
</body>
</html>