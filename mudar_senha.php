<?php 
session_start();
ob_start();
include 'alert_project.php';
$title = "Modificar Senha";
include 'title_page.php';
include 'header.php';
?>
<?php 
if (!empty($_SESSION['create_project'])) { ?>
	<script>
		$('#exampleModal').modal(focus);
	</script>
	<?php unset($_SESSION['create_project']); }?>
	<?php if ($_SESSION['reg_u'] != 0) { ?>
		<?php require 'security.php' ?>
		<?php include 'navbar.php' ?>
		<center>
			<div class="container" style="padding-top: 100px;">
				<div class="col-md-auto">
					<div class="row">
						<div class="col-sm">
							<div class=" card" style="width:40%;">
								<div class="card-header">
									Modificar Senha
								</div>
								<div class="card-body" style=" padding-bottom: 50px;">
									<p id="profile-name" class="profile-name-card"></p>
									<br>
									<form method="post" action="include/mudar_senha_db.php">
										<input type="text" name="user" style="display: none;" value="<?php echo $_SESSION['user']; ?>">
										<div class="input-group mb-2">
											<div class="input-group-prepend">
												<div style="width: 120px;" class="input-group-text">Senha atual</div>
											</div>
											<input type="password" class="form-control" name="pass" id="inlineFormInputGroup">
										</div>
										<div class="input-group mb-2">
											<div class="input-group-prepend">
												<div style="width: 120px;" class="input-group-text">Nova senha</div>
											</div>
											<input type="password" name="newpass" class="form-control" id="inlineFormInputGroup">
										</div>
										<br>
										<input type="submit" name="register" value="Confirmar" class="form-control btn btn-info"></input>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</center>
			<?php require 'footer.php' ?>
		<?php } else {header("Location: dashboard.php"); } ?>

