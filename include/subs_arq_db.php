<?php
session_start();
$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";

$conn = mysqli_connect ($server, $user, $password, $dbname);

$cod = $_POST['cod'];
$arq = $_FILES['file'];
$arq_name = $_FILES['file']['name'];
list($a,$ext) = explode(".", $arq_name);
$arq_pdf = $_FILES['file_pdf'];

$sql =  "SELECT * FROM projetos WHERE nome LIKE '%".$cod."%' ORDER BY nome DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$res = mysqli_fetch_array($query);

$sql_p =  "SELECT * FROM projetos_pdf WHERE nome LIKE '%".$cod."%' ORDER BY nome DESC LIMIT 1";
$query_p = mysqli_query($conn, $sql_p);
$res_p = mysqli_fetch_array($query_p);

list($arq_res, $ext_r) = explode(".", $res['arq']);


$cods = explode("-", $cod);
$OB = $cods[0];
$Num_1 = $cods[1];
$dir = "upload/";


#DWG/DOC
$name_arq = $arq_res.".".$ext;
if ($_FILES['file']['size'] > 0) {
	if (unlink($dir.$OB."/".$Num_1."/".$res['arq'])) {
		move_uploaded_file($arq['tmp_name'], $dir.$OB."/".$Num_1."/".$name_arq);
	}
}

#PDF
$name_arq_pdf = $arq_res.".pdf";
if ($_FILES['file_pdf']['size'] > 0) { 
	if (unlink($dir.$OB."/".$Num_1."/".$res_p['arq'])) {
		move_uploaded_file($arq_pdf['tmp_name'], $dir.$OB."/".$Num_1."/".$name_arq_pdf);
	}
}
if ($_FILES['file']['size'] > 0) {
	$sql = "UPDATE projetos SET arq='$name_arq' WHERE nome='$cod'";
	mysqli_query($conn, $sql);
}
if ($_FILES['file_pdf']['size'] > 0) {
	$sql_pdf = "UPDATE projetos_pdf SET arq='$name_arq_pdf' WHERE nome='$cod'";
	mysqli_query($conn, $sql_pdf);
}

if($_FILES['file_pdf']['size'] > 0 || $_FILES['file']['size'] > 0) {
	$_SESSION['create_project'] = "Arquivo substituído com sucesso!";
	header ("Location: ../dashboard.php");
} else {
	$_SESSION['create_project'] = "Ocorreu um erro!";
	header ("Location: ../dashboard.php");
}
?>