<?php
session_start();

include "app/cons.php";
require_once "app/banco.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $login = addslashes($_POST["login"] ?? "");
    $senha = $_POST["senha"] ?? "";

    $consulta = "SELECT * FROM usuarios WHERE Login = '$login'";

    $resultado = banco($server, $user, $password, $db, $consulta);

    $linha = $resultado->fetch_assoc();

    if ($linha && password_verify($senha, $linha["Senha"])) {

        $_SESSION["login"] = $login;

        header("Location: index.php");
        exit;

    } else {
        header("Location: erro.php");
        exit;
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="header">
    <img src="header.png" alt="Header da Loja">
</header>

<nav class="menu">
    <a href="index.php">Início</a>
    <?php if (isset($_SESSION["login"])): ?>
        <a href="logout.php">Sair (<?= $_SESSION["login"] ?>)</a>
    <?php else: ?>
        <a href="login.php">Login</a>
    <?php endif; ?>
    <a href="contato.php">Contato</a>
    <a href="carrinho.php">Carrinho</a>
</nav>

<main class="login-container">

    <div class="login-box">

        <h2>Entrar</h2>

        <form method="POST">

            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">Entrar</button>

        </form>

        <p class="link-cadastro">
            Não tem conta?
            <a href="cadastro.php">Cadastrar novo usuário</a>
        </p>

    </div>

</main>

<?php include "footer.php"; ?>

</body>
</html>