<?php session_start(); ?>
<?php
$title = "Criar / Substituir";
include 'title_page.php';
?>
<?php require 'security.php' ?>
<?php require 'header.php' ?>
<?php include 'navbar.php'; ?>
<script src="assets/js/jquery-3.3.1.min.js"></script>
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
				<form method="post" action="include/subs_arq_db.php" enctype="multipart/form-data">
					<div class="card bg-light mb-3" style="width: 40rem; margin: 0 auto;">
						<div class="card-header">Criar / Substituir</div>
						<div class="card-body ">
							<input type="text" name="cod" style="display: none;" value="<?php echo $_GET['cod']; ?>">
							<label for="">Projeto: <b><?php echo $_GET['cod']; ?></b></label>
							<br>
							<label for="exampleFormControlTextarea1">Selecione o arquivo DWG/DOC: </label>
							<div class="custom-file">
								<input type="file" name="file" class="custom-file-input dwg" id="customFile">
								<label id="label-arq" class="custom-file-label" for="customFile">Selecione o arquivo</label>
							</div>
							<label for="exampleFormControlTextarea1">Selecione o arquivo PDF: </label>
							<div class="custom-file">
								<input type="file" name="file_pdf" value="" class="custom-file-input pdf" id="customFile" accept=".pdf">
								<label id="label-arq-pdf" class="custom-file-label" for="customFile">Selecione o arquivo</label>
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