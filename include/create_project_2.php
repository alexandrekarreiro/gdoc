<?php 
if (!isset($_POST['ob'])) {
	header("Location: ../dashboard.php");
}


$title = "Criar Projeto";
include 'title_page.php';

require 'security.php';
require 'header.php';
include 'navbar.php';

$OB = $_POST['ob'];
$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";
$dbname_st = "projects";

$conn = mysqli_connect ($server, $user, $password, $dbname);

$name1 = $OB.'_Nom1';
$name2 = $OB.'_Nom2';
$name3 = $OB.'_Nom3';
$name4 = $OB.'_Nom4';

$query_1 = mysqli_query($conn, "SELECT id, Num FROM $name1");
$query_2 = mysqli_query($conn, "SELECT id, Num FROM $name2");
$query_3 = mysqli_query($conn, "SELECT id, Num FROM $name3");
$query_4 = mysqli_query($conn, "SELECT id, Num FROM $name4");

$conn_st = mysqli_connect ($server, $user, $password, $dbname_st);
$query_st = mysqli_query($conn_st, "SELECT id, name FROM status");

?>