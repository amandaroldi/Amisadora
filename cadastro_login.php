<?php
session_start();

include "app/cons.php";
require_once "app/banco.php";

$cpf = $_SESSION["cpf_temp"] ?? null;

if (!$cpf) {
    die("CPF não informado. Volte para o cadastro.");
}

$cpf = addslashes($cpf);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $login = addslashes($_POST["login"] ?? "");
    $senha = $_POST["senha"] ?? "";

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $consulta = "UPDATE usuarios SET Login = '$login', Senha = '$senhaCriptografada' WHERE CPF = '$cpf'";

    $resultado = banco($server, $user, $password, $db, $consulta);

    header("Location: login.php");
    exit;
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Login</title>
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

<main class="cadastro-container">

    <div class="cadastro-box">

        <h2>Dados de Acesso</h2>

        <form method="POST">

            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">Finalizar Cadastro</button>

        </form>

    </div>

</main>

<?php include "footer.php"; ?>

</body>
</html>