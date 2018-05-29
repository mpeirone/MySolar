<?php
session_start();
if(!isset($_SESSION['Id']))
    header("location: login.php");
else if(!isset($_GET["Id"]))
    header("location: lettura.php");
else
    {
        $con=new mysqli("localhost","root","","solardb");
        if($con->connect_errno)
            header("location: index.php");
        $utente=$_SESSION['Id'];
        $IdDato=$_GET["Id"];
        $sql = "select * from dati where `IdUtente`=$utente and `IdDato`=$IdDato";
        $rs = $con->query($sql);
        if (!$rs)
            header("location: index.php");
        if($rs->num_rows==0)
            header("location: index.php");
        $record=$rs->fetch_assoc();
    }

?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Solar - Nuova lettura</title>
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../Pages/index.html">My solar</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pagina Principale">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-chart-line"></i>
                    <span class="nav-link-text">Pagina Principale</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nuova Lettura" style="background-color: #212529">
                <a class="nav-link" href="#">
                    <i class="fas fa-pencil-alt"></i>
                    <span class="nav-link-text">Nuova Lettura</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dati Mensili">
                <a class="nav-link" href="dati.php">
                    <i class="fas fa-print"></i>
                    <span class="nav-link-text">Dati Mensili</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Confronta Mesi">
                <a class="nav-link" href="confronta.php">
                    <i class="fas fa-info"></i>
                    <span class="nav-link-text">Confronta Mesi</span>
                </a>
            </li>
            <!--menu laterale-->
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">


            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-sign-out-alt"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">
        <?php
        echo("<a id='IdDato' style='display:none;'>".$record['IdDato']."</a>");
        ?>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-area-chart"></i>Contatore Privato</div>
            <form role="form">
                <div class="form-group">
                    <?php
                    echo("<label>Data Lettura</label>");
                    echo("<input type='date' id='DataLettura'  value=".$record['Data']." class='form-control'>");
                    echo("<label>A1</label>");
                    echo("<input type='number' name='selection' id='numPrivA1' min='0' value=".$record['PrivA1']." class='form-control'>");
                    echo("<label>A2</label>");
                    echo("<input type='number' name='selection' id='numPrivA2' min='0' value=".$record['PrivA2']." class='form-control'>");
                    echo("<label>A3</label>");
                    echo("<input type='number' name='selection' id='numPrivA3' min='0' value=".$record['PrivA3']." class='form-control'>");
                    echo("<label>-A1</label>");
                    echo("<input type='number' name='selection' id='numPriv-A1' min='0' value=".$record['Priv-A1']." class='form-control'>");
                    echo("<label>-A2</label>");
                    echo("<input type='number' name='selection' id='numPriv-A2' min='0' value=".$record['Priv-A2']." class='form-control'>");
                    echo("<label>-A3</label>");
                    echo("<input type='number' name='selection' id='numPriv-A3' min='0' value=".$record['Priv-A3']." class='form-control'>");
                    ?>
                </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-area-chart"></i> Contatore GSE</div>
            <form role="form">
                <div class="form-group">
                    <?php
                    echo("<label>A1</label>");
                    echo("<input type=number name=selection id=numGseA1 min=0 value=".$record['GseA1']." class=form-control>");
                    echo("<label>A2</label>");
                    echo("<input type=number name=selection id=numGseA2 min=0 value=".$record['GseA2']." class=form-control>");
                    echo("<label>A3</label>");
                    echo("<input type=number name=selection id=numGseA3 min=0 value=".$record['GseA3']." class=form-control>");
                    echo("<label>-A1</label>");
                    echo("<input type=number name=selection id=numGse-A1 min=0 value=".$record['Gse-A1']." class=form-control>");
                    echo("<label>-A2</label>");
                    echo("<input type=number name=selection id=numGse-A2 min=0 value=".$record['Gse-A2']." class=form-control>");
                    echo("<label>-A3</label>");
                    echo("<input type=number name=selection id=numGse-A3 min=0 value=".$record['Gse-A3']." class=form-control>");
                    ?>
                </div>
            </form>
            <label id="lblerrore"></label>
            <a class="btn btn-primary btn-block" id="btnLettura" style="color:white">Modifica dati</a>
            </form>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Realizzato da Peirone Matteo & Josef Costamagna</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Vuoi rimanere?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Clicca su "Logout" per uscire</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annulla</button>
                    <a class="btn btn-primary" href="../PHP/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
    <script src="../js/modifica.js"></script>
    <script src="../js/libreria.js"></script>
</div>
</body>

</html>