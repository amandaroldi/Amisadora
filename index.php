<?php
session_start();

include __DIR__ . "/app/cons.php";
require_once __DIR__ . "/app/banco.php";

$consulta = "SELECT * FROM produtos";
$resultado = banco($server, $user, $password, $db, $consulta);
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Amisadora</title>
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

        <a href="logout.php">
            Sair (<?= $_SESSION["login"] ?>)
        </a>

    <?php else: ?>

        <a href="login.php">Login</a>

    <?php endif; ?>

    <a href="contato.php">Contato</a>
    <a href="carrinho.php">Carrinho</a>

</nav>

<main class="vitrine">

    <section class="produtos">

        <?php while ($linha = $resultado->fetch_assoc()): ?>

            <div class="produto">

                <img
                    src="img/<?= $linha["Imagem"] ?>"
                    alt="<?= $linha["Nome"] ?>"
                >

                <h3>
                    <?= $linha["Nome"] ?>
                </h3>

                <p>
                    R$ <?= number_format($linha["Preco"], 2, ',', '.') ?>
                </p>

                <a href="carrinho.php?produto=<?= urlencode($linha["Nome"]) ?>&preco=<?= $linha["Preco"] ?>">
                    <button type="button">
                        Adicionar ao Carrinho
                    </button>
                </a>

            </div>

        <?php endwhile; ?>

    </section>

</main>

<?php include "footer.php"; ?>

</body>
</html>
