<?php 
$title = "Criar Projeto";
include 'title_page.php';
include 'header.php'; 
require 'security.php';
include 'navbar.php';  

$usuario = $_SESSION['user'];
$OB = filter_input(INPUT_POST, 'Nom', FILTER_SANITIZE_STRING);
$nom1 = filter_input(INPUT_POST, 'Nom1', FILTER_SANITIZE_STRING);
$nom2 = filter_input(INPUT_POST, 'Nom2', FILTER_SANITIZE_STRING);
$nom3 = filter_input(INPUT_POST, 'Nom3', FILTER_SANITIZE_STRING);
$nom4 = filter_input(INPUT_POST, 'Nom4', FILTER_SANITIZE_STRING);
$nom = $OB."-".$nom1."-".$nom2."-".$nom3."-".$nom4."-";

$desc = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$data = date('Y-m-d');
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";

$conn = mysqli_connect ($server, $user, $password, $dbname);

$sql =  "SELECT * FROM projetos WHERE nome LIKE '%".$nom."%' ORDER BY nome DESC LIMIT 1";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query)== 0){
    $res_3 = $nom."001-00";
}
else {
    while ($resultado = mysqli_fetch_array($query)){
        $res = explode("-", $resultado['nome']);
        $res_1 = $res[5] + 1;
        $res_2 = str_pad($res_1, 3, '0', STR_PAD_LEFT);
        $res_3 = $nom.$res_2."-00";
    }
}

?>