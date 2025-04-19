<?php
require_once 'conexao.php';
session_start();

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Validação da senha
if (strlen($senha) < 8 || !preg_match('/[0-9]/', $senha) || !preg_match('/[^a-zA-Z0-9]/', $senha)) {
    die("A senha deve conter pelo menos 8 caracteres, um número e um símbolo especial.");
}

// Criptografa a senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare("INSERT INTO Clientes (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $email, $senha_hash]);

    // Salva o usuário na sessão
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;

    // Redireciona para o menu
    header("Location: menu.php");
    exit();
} catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        echo "Email já cadastrado.";
    } else {
        echo "Erro: " . $e->getMessage();
    }
}