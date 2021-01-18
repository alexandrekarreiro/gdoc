<?php
session_start();
$cod_back = filter_input(INPUT_POST, 'cod-back', FILTER_SANITIZE_STRING);
$cod = filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_STRING);
$desc = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$date = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);

$cods = explode("-", $cod);
$OB = $cods[0];
$Num_1 = $cods[1];

$arq = $_FILES['file'];
$arq_pdf = $_FILES['file_pdf'];
$dir = "upload/";

$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";

$conn = mysqli_connect ($server, $user, $password, $dbname);

#DWG/DOC
$domain = strstr($arq['name'], '.');
$count = strlen($domain);
$ext = substr($arq['name'], -$count);
$ult = substr($cod, -2);
$name_arq = $cod."-".$desc.$ext;
move_uploaded_file($arq['tmp_name'], $dir.$OB."/".$Num_1."/".$name_arq);

#PDF 
$domain_pdf = strstr($arq_pdf['name'], '.');
$count_pdf = strlen($domain_pdf);
$ext_pdf = substr($arq_pdf['name'], -$count_pdf);
$ult_pdf = substr($cod, -2);
$name_arq_pdf = $cod."-".$desc.$ext_pdf;
move_uploaded_file($arq_pdf['tmp_name'], $dir.$OB."/".$Num_1."/".$name_arq_pdf);


$sql = "INSERT INTO projetos (nome, descricao, data, status, arq, user, num_rev) VALUES ('".$cod."', '".$desc."', '".$date."', '".$status."', '".$name_arq."', '".$usuario."','".$ult."')";

$sql_pdf = "INSERT INTO projetos_pdf (nome, descricao, data, status, arq, user, num_rev) VALUES ('".$cod."', '".$desc."', '".$date."', '".$status."', '".$name_arq_pdf."', '".$usuario."','".$ult."')";


if ($_FILES['file_pdf']['size'] > 0) {

	if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql_pdf)) {
		$_SESSION['create_project'] = "Projeto revisado com sucesso!";
		header ("Location: ../../dashboard.php");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


} else {

	if (mysqli_query($conn, $sql)) {
		$_SESSION['create_project'] = "Projeto revisado com sucesso!";
		header ("Location: ../../dashboard.php");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
}
?>