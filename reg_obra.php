<?php session_start(); ?>
<?php if ($_SESSION['cre_o'] != 0) { ?>
	<?php
	$title = "Registrar Obra";
	include 'title_page.php';
	?>
	<?php require 'security.php' ?>
	<?php include 'navbar.php'; ?>

	<?php require 'header.php' ?>
	<div class="full" style="overflow: auto; height: 89%; padding-top: 30px;">
		<div class="container" style="padding-bottom: 150px;">
			<div class="col-md-auto">
				<div class="row">
					<div class="col-sm">
						<form id="form1" method="post" action="include/reg_obra_db.php">
							<div class="card bg-light mb-3" style="width: 59rem; margin-left: 70px;">
								<div class="card-header">Registrar Obra</div>
								<div class="card-body">
									<div class="form-group col-md">
										<label>Nome da Obra:</label>
										<input required type="text" name="OB"  class="form-control" placeholder="Sigla da Obra" maxlength="10" size="14" style="margin-top:5px;" autocomplete="off"/>
									</div>
									<hr class="my-4">
									<center>
										<div class="row">
											<div class="form-group col">
												<input type="button" style="width:95px;" class="btn btn-info btn-sm" onclick="duplicarCampos();" value="Adicionar">
												<input type="button"  style="width:95px;" class="btn btn-secondary btn-sm " onclick="removerCampos(this);" value="Remover">
												<ul class="list-group list-group-flush">
													<li id="ortipo1">
														<input placeholder="Tipo de Documento" type="text" class="form-control" id="tipo1" name="TA[]"  maxlength="14" size="14" style="margin-top:5px; width: 200px;" autocomplete="off"/>
													</li>
													<div class="form-group" id="destipo1"></div>
												</ul>
											</div>
											<div class="form-group col ">
												<input type="button" style="width:95px;" class="btn btn-info btn-sm" onclick="duplicarCampos2();" value="Adicionar">
												<input type="button"  style="width:95px;" class="btn btn-secondary btn-sm " onclick="removerCampos2(this);" value="Remover">
												<ul class="list-group list-group-flush">
													<li id="ortipo2">
														<input placeholder="Etapa do Projeto" type="text" class="form-control" id="tipo1" name="TB[]"  maxlength="14" size="14" style="margin-top:5px; width: 200px;" autocomplete="off"/>
													</li>
													<div class="form-group" id="destipo2"></div>
												</ul>
											</div>
											<div class="form-group col">
												<input type="button" style="width:95px;" class="btn btn-info btn-sm" onclick="duplicarCampos3();" value="Adicionar">
												<input type="button"  style="width:95px;" class="btn btn-secondary btn-sm " onclick="removerCampos3(this);" value="Remover">
												<ul class="list-group list-group-flush">
													<li id="ortipo3">
														<input placeholder="Frente de Serviço" type="text" class="form-control" id="tipo1" name="TC[]"  maxlength="14" size="14" style="margin-top:5px; width: 200px;" autocomplete="off"/>
													</li>
													<div class="form-group" id="destipo3"></div>
												</ul>
											</div>
											<div class="form-group col">
												<input type="button" style="width:95px;" class="btn btn-info btn-sm" onclick="duplicarCampos4();" value="Adicionar">
												<input type="button"  style="width:95px;" class="btn btn-secondary btn-sm " onclick="removerCampos4(this);" value="Remover">
												<ul class="list-group list-group-flush">
													<li id="ortipo4">
														<input placeholder="Tipo de Serviço" type="text" class="form-control" id="tipo1" name="TD[]"  maxlength="14" size="14" style="margin-top:5px; width: 200px;" autocomplete="off"/>
													</li>
													<div class="form-group" id="destipo4"></div>
												</ul>
											</div>
										</div>
										<button type="submit" class="btn btn-info mb-2 float-right">Registrar Obra</button>
									</center>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php' ?>
	<?php } else { header("Location: dashboard.php"); } ?>