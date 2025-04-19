<?php
require_once 'conexao.php';
session_start();

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

try {
    $stmt = $pdo->prepare("SELECT * FROM Clientes WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome'] = $usuario['nome'];
        header("Location: menu.php");
        exit();
    } else {
        echo "<script>alert('Email ou senha inválidos.'); window.location.href = 'index.html';</script>";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}