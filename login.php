<?php session_start(); ?>
<?php require 'header.php' ?>
<hr size="100%" style="margin-top: 1px;">
<center>
    <br>
    <div class="container" style="padding-top: 100px;">
        <div class="p-3 card bg-back" style="background: #3f639e; width:40%;">
                <?php if (isset($_SESSION['msg'])) {
                    echo "<div class='alert alert-success' role='alert'>";
                    echo $_SESSION['msg'];
                    echo "</div>";
                    unset ($_SESSION['msg']);
                }
                ?>
            <div class="card-body" style="padding-top: 40px; padding-bottom: 50px;">
                <img style="height:50px; width:auto; margin-left: -15px;" src="images/logo.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <br>
                <form method="post" action="validate.php">
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
          <br>
          <input type="submit" name="login" value="Entrar" class="form-control btn btn-info"></input>
      </div>
  </form>
</div>
<!-- /form -->
</div><!-- /card-container -->
</div>

</center>
<?php require 'footer.php' ?>