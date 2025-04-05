<?php
session_start();
require_once 'conexao.php';

// Verifica se está logado e é admin
if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] !== 'admin') {
    header('Location: index.php');
    exit;
}

// Verifica se recebeu o ID do usuário via GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Proteção: não permite excluir a si mesmo
    if ($_SESSION['usuario'] == $id) {
        header("Location: ver_cadastro.php?erro=auto_exclusao");
        exit;
    }

    // Executa a exclusão
    $sql = "DELETE FROM usuarios WHERE id = $id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: ver_cadastro.php?sucesso=excluido");
    } else {
        header("Location: ver_cadastro.php?erro=exclusao");
    }
} else {
    header("Location: ver_cadastro.php?erro=parametro");
}
exit;
?>
