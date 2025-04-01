<?php
session_start();
require_once 'conexao.php';
include 'nav.php';

// Verifica se está logado e se é admin
if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] !== 'admin') {
    header('Location: index.php');
    exit;
}

// Se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = $conexao->real_escape_string($_POST['nome']);
    $email = $conexao->real_escape_string($_POST['email']);
    $senha = md5($_POST['senha']); // ⚠️ Use password_hash em produção
    $nivel = $conexao->real_escape_string($_POST['nivel']);

    $sql = "INSERT INTO usuarios (nome, email, senha, nivel)
            VALUES ('$nome', '$email', '$senha', '$nivel')";

    if ($conexao->query($sql) === TRUE) {
        $mensagem = "Usuário cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar usuário: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Cadastro de Usuário</h2>

    <?php if (!empty($mensagem)): ?>
        <div class="alert alert-info"><?php echo $mensagem; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
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
    </form>

    <br>
    <a href="pag_admin.php" class="btn btn-secondary">Voltar</a>
</body>
</html>