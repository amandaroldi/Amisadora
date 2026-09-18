<?php
session_start();

$login = $_SESSION["login"] ?? "Usuário";

$boleto = "34191." . rand(10000, 99999) . "." . rand(10000, 99999);
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Boleto Bancário</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="payment-box">

    <h2>Boleto Bancário</h2>

    <p><strong>Usuário:</strong> <?= $login ?></p>

    <p>Código do boleto:</p>

    <div class="boleto-highlight">
        <?= $boleto ?>
    </div>

    <p>Este boleto é uma simulação de pagamento.</p>

    <a href="finalizar_compra.php">
        <button>Já paguei o boleto</button>
    </a>

</div>

<?php include "footer.php"; ?>

</body>
</html>