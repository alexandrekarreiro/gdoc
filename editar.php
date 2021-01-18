<?php session_start(); ?>
<?php include 'include/editar.php'; ?>
<script>
	$(document).ready(function(){
		$("#<?php echo $res['status']; ?>").css("display", "none");
	});
</script>
<br>
<div class="container">
	<div class="col-md-auto">
		<div class="row">
			<div class="col-sm">
				<form method="post" enctype="multipart/form-data" action="include/editar_db.php" >
					<div class="card bg-light mb-3" style="width: 60rem; margin: 0 auto;">
						<div class="card-header">Editar - <b><?php echo "$cod" ?></b></div>
						<div class="card-body">
							<div class="form-group">
								<input style="display:none;" type="text" name="data" value="<?php echo "$data" ; ?>">
								<input style="display:none;" type="text" name="cod" value="<?php echo "$cod" ; ?>">
								<input style="display:none;" type="text" name="usuario" value="<?php echo "$usuario" ; ?>">
								<label for="exampleFormControlTextarea1">Revisão:</label>
								<input class="form-control mr-sm-2" type="text" name="rev" value="<?php echo "$rev[6]" ; ?>"><br>
								<label for="exampleFormControlTextarea1">Descrição:</label><label for="exampleFormControlTextarea1">&nbsp;Max. 100 caracteres.</label>
								<textarea maxlength="100" class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3"><?php echo $res['descricao']; ?></textarea>
							</div>
							<div class="form-group">
								<select id="status" name="status" class="form-control">
									<option value="<?php echo $res['status']; ?>"><?php echo $res['status']; ?></option>
									<?php while($prod = mysqli_fetch_array($query_s)) { ?>

										<option type="text" id="<?php echo $prod['name']; ?>" value="<?php echo $prod['name']; ?>"><?php echo $prod['name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<button type="submit" class="btn btn-info mb-2 float-right">Confirmar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php require 'footer.php' ?>