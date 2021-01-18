<?php session_start(); ?>
<?php include 'include/revisar.php'; ?>
<script type="text/javascript">
	$(document).ready(function(){
            $('.dwg').change(function(e){
                var fileName = e.target.files[0].name;
                $('#label-arq').html(fileName);
            });
            $('.pdf').change(function(e){
                var fileName = e.target.files[0].name;
                $('#label-arq-pdf').html(fileName);
            });
        });
</script>
<br>
<div class="container">
	<div class="col-md-auto">
		<div class="row">
			<div class="col-sm">
				<form method="post" enctype="multipart/form-data" action="include/revisar_db.php" >
					<div class="card bg-light mb-3" style="width: 60rem; margin: 0 auto;">
						<div class="card-header">Revisão - <b><?php echo "$cod_sub"."$new_cod"; ?></b></div>
						<div class="card-body">
							<div class="form-group">
								<input style="display:none;" type="text" name="cod-back" value="<?php echo "$cod" ; ?>">
								<input style="display:none;" type="text" name="data" value="<?php echo "$data" ; ?>">
								<input style="display:none;" type="text" name="cod" value="<?php echo "$cod_sub"."$new_cod" ; ?>">
								<input style="display:none;" type="text" name="usuario" value="<?php echo "$usuario" ; ?>">
								<label for="exampleFormControlTextarea1">Descrição:</label><label for="exampleFormControlTextarea1">&nbsp;Max. 80 caracteres.</label>
								<textarea class="form-control" maxlength="100" name="descricao" id="exampleFormControlTextarea1" rows="3"><?php echo $res['descricao']; ?></textarea>
							</div>
							<div class="form-group">
								<select id="obra" name="status" class="form-control" required>
									<option disabled selected value="">Selecione..</option>
									<?php while($prod = mysqli_fetch_array($query_s)) { ?>
										<option type="text" id="<?php echo $prod['name']; ?>" value="<?php echo $prod['name']; ?>"><?php echo $prod['name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<label for="exampleFormControlTextarea1">Selecione o arquivo de revisão DWG/DOC: </label>
							<div class="custom-file">
								<input type="file" name="file" class="custom-file-input dwg" id="customFile" accept=".dwg, .docx, .xlsm, .rvt" required>
								<label id="label-arq" class="custom-file-label" for="customFile">Arquivo...</label>
							</div>
							<label for="exampleFormControlTextarea1">Selecione o arquivo de revisão PDF: </label>
							<div class="custom-file">
								<input type="file" name="file_pdf" class="custom-file-input pdf" id="customFile" accept=".pdf">
								<label id="label-arq-pdf" class="custom-file-label" for="customFile">Arquivo...</label>
							</div>
							<br>
							<br>
							<button type="submit" class="btn btn-info mb-2 float-right">Confirmar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php require 'footer.php' ?>