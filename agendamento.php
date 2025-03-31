


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

session_start();

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

<!-- Conteúdo da página restrita -->
<h1>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h1>

    

            <iframe src="https://metabase.dicasaweb.com.br/public/question/32bf7d95-9c08-4342-8d20-0b3e312e596f" frameborder="0"width="800"height="600"allowtransparency></iframe>         

            <iframe    src="https://metabase.dicasaweb.com.br/public/question/cdd80c5d-cb44-447a-b2b7-9cb48ea532d5"    frameborder="0"    width="800"    height="600"    allowtransparency></iframe>
                        
      


   
   
</body>
</html>