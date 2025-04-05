<?php
session_start();
require_once 'conexao.php';

// Verifica se está logado e se é admin
if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] !== 'admin') {
    header('Location: index.php');
    exit;
}

// Carrega marcas do banco
$marcas = [];
$result = $conexao->query("SELECT id, nome FROM marcas ORDER BY nome ASC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $marcas[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="agendamento.css">
    <script>
        function verificarNivel() {
            var nivel = document.getElementById("nivel").value;
            var marcaDiv = document.getElementById("div-marca");
            marcaDiv.style.display = (nivel === "usuario") ? "block" : "none";
        }

        window.onload = function () {
            verificarNivel();
        };
    </script>
</head>
<body> 
<?php include 'nav.php'; ?>

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
            <select name="nivel" id="nivel" class="form-control" onchange="verificarNivel()" required>
                <option value="">Selecione</option>
                <option value="usuario">Usuário</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <div id="div-marca" class="form-group" style="display:none;">
            <label>Marca</label>
            <select name="marca_id" class="form-control">
                <option value="">Selecione a marca</option>
                <?php foreach ($marcas as $marca): ?>
                    <option value="<?= $marca['id'] ?>"><?= htmlspecialchars($marca['nome']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="pag_admin.php" class="btn btn-secondary ml-2">Voltar</a>
        <a href="ver_cadastro.php" class="btn btn-info ml-2">Ver Usuários</a>
        
    </form>
</div>
</body>
</html>
