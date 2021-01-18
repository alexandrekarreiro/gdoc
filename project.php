<?php session_start(); ?>
<?php include 'include/project.php'; ?>
<br>
<div class="container">
	<div class="col-md-auto">
		<div class="row">
			<div class="col-sm">
				<form method="get" action="editar.php">
					<div class="card bg-light mb-3" style="width: 60rem; margin: 0 auto;">
						<div class="card-header">Projeto - <b><?php echo "$cod"; ?></b><a class="float-right">Data: <b><?php echo (new DateTime($res['data']))->format('d/m/Y') ?></b></a></div>
						<input type="text" name="cod" value="<?php echo "$cod" ?>" style="display: none;">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Criado por: <b><?php echo $res['user']; ?></b></label><br>
								<hr class="my-1">
								<label for="exampleFormControlTextarea1">Descrição:</label>
								<textarea class="form-control" readonly="true" name="descricao" id="exampleFormControlTextarea1" rows="3"><?php echo $res['descricao']; ?></textarea>
							</div>
							<div class="form-group">
								<select id="obra" readonly="true" name="status" class="form-control">
									<option><?php echo $res['status'] ?></option>

									<?php while($prod = mysqli_fetch_array($query_4)) { ?>
										<option type="text"  id="<?php echo $res['status'] ?>" value="<?php echo $prod['Num'] ?>"><?php echo $prod['Num'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="input-group">
								<div class="input-group-prepend">
								</div>
								<input type="text" class="form-control" readonly="true" id="validationDefaultUsername" value="<?php echo $res['arq']; ?>" aria-describedby="inputGroupPrepend2" required>
							</div>
							<div>
								<br>
								<?php if ($_SESSION['ed_p'] != 0) { ?>
									<button type="submit" class="btn btn-secondary mb-2 float-left" style="margin-right: 10px;">Editar</button>
								<?php } ?>
							</form>
							<form method="GET" action="subs_arq.php" class="">
								<input type="text" name="cod" value="<?php echo $_GET['cod']; ?>" style="display: none;">
								<input type="submit" class="btn btn-secondary mb-2 float-left"value="Criar / Substituir">
							</form>
							<?php if ($_SESSION['rev_p'] != 0) { ?>
								<form method="GET" action="revisar.php" class="">
									<input type="text" name="cod" value="<?php echo $_GET['cod']; ?>" style="display: none;">
									<input type="submit" class="btn btn-info mb-2 float-right"value="Revisar">
								</form>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
<?php require 'footer.php' ?>
