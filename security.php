<?php
if (!empty($_SESSION['id'])) {
    $usuario = $_SESSION['user'];
    } else {
    $_SESSION['msg'] = "Área Restrita";
    header ("Location: login.php");
}
?>