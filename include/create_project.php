<?php
	$title = "Criar Projeto";
	include 'title_page.php';
	require 'security.php'; 
	include 'navbar.php'; 

	$server = "localhost";
	$user = "belom742_omilen";
	$password = " ";
	$dbname = "root";

	$conn = mysqli_connect ($server, $user, $password, $dbname);
	$query_n = mysqli_query($conn, "SELECT name, id FROM obras");
?>