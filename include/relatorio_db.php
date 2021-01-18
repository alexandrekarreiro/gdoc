<?php
$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";

$conn = mysqli_connect ($server, $user, $password, $dbname);

$pesquisar = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '';
$pesq_data = isset($_GET['pesq_data']) ? $_GET['pesq_data'] : '';
$pesq_user = isset($_GET['pesq_user']) ? $_GET['pesq_user'] : '';
$pesq_status = isset($_GET['pesq_status']) ? $_GET['pesq_status'] : '';
$result = "SELECT * FROM projetos WHERE nome LIKE '%$pesquisar%' AND data LIKE '%$pesq_data%' AND user LIKE '%$pesq_user%'  AND status LIKE '%$pesq_status%'ORDER BY nome DESC LIMIT 1000";
$resultado_p = mysqli_query($conn, $result);

$data = date('Y-m-d');

use Dompdf\Dompdf;

require_once '../dompdf/autoload.inc.php';

$html= "<html>";
$html.= "
<style>
#customers {
    font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    font-size:12px;
}

#customers h2 {
    font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
    font-size: 18px;
    text-align: center;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 6px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 6px;
    padding-bottom: 6px;
    text-align: left;
    background-color: #3F639E;
    color: white;
}
.logo {
	padding:2px;
	background: #3F639E;
    width:auto;
    border: 1px solid #ddd;
}

.emissao {
    height:15px;
}
.res {
    font-weight:400;
    font-family:arial;
    text-align: center;
}
</style>
";
$html.= "
<div class='logo'>
<img height='30' src='../images/logo.png'/>
</div>
<div id='customers'>
<h2>Relatório de Documentos</h2>
</div>
<table id='customers' style='background:white;'>
<tr>
<th>Emitido em: ".(new DateTime($data))->format('d/m/Y')."</th>
</tr>
</table>
<table id='customers'>
  <tr>
    <th style='width:300px;'>Documento</th>
    <th style='width:100px;'>Status</th>
    <th style='width:100px;'>Projetista</th>
    <th style='width:100px;'>Data</th>
  </tr>
";
while($rows_p = mysqli_fetch_array($resultado_p)){
	$html.= "<tr>";
	$html.= "<td style='width:300px;'>".$rows_p['nome']."</td>";
	$html.= "<td style='width:100px;'>".$rows_p['status']."</td>";
	$html.= "<td style='width:100px;'>".$rows_p['user']."</td>";
	$html.= "<td style='width:100px;'>".(new DateTime($rows_p['data']))->format('d/m/Y')."</td>";
	$html.= "</tr>";
}
$html.= "</table>";

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();

$dataa = (new DateTime($data))->format('d-m-Y');
$name_file = "Relatório-".$dataa.".pdf";
$dompdf->stream($name_file);
exit();
?>
