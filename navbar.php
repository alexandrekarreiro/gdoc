<style>
.navbar-dash a {
  padding-left: 15px;
  padding-right: 15px;
}
</style>
<nav class="nav navbar navbar-dark bg-back">
    <li class="nav-item dropdown">
        <a class="navbar-brand" href="dashboard.php">
            <img src="images/logo.png" width="auto" height="50" alt="">
        </a>
    </li>

    <div class="dropdown show navbar-dash" style="margin-top: 7px; ">
        <a class="text-white" href="dashboard.php" title="Página Inicial"><i style="font-size: 20px;" class="fas fa-home"></i></a>
        <?php if ($_SESSION['reg_u'] != 0) { ?>
            <a class="text-white" href="register.php" title="Registrar usuários"><i style="font-size: 20px;" class="fas fa-user-plus"></i></a>
        <?php } ?>
        <?php if ($_SESSION['cre_o'] != 0) { ?>
            <a class="text-white" href="reg_obra.php" title="Registrar Obra"><i style="font-size: 20px;" class="fas fa-layer-group"></i></a>
        <?php } ?>
        <a class="text-white" href="mudar_senha.php" title="Alterar Senha"><i style="font-size: 20px;" class="fas fa-key"></i></a>
        <a class="text-white" href="exit.php" title="Desconectar"><i style="font-size: 20px;" class="fas fa-sign-out-alt"></i></a>
        <a class="btn btn-primary text-white" role="button" style="margin-top: -7px;"><?php echo "Usuário: ".$usuario; ?></a>
        </div>
    </div>
</nav>

<i class="fa fa-sign-out" aria-hidden="true"></i>





