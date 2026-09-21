<?php

function banco($server, $user, $password, $db, $consulta)
{
    $banco = new mysqli($server, $user, $password, $db);

    if ($banco->connect_error) {
        echo "Falha de conexão: (" .
             $banco->connect_errno .
             ") - " .
             $banco->connect_error;
        exit();
    }

    $banco->set_charset("utf8mb4");

    $resultado = $banco->query($consulta);

    if (!$resultado) {
        echo "Falha na consulta: (" .
             $banco->errno .
             ") - " .
             $banco->error;
        exit();
    }

    return $resultado;
}

?>
