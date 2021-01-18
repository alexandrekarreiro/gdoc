<?php
session_start();
$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";

$conn = mysqli_connect ($server, $user, $password, $dbname);

$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
$newpass = filter_input(INPUT_POST, 'newpass', FILTER_SANITIZE_STRING);
$the_newpass = password_hash($newpass, PASSWORD_DEFAULT);

$res_user = "SELECT * FROM users WHERE user='$user' LIMIT 1 " or die (mysqli_error());
$res = mysqli_query($conn, $res_user);
$row_user = mysqli_fetch_assoc($res);

if (password_verify($pass, $row_user['pass'])) {
	$sql = "UPDATE users SET pass='$the_newpass' WHERE user='$user'";

	if (mysqli_query($conn, $sql)) {
		$_SESSION['msg'] = "Senha alterada com sucesso!";
		header("Location: exit.php");
	} else {
		$_SESSION['create_project'] = "Ocorreu um erro!";
		header ("Location: ../dashboard.php");
	}

} else {
	$_SESSION['create_project'] = "Senha atual incorreta!";
	header ("Location: mudar_senha.php");
}
?>