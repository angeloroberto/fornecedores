


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedor</title>
    <link rel="stylesheet" href="agendamento.css">
    <!-- bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
   
    

</head>
<body>

<?php include "nav.php";

if (session_status() === PHP_SESSION_NONE) session_start();

// Se não estiver logado, redireciona
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

// Exemplo de restrição por nível
if ($_SESSION['nivel'] !== 'admin') {
    echo "Acesso restrito!";
    exit;
}
?>

<div class="container mt-5">

<!-- Conteúdo da página restrita -->
<h5>Bem-vindo, <?php echo $_SESSION['nome']; ?>.</h5>
<p>Nível de acesso: <?php echo $_SESSION['nivel']; ?></p>

    

<iframe    src="https://metabase.dicasaweb.com.br/public/dashboard/f7cd3ff5-2687-4d9c-b9a4-dcda9097e493"    frameborder="0"    width="1300"    height="1200"    allowtransparency></iframe>

</div>
                        
      


   
   
</body>
</html>