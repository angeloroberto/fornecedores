<?php
session_start();
require_once 'conexao.php';

// Verifica se está logado e se é admin
if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] !== 'admin') {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="agendamento.css">
   
</head>
<body> 
<?php include 'nav.php'; ?> <!-- Nav incluído DENTRO do body para ficar padronizado -->

<div class="container mt-5">
    <h2>Cadastro de Usuário</h2>

    <?php if (isset($_GET['sucesso'])): ?>
        <div class="alert alert-success">Usuário cadastrado com sucesso!</div>
    <?php elseif (isset($_GET['erro'])): ?>
        <div class="alert alert-danger">Erro ao cadastrar usuário.</div>
    <?php endif; ?>

    <form method="POST" action="envio_cadastro.php">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nível de Acesso</label>
            <select name="nivel" class="form-control" required>
                <option value="usuario">Usuário</option>
                <option value="admin">Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="pag_admin.php" class="btn btn-secondary ml-2">Voltar</a>
    </form>
</div>

   

    
</body>
</html>