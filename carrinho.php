<?php
session_start();

include "app/cons.php";
require_once "app/banco.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$usuario = addslashes($_SESSION["login"]);

if (isset($_GET["produto"]) && isset($_GET["preco"])) {
    $produto = addslashes($_GET["produto"]);
    $preco = (float) $_GET["preco"];

    $consulta = "INSERT INTO carrinho (usuario, produto, preco) VALUES ('$usuario', '$produto', $preco)";
    banco($server, $user, $password, $db, $consulta);

    header("Location: carrinho.php");
    exit;
}

if (isset($_GET["remover"])) {
    $id = (int) $_GET["remover"];

    $consulta = "DELETE FROM carrinho WHERE Id = $id AND usuario = '$usuario'";
    banco($server, $user, $password, $db, $consulta);

    header("Location: carrinho.php");
    exit;
}

$consulta = "SELECT * FROM carrinho WHERE usuario = '$usuario'";
$resultado = banco($server, $user, $password, $db, $consulta);

$itens = [];
while ($linha = $resultado->fetch_assoc()) {
    $itens[] = $linha;
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Carrinho</title>
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

<main class="carrinho-container">

    <h2>Seu Carrinho</h2>

    <?php if (empty($itens)): ?>

        <p>Seu carrinho está vazio.</p>

    <?php else: ?>

        <?php
        $total = 0;

        foreach ($itens as $item):

            $total += $item["preco"];
        ?>

            <div class="item">
                <p><?= $item["produto"] ?> - R$ <?= number_format($item["preco"], 2, ',', '.') ?></p>

                <a href="carrinho.php?remover=<?= $item['Id'] ?>">Remover</a>
            </div>

        <?php endforeach; ?>

        <hr>

        <h3>Total: R$ <?= number_format($total, 2, ',', '.') ?></h3>

        <a href="confirmacao_compra.php">
            <button>Finalizar Compra</button>
        </a>

    <?php endif; ?>

</main>

<?php include "footer.php"; ?>

</body>
</html>
