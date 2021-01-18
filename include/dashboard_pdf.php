<?php
$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";

$conn = mysqli_connect ($server, $user, $password, $dbname);
$query_st = mysqli_query($conn, "SELECT id, name FROM status");

$pesquisar = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '';
$pesq_data = isset($_GET['pesq_data']) ? $_GET['pesq_data'] : '';
$pesq_user = isset($_GET['pesq_user']) ? $_GET['pesq_user'] : '';
$pesq_status = isset($_GET['pesq_status']) ? $_GET['pesq_status'] : '';
$result = "SELECT * FROM projetos_pdf WHERE nome LIKE '%$pesquisar%' AND data LIKE '%$pesq_data%' AND user LIKE '%$pesq_user%'  AND status LIKE '%$pesq_status%'ORDER BY data DESC LIMIT 1000";
$resultado_p = mysqli_query($conn, $result);
?>