<?php
session_start();
$date = date('Y-m-d');
$status = "----";
$diretorio = filter_input(INPUT_POST, 'diretorio', FILTER_SANITIZE_STRING);
$dir_re = str_replace('\\', '/', $diretorio)."/";
$dir = dir($dir_re);

$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";

$conn = mysqli_connect ($server, $user, $password, $dbname);

while($arq = $dir -> read()) {
	$explode = explode(".", $arq);
	$ext = $explode[1];

	if ($ext === "pdf") {
		$tabel = "projetos_pdf";
	} else {
		$tabel = "projetos";
	}

	$cod_desc = substr($arq, 0, -4);
	@list($ob, $num1, $num2, $num3, $num4, $nom, $rev, $desc) = explode("-", $cod_desc);
	$nome = $ob."-".$num1."-".$num2."-".$num3."-".$num4."-".$nom."-".$rev;
	
	if (!empty($ob)) {
		$sql = "INSERT INTO ".$tabel." (nome, descricao, data, status, arq, user, num_rev) VALUES ('".$nome."', '".$desc."', '".$date."', '".$status."', '".$arq."', 'admin','".$rev."')";
		mysqli_query($conn, $sql);
	}
}
$dir -> close();

if ($conn == true) {
	$_SESSION['create_project'] = "Projetos cadastrados com sucesso!";
	header ("Location: ../../dashboard.php");
} else {
	$_SESSION['create_project'] = "Ocorreu um erro no cadastro de projetos!";
	header ("Location: ../../dashboard.php");
}
?>