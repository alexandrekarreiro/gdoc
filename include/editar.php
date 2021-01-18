<?php
require 'security.php'; 
require 'header.php'; 
include 'navbar.php'; 

$cod = $_GET['cod'];
$rev = explode("-", $cod);
$data = date('Y-m-d');
$usuario = $_SESSION['user'];

$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";

$conn = mysqli_connect ($server, $user, $password, $dbname);

$sql =  "SELECT * FROM projetos WHERE nome LIKE '%".$cod."%' ORDER BY nome DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$res = mysqli_fetch_array($query);
$query_s = mysqli_query($conn, "SELECT id, name FROM status");

$title = "Projeto - ".$cod;
include 'title_page.php';
?>