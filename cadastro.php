<?php
session_start();

include "app/cons.php";
require_once "app/banco.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = addslashes($_POST["nome"] ?? "");
    $cpf = addslashes($_POST["cpf"] ?? "");
    $endereco = addslashes($_POST["endereco"] ?? "");
    $bairro = addslashes($_POST["bairro"] ?? "");
    $cidade = addslashes($_POST["cidade"] ?? "");
    $estado = addslashes($_POST["estado"] ?? "");
    $cep = addslashes($_POST["cep"] ?? "");

    $consulta = "INSERT INTO usuarios (Nome, CPF, Endereco, Bairro, Cidade, Estado, CEP) VALUES ('$nome', '$cpf', '$endereco', '$bairro', '$cidade', '$estado', '$cep')";

    $resultado = banco($server, $user, $password, $db, $consulta);

    $_SESSION["cpf_temp"] = $cpf;

    header("Location: cadastro_login.php");
    exit;
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="header">
    <img src="header.png" alt="Header da Loja">
</header>

<main class="confirmacao-container">

    <div class="confirmacao-box">

        <h2>Cadastro - Dados Pessoais</h2>

        <form method="POST">

            <input type="text" name="nome" placeholder="Nome completo" required>
            <input type="text" name="cpf" id="cpf" placeholder="CPF" required>
            <input type="text" name="endereco" placeholder="Endereço" required>
            <input type="text" name="bairro" placeholder="Bairro" required>
            <input type="text" name="cidade" placeholder="Cidade" required>
            <input type="text" name="estado" placeholder="Estado" required>
            <input type="text" name="cep" placeholder="CEP" required>

            <button type="submit">Continuar</button>

        </form>

    </div>

</main>

<?php include "footer.php"; ?>

</body>
</html>