<?php
session_start();

require_once 'conexao.php';

// Pega os dados do formulário
$email = $_POST['input_usuario'] ?? '';
$senha = $_POST['input_senha'] ?? '';

// Protege contra SQL Injection
$email = $conexao->real_escape_string($email);
$senha = md5($senha); // ⚠️ use password_hash em produção!

// Consulta o usuário
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$result = $conexao->query($sql);

if ($result && $result->num_rows === 1) {
    $usuario = $result->fetch_assoc();
    $_SESSION['usuario'] = $usuario['email'];
    $_SESSION['nivel'] = $usuario['nivel'];
    header('Location: agendamento.php');
    exit;
} else {
    header('Location: index.php?erro=1');
    exit;
}


?>