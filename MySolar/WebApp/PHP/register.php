<?php
session_start();
if(isset($_SESSION['Id']))
    header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Registra un account</div>
        <div class="card-body">
            <form action="register.php"  method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">Nome</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="Nome" placeholder="Inserisci il nome">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Cognome</label>
                            <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="Cognome" placeholder="Inserisci il cognome">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" name="Email" placeholder="Inserisci l'Email">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="InputIndirizzi">Indirizzo</label>
                            <input class="form-control" id="InputIndirizzi" type="text" name="Indirizzo" placeholder="Indirizzo">
                        </div>
                        <div class="col-md-6">
                            <label for="InputCitta">Città</label>
                            <input class="form-control" id="InputCitta" type="text" name="Citta" placeholder="Città">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="InputProvincia">Provincia</label>
                            <input class="form-control" id="InputProvincia" type="text" name="Provincia" placeholder="Provincia">
                        </div>
                        <div class="col-md-6">
                            <label for="InputCap">Cap</label>
                            <input class="form-control" id="InputCap" type="text" name="Cap" placeholder="CAP">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">Password</label>
                            <input class="form-control" id="exampleInputPassword1" type="password" name="Password" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleConfirmPassword">Conferma password</label>
                            <input class="form-control" id="exampleConfirmPassword" type="password" name="ConfermaPassword" placeholder="Conferma password">
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Registati">
            </form>
            <?php
            if(isset($_POST['Nome'])&&isset($_POST['Cognome'])&&isset($_POST['Email'])&&isset($_POST['Password'])&&isset($_POST['ConfermaPassword'])&&isset($_POST['Indirizzo'])&&isset($_POST['Citta'])&&isset($_POST['Cap'])&&isset($_POST['Provincia'])) {
                if (($_POST['Nome'] != "") && ($_POST['Cognome'] != "") && ($_POST['Email'] != "") && ($_POST['Password'] != "") && ($_POST['ConfermaPassword'] != "")) {
                    if(preg_match("/\d{5}/", $_POST['Cap'])){
                    if ($_POST['Password'] == $_POST['ConfermaPassword']) {
                        $con=new mysqli("localhost","root","","solardb");
                        if($con->connect_errno)
                            die("Errore connessione database. ".$con->connect_errno." ".$con->connect_error);
                        $sql="INSERT INTO  utenti(Email,Password,Nome,Cognome,Data_Registrazione,Indirizzo,Citta,Provincia,CAP) VALUES('".$_POST['Email']."',MD5('".$_POST['Password']."'),'".$_POST['Nome']."','".$_POST['Cognome']."',CURDATE(),'".$_POST['Indirizzo']."','".$_POST['Citta']."','".$_POST['Provincia']."','".$_POST['Cap']."')";
                        $rs=$con->query($sql);
                        if (!$rs)
                            die("Errore query. " . $con->errno . " " . $con->error);
                        echo("<p>Sei registrato!Ora puoi fare l'accesso!</p>");
                        $con->close();
                    } else {
                        echo("<p>Le 2 password non corrispondono</p>");
                    }
                    }else
                        {
                            echo("<p>Attenzione il cap inserito non è valido!</p>");
                    }
                } else {
                    if ($_POST['Nome'] == "") {
                        echo("<p>Campo nome non inserito</p>");
                    } else if ($_POST['Cognome'] == "") {
                        echo("<p>Campo Cognome non inserito</p>");
                    } else if ($_POST['Email'] == "") {
                        echo("<p>Campo email non inserito</p>");
                    }else if ($_POST['Indirizzo'] == "") {
                        echo("<p>Campo indirizzo  non inserito</p>");
                    }else if ($_POST['Cap'] == "") {
                        echo("<p>Campo CAP  non inserito</p>");
                    }else if ($_POST['Provincia'] == "") {
                        echo("<p>Campo provincia  non inserito</p>");
                    }else if ($_POST['Citta'] == "") {
                        echo("<p>Campo città  non inserito</p>");
                    } else if ($_POST['Password'] == "") {
                        echo("<p>Campo password non inserito</p>");
                    } else if ($_POST['ConfermaPassword'] == "") {
                        echo("<p>Campo conferma  non inserito</p>");
                    }
                }
            }

            ?>
            <div class="text-center">
                <a class="d-block small mt-3" href="login.php">Login</a>
                <a class="d-block small" href="#">Password dimenticata?</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>