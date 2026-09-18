<?php

include "app/cons.php";
require_once "app/banco.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = addslashes($_POST["nome"] ?? "");
    $preco = addslashes($_POST["preco"] ?? "");
    $imagem = addslashes($_POST["imagem"] ?? "");

    $consulta = "INSERT INTO produtos (Nome, Preco, Imagem) VALUES ('$nome', '$preco', '$imagem')";

    $resultado = banco($server, $user, $password, $db, $consulta);

    echo "<script>alert('Produto cadastrado!');</script>";
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Cadastrar Produto</h2>

<form method="POST">

    <input type="text" name="nome" placeholder="Nome do produto" required>
    <input type="text" name="preco" placeholder="Preço" required>
    <input type="text" name="imagem" placeholder="Nome da imagem (ex: prod1.jpg)" required>

    <button type="submit">Salvar</button>

</form>

<?php include "footer.php"; ?>

</body>
</html>