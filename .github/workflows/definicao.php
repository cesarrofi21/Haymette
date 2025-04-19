<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header("Location: index.html");
    exit();
}

// Conecta com o banco de dados
$con = new mysqli("127.0.0.1", "root", "root", "Banco"); // Usa o banco "Banco"
if ($con->connect_error) {
    die("Erro de conexão: " . $con->connect_error);
}

$email = $_SESSION['email'];
$sql = "SELECT nome FROM Clientes WHERE email = ?"; // Apenas busca o nome
$stmt = $con->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar a consulta: " . $con->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$nome = $row['nome'] ?? 'Usuário';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Definições - I-Money</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      background-color: #f5f5f5;
    }
    header {
      background: white;
      padding: 15px 20px;
      display: flex;
      align-items: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .logo {
      font-size: 24px;
      font-weight: 700;
      color: #1c1c1c;
    }
    .logo span {
      color: #108AB1;
    }
    main {
      padding: 20px;
      text-align: center;
    }
    .profile-pic {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background: #ddd;
      margin: 0 auto;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 40px;
      color: #888;
      cursor: pointer;
      overflow: hidden;
    }
    .profile-pic img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    h2 {
      margin-top: 15px;
      color: #333;
    }
    .logout {
      margin-top: 30px;
      background-color: #108AB1;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 20px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">I-<span>Biblioteca</span></div>
  </header>
  <main>
    
    <h2><?php echo htmlspecialchars($nome); ?></h2>

    <form method="post" action="logout.php">
      <button class="logout" type="submit">Terminar Sessão</button>
    </form>
  </main>
</body>
</html>