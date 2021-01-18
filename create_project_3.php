<?php session_start(); ?>
<?php if ($_SESSION['cre_p'] != 0) { ?>
<?php include 'include/create_project_3.php'; ?>
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
                    <form method="post" action="include/project_db.php" enctype="multipart/form-data">
                        <div class="card bg-light mb-3" style="width: 40rem; margin: 0 auto;">
                            <div class="card-header">Criar Projeto</div>
                            <div class="card-body ">
                                <input style="display:none;" type="text" name="res_3" value="<?php echo $res_3 ; ?>">
                                <input style="display:none;" type="text" name="desc" value="<?php echo $desc ; ?>">
                                <input style="display:none;" type="text" name="status" value="<?php echo $status ; ?>">
                                <input style="display:none;" type="text" name="data" value="<?php echo $data ; ?>">
                                <input style="display:none;" type="text" name="usuario" value="<?php echo $usuario; ?>">
                                <label for="">Projeto: <b><?php echo "$res_3"; ?></b></label>
                                <br>
                                <label for="exampleFormControlTextarea1">Selecione o arquivo DWG/DOC: </label>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input dwg" id="customFile" accept=".dwg, .docx, .xlsm, .rvt" required>
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
    <?php include 'footer.php' ?>
    <?php } else {header("Location: dashboard.php");}?>