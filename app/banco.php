<?php

function banco($server, $user, $password, $db, $consulta)
{
    $banco = new mysqli($server, $user, $password, $db);

    if ($banco->connect_error) {
        echo "Falha de conexão: (" . $banco->connect_errno . ") - " . $banco->connect_error;
        exit();
    }

    if (!$resultado = $banco->query($consulta)) {
        echo "Falha na consulta: (" . $banco->errno . ") - " . $banco->error;
        exit();
    }

    $banco->close();

    return $resultado;
}

?>