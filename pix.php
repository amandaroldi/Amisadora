<?php
session_start();

$login = $_SESSION["login"] ?? "Usuário";
$chavePix = "PIX-" . rand(100000, 999999);
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Pagamento Pix</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="payment-box">

    <h2>Pagamento via Pix</h2>

    <p><strong>Usuário:</strong> <?= $login ?></p>

    <p>Chave Pix:</p>

    <div class="pix-highlight">
        <?= $chavePix ?>
    </div>

    <button onclick="window.location.href='finalizar_compra.php'">
        Já paguei
    </button>

</div>

<?php include "footer.php"; ?>

</body>
</html>