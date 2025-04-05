<?php
session_start();
require_once 'conexao.php';

// Verifica se está logado e se é admin
if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] !== 'admin') {
    header('Location: index.php');
    exit;
}

// Consulta usuários com join para trazer nome da marca
$sql = "SELECT u.id, u.nome, u.email, u.nivel, m.nome AS marca
        FROM usuarios u
        LEFT JOIN marcas m ON u.marca_id = m.id
        ORDER BY u.nome ASC";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<?php include 'nav.php'; ?>

<div class="container mt-5">
    <h2>Usuários Cadastrados</h2>

    <table class="table table-bordered table-hover mt-3">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Nível</th>
                <th>Marca</th>
                <th>Ações</th>
            
       
            
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($usuario = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= htmlspecialchars($usuario['nome']) ?></td>
                        <td><?= htmlspecialchars($usuario['email']) ?></td>
                        <td><?= ucfirst($usuario['nivel']) ?></td>
                        <td><?= $usuario['marca'] ? htmlspecialchars($usuario['marca']) : '-' ?></td>
                        <td>
        <a href="excluir_usuario.php?id=<?= $usuario['id'] ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
           Excluir
        </a>
             </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhum usuário cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="pag_admin.php" class="btn btn-secondary">Voltar</a>
</div>

</body>
</html>
