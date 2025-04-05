<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] !== 'admin') {
    header('Location: index.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = $conexao->real_escape_string($_POST['nome']);
    $email = $conexao->real_escape_string($_POST['email']);
    $senha = md5($_POST['senha']); // ⚠️ Em produção, use password_hash()!
    $nivel = $conexao->real_escape_string($_POST['nivel']);
    $marca_id = isset($_POST['marca_id']) && $_POST['marca_id'] !== '' ? intval($_POST['marca_id']) : 'NULL';

    // Verifica se o e-mail já está cadastrado
    $verifica = $conexao->query("SELECT id FROM usuarios WHERE email = '$email'");
    if ($verifica && $verifica->num_rows > 0) {
        header("Location: cadastro_usuario.php?erro=email");
        exit;
    }

    if ($nivel === 'usuario' && $marca_id !== 'NULL') {
        $sql = "INSERT INTO usuarios (nome, email, senha, nivel, marca_id)
                VALUES ('$nome', '$email', '$senha', '$nivel', $marca_id)";
    } else {
        $sql = "INSERT INTO usuarios (nome, email, senha, nivel)
                VALUES ('$nome', '$email', '$senha', '$nivel')";
    }

    if ($conexao->query($sql) === TRUE) {
        header("Location: cadastro_usuario.php?sucesso=1");
    } else {
        header("Location: cadastro_usuario.php?erro=1");
    }
    exit;
}
?>
