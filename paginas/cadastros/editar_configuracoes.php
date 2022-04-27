<?php
    $id = $_GET['id'];
    echo "<center style='align-items:center;'>";
        include("editar_usuario.php");
        echo "<br><br>";
        include("editar_configuracoes_sistema.php");
    echo "</center>";
?>
