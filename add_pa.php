<?php session_start(); ?>
<?php
$title = "Cadastrar Projetos";
include 'title_page.php';
?>
<?php require 'security.php' ?>
<?php require 'header.php' ?>
<?php include 'navbar.php'; ?>
<nav class="navbar navbar-light bg-light">
	<div class="form-inline">
		<form method="POST" action="include/add_pa_db.php">
			<h3><span style="margin-right: 20px; margin-top: 5px;">Cadastrar Projetos</span></h3>
			<input class="form-control mr-sm-2" style="width:300px; height: 40px;" type="search" name="diretorio" placeholder="Digite o diretório da obra" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Enviar</button>
		</form>
	</div>
</nav>
<?php require 'footer.php' ?>