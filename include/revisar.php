<?php
$cod = $_GET['cod'];
$data = date('Y-m-d');
$usuario = $_SESSION['user'];
$title = "Projeto -".$cod;
include 'title_page.php';

$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";

$conn = mysqli_connect ($server, $user, $password, $dbname);

$a = 1;
$sql =  "SELECT * FROM projetos WHERE nome LIKE '%".$cod."%'";
$query = mysqli_query($conn, $sql);
$res = mysqli_fetch_array($query);
$query_s = mysqli_query($conn, "SELECT id, name FROM status");
$num_rev = $res['num_rev'];
$cod_sub = substr($cod, 0, -2);

$code = $res['num_rev']+1;
if ($code < 10) {
	$new_cod = "0".$code;
} else {
	$new_cod = $code;
}

require 'security.php'; 
require 'header.php'; 
include 'navbar.php';
?>