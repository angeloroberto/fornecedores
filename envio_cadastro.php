<?php
session_start();
require_once 'conexao.php';

// Verifica se é admin
if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] !== 'admin') {
    header('Location: index.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = $conexao->real_escape_string($_POST['nome']);
    $email = $conexao->real_escape_string($_POST['email']);
    $senha = md5($_POST['senha']); // ⚠️ use password_hash() em produção
    $nivel = $conexao->real_escape_string($_POST['nivel']);

    // Verifica se o e-mail já está cadastrado
    $verifica = $conexao->query("SELECT id FROM usuarios WHERE email = '$email'");
    if ($verifica && $verifica->num_rows > 0) {
        // Redireciona com erro de e-mail duplicado
        header("Location: cadastro_usuario.php?erro=email");
        exit;
    }

    // Insere novo usuário
    $sql = "INSERT INTO usuarios (nome, email, senha, nivel)
            VALUES ('$nome', '$email', '$senha', '$nivel')";

    if ($conexao->query($sql) === TRUE) {
        header("Location: cadastro_usuario.php?sucesso=1");
    } else {
        header("Location: cadastro_usuario.php?erro=1");
    }
    exit;
}
?>