<?php

function banco($server, $user, $password, $db, $consulta)
{
    $banco = new mysqli($server, $user, $password, $db);

    if ($banco->connect_error) {
        die("Falha de conexão: " . $banco->connect_error);
    }

    $banco->set_charset("utf8mb4");

    $resultado = $banco->query($consulta);

    if (!$resultado) {
        die("Falha na consulta: " . $banco->error);
    }

    return $resultado;
}

?>
