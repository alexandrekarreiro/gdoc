<?php 
session_start();
ob_start();
$title = "Registrar Usuário";
include 'title_page.php';
require 'header.php';
?>
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
                         Registrar Usuário
                     </div>
                     <div class="card-body" style=" padding-bottom: 50px;">
                        <p id="profile-name" class="profile-name-card"></p>
                        <br>
                        <form method="post" action="include/register_db.php">
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div style="width: 80px;" class="input-group-text">Usuário</div>
                          </div>
                          <input type="text" class="form-control" name="user" id="inlineFormInputGroup">
                      </div>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div style="width: 80px;" class="input-group-text">Senha</div>
                      </div>
                      <input type="password" name="pass" class="form-control" id="inlineFormInputGroup">
                  </div>
                  <div class="form-check" style="text-align: left;">
                    <input class="form-check-input" name="cre_p" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                      Criar Projeto
                  </label>
                  <br>
                  <input class="form-check-input" name="ed_p" type="checkbox" id="gridCheck2">
                    <label class="form-check-label" for="gridCheck2">
                      Editar Projeto
                  </label>
                  <br>
                  <input class="form-check-input" name="rev_p" type="checkbox" id="gridCheck3">
                    <label class="form-check-label" for="gridCheck3">
                      Revisar Projeto
                  </label>
                  <br>
                  <input class="form-check-input" name="rel" type="checkbox" id="gridCheck4">
                    <label class="form-check-label" for="gridCheck4">
                      Gerar Relatório
                  </label>
                  <br>
                  <input class="form-check-input" name="reg_u" type="checkbox" id="gridCheck4">
                    <label class="form-check-label" for="gridCheck4">
                      Registrar Usuários
                  </label>
                  <br>
                  <input class="form-check-input" name="rel_u" type="checkbox" id="gridCheck5">
                    <label class="form-check-label" for="gridCheck5">
                      Relatório de Usuários 
                  </label>
                  <br>
                  <input class="form-check-input" name="cre_o" type="checkbox" id="gridCheck6">
                    <label class="form-check-label" for="gridCheck6">
                      Criar Obras
                  </label>
              </div>
              <br>
              <input type="submit" name="register" value="Registrar Usuário" class="form-control btn btn-info"></input>
          </div>
      </form>
  </div>
</div>
</div>
</div>
</center>
<?php require 'footer.php' ?>
<?php } else {header("Location: dashboard.php"); } ?>

