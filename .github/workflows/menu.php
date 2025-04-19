<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
  header("Location: index.html");
  exit();
}
$nome = $_SESSION['nome'] ?? 'Usuário';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Menu - I-Money</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
    body { background: #f8f8f8; }
    header {
      background: white;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    .logo { font-size: 24px; font-weight: 700; color: #1c1c1c; }
    .logo span { color: #108AB1; }
    .icons i { font-size: 20px; color: #108AB1; margin-left: 20px; cursor: pointer; }
    main {
      padding: 20px;
    }
    h2 {
      color: #333;
      margin-bottom: 10px;
      margin-top: 30px;
      font-size: 20px;
    }
    .btn-link {
      display: block;
      background: #108AB1;
      color: white;
      padding: 12px;
      text-align: center;
      border-radius: 20px;
      margin-bottom: 10px;
      text-decoration: none;
      font-weight: 500;
      box-shadow: 0 4px 10px rgba(229, 57, 53, 0.3);
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">I-<span>Biblioteca</span></div>
    <div class="icons">
      <i class="bi bi-whatsapp" onclick="window.location.href='https://wa.me/258844309266'" title="Contacto"></i>
      <i class="bi bi-gear" onclick="window.location.href='definicao.php'" title="Definições"></i>
    </div>
  </header>
  <main>
    <h2>Bem-vindo, <?php echo htmlspecialchars($nome); ?>!</h2>

    <h2>TMG</h2>
    <a href="https://drive.google.com/drive/folders/1nFpU-37PNqlSZuq89hHGurASSVwa5OSG" class="btn-link">1° Semestre</a>
    <a href="https://drive.google.com/drive/folders/1oIbSXZGly3ito4vObiJ0vFl2a0FAlfkl" class="btn-link">2° Semestre</a>
    <a href="https://drive.google.com/drive/folders/1MGWNkLnHtdvOPSAnXrhCpJMucFBcbGXY" class="btn-link">3° Semestre</a>
    <a href="https://drive.google.com/drive/folders/1KmwXs3vSRJSVL9AZ-5b3RE_9pD65d51t" class="btn-link">4° Semestre</a>
    <a href="https://drive.google.com/drive/folders/1RKLYGo8oNQfE1IKRWkr_6MaH9fKNJZUU" class="btn-link">5° Semestre</a>

    <h2>Enfermagem</h2>
    <a href="#" class="btn-link">1° Semestre</a>
    <a href="#" class="btn-link">2° Semestre</a>
    <a href="#" class="btn-link">3° Semestre</a>
    <a href="#" class="btn-link">4° Semestre</a>

    <h2>ESMI</h2>
    <a href="#" class="btn-link">1° Semestre</a>
    <a href="#" class="btn-link">2° Semestre</a>
    <a href="#" class="btn-link">3° Semestre</a>

    <h2>Nutrição</h2>
    <a href="#" class="btn-link">1° Semestre</a>
    <a href="#" class="btn-link">2° Semetre</a>

    <h2>Programação</h2>
    <a href="#" class="btn-link">Introdução a Java</a>
    <a href="#" class="btn-link">HTML</a>
    <a href="#" class="btn-link">CSS</a>
  </main>
</body>
</html>