<?php session_start(); ?>
<?php if ($_SESSION['cre_p'] != 0) { ?>
<?php require 'header.php'; ?>
<?php include 'include/create_project.php'; ?>
<div>
    <br>
    <div class="container">
        <div class="col-md-auto">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                    <form method="post" action="create_project_2.php">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">Criar Projeto</div>
                            <div class="card-body">
                                <label for="">Selecione a obra:</label>
                                <select name="ob" class="form-control form-control-sm" required>
                                    <option value="" disabled selected >Selecione...</option>

                                    <?php while($prod = mysqli_fetch_array($query_n)) { ?>
                                    <option type="text" value="<?php echo $prod['name'] ?>"><?php echo $prod['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-info mb-2 float-right">Próximo</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php' ?>
<?php } else {header("Location: dashboard.php"); }?>




















