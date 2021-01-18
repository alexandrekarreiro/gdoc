<?php
session_start();
$cod = filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_STRING);
$desc = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$date = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$rev_post = filter_input(INPUT_POST, 'rev', FILTER_SANITIZE_STRING);
$rev = str_pad($rev_post, 2, '0', STR_PAD_LEFT);

list($OB, $N1, $N2, $N3, $N4, $N5, $N6) = explode("-", $cod);
$newcod_array = array($OB, $N1, $N2, $N3, $N4, $N5, $rev);
$newcod = implode("-", $newcod_array);

$dir = "upload/";

$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";

$conn = mysqli_connect ($server, $user, $password, $dbname);
$sql =  "SELECT * FROM projetos WHERE nome LIKE '%".$cod."%' ORDER BY nome DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$res = mysqli_fetch_array($query);

$domain = strstr($res['arq'], '.');
$count = strlen($domain);
$ext = substr($res['arq'], -$count);

$name_arq = $newcod."-".$desc.$ext;
rename($dir.$OB."/".$N1."/".$res['arq'], $dir.$OB."/".$N1."/".$name_arq);
$sql = "UPDATE projetos SET nome='$newcod', descricao='$desc', data='$date', status='$status', arq='$name_arq', num_rev='$rev' WHERE nome='$cod'";

#PDF

$sql_pdf =  "SELECT * FROM projetos_pdf WHERE nome LIKE '%".$cod."%' ORDER BY nome DESC LIMIT 1";

if ($sql_pdf) {
	$query_pdf = mysqli_query($conn, $sql_pdf);
	$res_pdf = mysqli_fetch_array($query_pdf);
	$domain_p = strstr($res_pdf['arq'], '.');
	$count_p = strlen($domain_p);
	$ext_p = substr($res_pdf['arq'], -$count_p);

	$name_arq_pdf = $newcod."-".$desc.$ext_p;
	rename($dir.$OB."/".$N1."/".$res_pdf['arq'], $dir.$OB."/".$N1."/".$name_arq_pdf);
	$sql_p = "UPDATE projetos_pdf SET nome='$newcod', descricao='$desc', data='$date', status='$status', arq='$name_arq_pdf', num_rev='$rev' WHERE nome='$cod'";

	if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql_p)) {
		$_SESSION['create_project'] = "Projeto editado com sucesso!";
		header("Location: ../dashboard.php");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	} 

} else {

	if (mysqli_query($conn, $sql)) {
		$_SESSION['create_project'] = "Projeto editado com sucesso!";
		header("Location: ../dashboard.php");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	} 
}

?>
