<?php session_start(); ?>
<?php if ($_SESSION['rel_u'] != 0) {  ?>
	<?php
	$title = "Relatório";
	include 'title_page.php';
	?>
	<?php require 'security.php' ?>
	<?php require 'header.php' ?>
	<?php include 'navbar.php'; ?>
	<?php include 'alert_project.php'; ?>
	<?php
	$server = "localhost";
	$user = "belom742_omilen";
	$password = " ";
	$dbname = "root";

	$conn = mysqli_connect ($server, $user, $password, $dbname);
	$query_st = mysqli_query($conn, "SELECT id, name FROM status");
	?>
	<br>
	<div class="container">
		<div class="col-md-auto">
			<div class="row">
				<div class="col-sm">
					<div class="card bg-light mb-3">
						<div class="card-header">Gerar Relatório</div>
						<div class="card-body">
							<nav class="navbar navbar-light bg-light">
								<div class="form-inline">
									<form method="GET" action="include/relatorio_db.php">
										<input class="form-control mr-sm-2" style="width:250px; height: 40px;" type="search" name="pesquisar" placeholder="Código" aria-label="Search">
										<input class="form-control mr-sm-2" style="width:175px;" type="date" name="pesq_data" placeholder="data" aria-label="Search">
										<?php 
										if ($_SESSION['rel_u'] != 0) {
											echo "<input class='form-control mr-sm-2' style='width:120px; height: 40px;' type='search' name='pesq_user' placeholder='Usuário' aria-label='Search'>";
										} else {
											echo "<input class='form-control mr-sm-2' style='width:120px; display:none;' type='search' name='pesq_user' placeholder='Usuário' aria-label='Search'>";
										}
										?>
										<select id="obra" name="pesq_status" style="height: 40px;" class="form-control">
											<option value="">Todos</option>

											<?php while($prod = mysqli_fetch_array($query_st)) { ?>
												<option type="text" name="pesq_status" id="nom4" value="<?php echo $prod['name'] ?>"><?php echo $prod['name'] ?></option>
											<?php } ?>
										</select>&nbsp;&nbsp;
										<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Gerar Relatório</button>&nbsp;&nbsp;
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php include 'footer.php' ?>
			<?php } else {header("Location:dashboard.php");} ?>