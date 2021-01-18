
<?php
session_start();

$cod = filter_input(INPUT_POST, 'res_3', FILTER_SANITIZE_STRING);
$desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
$date = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);

$arq = $_FILES['file'];

$arq_pdf =$_FILES['file_pdf'];

$dir = "upload/";

$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";

$conn = mysqli_connect ($server, $user, $password, $dbname);

//----Criação de pastas----
$cods = explode("-", $cod);
$OB = $cods[0];
$Num_1 = $cods[1];
$Num_2 = $cods[2];
$Num_3 = $cods[3];
$Num_4 = $cods[4];
if(!is_dir($dir.$OB."/".$Num_1)) {
	mkdir($dir.$OB."/".$Num_1, 0777);
}

//-------------------------

#DOC/DWG
$domain = strstr($arq['name'], '.');
$count = strlen($domain);
$ext = substr($arq['name'], -$count);
$name_arq = $cod."-".$desc.$ext;

move_uploaded_file($arq['tmp_name'], $dir.$OB."/".$Num_1."/".$name_arq);

#PDF 

$arq_pdf = $_FILES['file_pdf'];

$domain_pdf = strstr($arq_pdf['name'], '.');
$count_pdf = strlen($domain_pdf);
$ext_pdf = substr($arq_pdf['name'], -$count_pdf);
$name_arq_pdf = $cod."-".$desc.$ext_pdf;

move_uploaded_file($arq_pdf['tmp_name'], $dir.$OB."/".$Num_1."/".$name_arq_pdf);

$sql_p = "INSERT INTO projetos_pdf (nome, descricao, data, status, arq, user, num_rev) VALUES ('".$cod."', '".$desc."', '".$date."', '".$status."', '".$name_arq_pdf."', '".$usuario."','0')";

$sql = "INSERT INTO projetos (nome, descricao, data, status, arq, user, num_rev) VALUES ('".$cod."', '".$desc."', '".$date."', '".$status."', '".$name_arq."', '".$usuario."','0')";



if ($_FILES['file_pdf']['size'] > 0) {
	if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql_p)) {
		$_SESSION['create_project'] = "Projeto criado com sucesso!";
		header ("Location: ../dashboard.php");
	}
} else {
	if (mysqli_query($conn, $sql)) {
		$_SESSION['create_project'] = "Projeto criado com sucesso!";
		header ("Location: ../dashboard.php");
	}
}
?>
