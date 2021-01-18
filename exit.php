<?php 
session_start();

unset ($_SESSION['id'], $_SESSION['user']);

if (!isset($_SESSION['msg'])) {
	$_SESSION['msg'] = "Deslogado com Sucesso!";
	header ("Location: login.php");
} else {
	header ("Location: login.php");
}