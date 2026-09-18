<?php
session_start();

include "app/cons.php";
require_once "app/banco.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$login = $_SESSION["login"];
$usuario = addslashes($login);

$consulta = "SELECT * FROM carrinho WHERE usuario = '$usuario'";
$resultado = banco($server, $user, $password, $db, $consulta);

$carrinho = [];
while ($linha = $resultado->fetch_assoc()) {
    $carrinho[] = $linha;
}

$total = 0;

foreach ($carrinho as $item) {
    $total += $item["preco"];
}

$pagamento = addslashes($_SESSION["pagamento"] ?? "Cartão");
$dataHora = date("Y-m-d H:i:s");

$consulta = "INSERT INTO vendas (Usuario, Total, Pagamento, DataHora) VALUES ('$usuario', '$total', '$pagamento', '$dataHora')";

$resultado = banco($server, $user, $password, $db, $consulta);

foreach ($carrinho as $item) {

    $produto = addslashes($item["produto"]);
    $preco = $item["preco"];

    $consulta = "INSERT INTO itens_venda (Usuario, Produto, Preco) VALUES ('$usuario', '$produto', '$preco')";

    $resultado = banco($server, $user, $password, $db, $consulta);
}

$consulta = "DELETE FROM carrinho WHERE usuario = '$usuario'";
$resultado = banco($server, $user, $password, $db, $consulta);

echo "<script>
alert('Compra finalizada com sucesso!');
window.location.href='index.php';
</script>";

?>