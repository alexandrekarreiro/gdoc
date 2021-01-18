<?php session_start(); ?>
<?php if ($_SESSION['cre_p'] != 0) { ?>
<?php include 'include/create_project_2.php'; ?>
<br>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<div class="container">
    <div class="col-md-auto">
        <div class="row">
            <div class="col-sm">
                <form method="post" action="create_project_3.php">
                    <div class="card bg-light mb-3" style="width: 60rem; margin: 0 auto;">
                        <div class="card-header">Criar Projeto</div>
                        <div class="card-body">
                            <label for="">Selecione o tipo de projeto:</label>
                            <ul>
                                <li>
                                    <select name="Nom" class="form-control" readonly="true">
                                        <option value="<?php echo "$OB"; ?>"><?php echo "$OB"; ?></option>
                                    </select>
                                </li>
                                <li>
                                    <select id="obra" name="Nom1" class="form-control" required>
                                        <option disabled selected value="">Selecione...</option>

                                        <?php while($prod = mysqli_fetch_array($query_1)) { ?>
                                        <option type="text" id="nom1" value="<?php echo $prod['Num'] ?>"><?php echo $prod['Num'] ?></option>
                                        <?php } ?>
                                    </select>
                                </li>
                                <li>
                                    <select id="obra" name="Nom2" class="form-control" required>
                                        <option disabled selected value="">Selecione...</option>

                                        <?php while($prod = mysqli_fetch_array($query_2)) { ?>
                                        <option type="text" id="nom2" value="<?php echo $prod['Num'] ?>"><?php echo $prod['Num'] ?></option>
                                        <?php } ?>
                                    </select>
                                </li>
                                <li>
                                    <select id="obra" name="Nom3" class="form-control" required> 
                                        <option disabled selected value="">Selecione...</option>

                                        <?php while($prod = mysqli_fetch_array($query_3)) { ?>
                                        <option type="text" id="nom3" value="<?php echo $prod['Num'] ?>"><?php echo $prod['Num'] ?></option>
                                        <?php } ?>
                                    </select>
                                </li>
                                <li>
                                    <select id="obra" name="Nom4" class="form-control" required>
                                        <option disabled selected value="">Selecione...</option>

                                        <?php while($prod = mysqli_fetch_array($query_4)) { ?>
                                        <option type="text" id="nom4" value="<?php echo $prod['Num'] ?>"><?php echo $prod['Num'] ?></option>
                                        <?php } ?>
                                    </select>
                                </li>
                            </ul>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descrição:</label>
                                <textarea class="form-control" maxlength="100" placeholder="Max. 100 caracteres" name="descricao" id="exampleFormControlTextarea1" rows="3" autofocus></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Status: </label>
                                <select id="obra" name="status" class="form-control" required>
                                    <option disabled selected value="">Selecione...</option>

                                    <?php while($prod = mysqli_fetch_array($query_st)) { ?>
                                    <option type="text" id="nom4" value="<?php echo $prod['name'] ?>"><?php echo $prod['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info mb-2 float-right">Criar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
<?php } else {header("Location: dashboard.php"); }?>





























