<?php session_start(); ?>
<?php
$title = "Dashboard";
include 'title_page.php';
?>
<?php require 'security.php' ?>
<?php require 'header.php' ?>
<?php include 'navbar.php'; ?>
<?php include 'alert_project.php'; ?>
<?php include 'include/dashboard.php' ?>
<?php if (!empty($_SESSION['create_project'])) { ?>
<script>
    $('#exampleModal').modal(focus);
</script>
<?php unset($_SESSION['create_project']); }?>

<script type="text/javascript">
    function submitform() {
        document.Nom.submit();
    }
    $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({'padding-right':scrollWidth});
  }).resize();
</script>

<nav class="navbar navbar-light bg-light">
    <div class="form-inline">
        <h5><span style="margin-right: 20px; margin-top: 6px;" class="badge bg-back text-white">DWG/DOC</span></h5>
        <form method="GET" action="">
            <input class="form-control mr-sm-2" style="max-width:300px; min-width: 120px; width: auto; height: 38px;" type="search" name="pesquisar" placeholder="Código" aria-label="Search">
            <input class="form-control mr-sm-2" style="width:180px; height: 38px;" type="date" name="pesq_data" placeholder="data" aria-label="Search">
            <?php 
            if ($_SESSION['rel_u'] != 0) {
                echo "<input class='form-control mr-sm-2' style='max-width: 180px; min-width: 90px; width:auto; height:38px;' type='search' name='pesq_user' placeholder='Usuário' aria-label='Search'>";
            }
            ?>
            <select id="obra" style="height: 38px;" name="pesq_status" class="form-control">
                <option disabled selected>Status</option>

                <?php while($prod = mysqli_fetch_array($query_st)) { ?>
                    <option type="text" name="pesq_status" id="nom4" value="<?php echo $prod['name'] ?>"><?php echo $prod['name'] ?></option>
                <?php } ?>
            </select>
            <button class="btn btn-outline-success my-2 my-sm-0" style="margin-left: 4px;" type="submit">Buscar</button>&nbsp;&nbsp;
        </form>
        <form class="float-left" method="GET" action="">
            <input style="display: none;" type="search" name="pesquisar">
            <input style="display: none;" type="date" name="pesq_data">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Todos os projetos</button>
        </form>&nbsp;&nbsp;
        <?php if ($_SESSION['rel_u'] != 0) { ?>
            <a class="btn btn-outline-secondary" href="relatorio.php" role="button">Criar Relatório</a>&nbsp;&nbsp;
        <?php } ?>
        <a class="btn btn-primary" href="dashboard_pdf.php" role="button">Documentos PDF</a>
    </div>
    <?php if ($_SESSION['cre_p'] != 0) { ?>
        <a class="btn btn-info" href="create_project.php" role="button">Criar Projeto</a>
    <?php } ?>
</nav>

<div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th style="color:white;">Documento</th>
          <th style="color:white;">Descrição</th>
          <th style="color:white;">Data</th>
          <th style="color:white;">Status</th>
          <th style="color:white;">Projetista</th>
          <th style="color:white;">Ações</th>
      </tr>
  </thead>
</table>
</div>

<div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>

        <?php
        if(mysqli_num_rows($resultado_p)!= 0){
            while($rows_p = mysqli_fetch_array($resultado_p)){
                $cods = explode("-", $rows_p['nome']);
                $folder = "C:/xampp/htdocs/Project/upload/";
                $dir = $folder.$cods[0]."/".$cods[1]."/";
                $arq = $dir.$rows_p['arq'];
                ?>
                <form method="GET" action="project.php">
                    <tr>
                        <td scope="row"><div style="width: 100%;"><input style=" font-size:14px;font-weight: 200; background:transparent; font-weight:bold; width: 100%;height:auto; border:0px;" readonly="true" name="cod" value="<?php echo $rows_p['nome']; ?>"></div></td>
                        <td><div style="width: 100%; max-width: 40ch; white-space: nowrap; overflow: hidden;"><?php echo substr($rows_p['descricao'],0,40); ?>...</div></td>
                        <td>
                            <div style="width: 100%;">
                                <?php echo (new DateTime($rows_p['data']))->format('d/m/Y'); ?>
                            </div>
                        </td>
                        <td><div style="width: 100%;"><b><?php echo $rows_p['status']; ?></b></div></td>
                        <td><?php echo $rows_p['user']; ?></td>
                        <td>
                            <input style="text-overflow: ellipsis;" class="btn btn-info btn-sm" type="submit" value="Detalhes">
                            <button onclick="var arquivo = '<?php echo $arq; ?>';const shell = require('electron').shell;shell.openItem(arquivo);" type="button" class="btn btn-success btn-sm ">Abrir</button>
                        </td>
                    </tr>
                </form>
                <?php
            }
        } else {
            echo "<tr><td style='border:0px'>Nenhum resultado encontrado...</td></tr>";
        }
        ?>

    </tbody>
</table>
<?php include 'footer.php' ?>